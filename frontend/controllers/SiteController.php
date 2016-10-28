<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Categories;
use frontend\models\AskDubarji;
use frontend\models\Suggestions;
use frontend\models\Advertisement;
use yii\data\Pagination;
use frontend\models\Wishlists;
 
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    { 
        $query =Categories::find()->andFilterWhere([ 'parent_category_id'=> 0]);
        $categories  = $query->all();
        

        $query = "SELECT * from advertisement ORDER BY advertisement_id Desc limit 4 ";
        $dbCommand = Yii::$app->db->createCommand($query);
        $ads = $dbCommand->queryAll();
        return $this->render('index',['categories'=> $categories , 'advert'=>$ads]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $session = Yii::$app->session;  
            $session -> open();
           $session -> set('id',$model->getUser()->id);
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAboutUs()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    $session = Yii::$app->session;  
                    $session -> open();
                    $session -> set('id',$user->id);
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    public function getUser()
    {
        $user = Yii::$app->user->identity;
        return $user;
    }

    public function actionMyProfile()
    {
        $model = yii::$app->user->identity;
        $model1 = yii::$app->user->identity;
        $user = $this->getUser();
        $loadpost = $model->load(Yii::$app->request->post());
        $loadpost1 = $model1->load(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()))
        {
            $model->save(false);
            return $this->refresh();
        }
      if($loadpost1 && $model1->validate())
        {
            $model1->password = $model1->newPassword;
            $model1->save(false);
            // yii::$app->session->setFlash('success','you have successfully changed your password');
            return $this->refresh();
        }
        else 
        {
            return $this->render('my-profile',
            ['model1'=>$model1,'model'=>$model]);
        }
    }
    

    public function actionMyAds(){
        $user = $this->getUser();
        $id = $user->id;
        $query = Advertisement::find()->where(['user_id'=>$id]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'defaultPageSize' => 4]);
        $my_ads = $query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        return $this->render('my-ads',['user'=>$user,'count'=>$count,'my_ads'=> $my_ads ,'pagination'=>$pagination]);
    }


    public function actionMyWishlist(){
        $user = $this->getUser();
        $id = $user->id;
        $query = Wishlists::find()->where(['user_id'=>$id]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'defaultPageSize' => 4]);
        $my_wishlist = $query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        return $this->render('my-wishlist',['user'=>$user,'count'=>$count,'my_wishlist'=> $my_wishlist,'pagination'=>$pagination]);
    }


    public function actionMyApplications(){
        $user = $this->getUser();
        $id = $user->id;

        return $this->render('my-applications',['user'=>$user,'count'=>$count,'my_wishlist'=> $my_wishlist,'pagination'=>$pagination]);
    }


    public function actionAskDubarji(){
        $model = new AskDubarji();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
 
            return $this->redirect(['index']);
        } else {
            return $this->render('ask-dubarji', [
                'model' => $model,
            ]);
        }
    }

    public function actionSuggestions(){
        $model = new Suggestions();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
 
            return $this->redirect(['index']);
        } else {
            return $this->render('suggestions', [
                'model' => $model,
            ]);
        }
    }

    public function actionContactUs(){
        $model = new Contact();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
 
            return $this->redirect(['index']);
        } else {
            return $this->render('contact-us', [
                'model' => $model,
            ]);
        }
    }
    public function actionDonate(){
        return $this->render('donate');
    }

    public function actionFaqs(){
        return $this->render('faqs');
    }

    public function actionMission(){
        return $this->render('mission');
    }

    public function actionVision(){
        return $this->render('vision');
    }


}
