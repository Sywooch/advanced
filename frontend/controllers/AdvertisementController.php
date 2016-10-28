<?php
namespace frontend\controllers;


use Yii;
use frontend\models\Advertisement;
use frontend\models\AdvertisementSearch;
use frontend\models\AdvertisementPhotos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\CategoriesFields;
use common\models\Categories;
use common\models\Fields;
use frontend\models\Country;
use frontend\models\City;
use frontend\models\UploadForm;
use yii\web\UploadedFile;
use frontend\models\Apply;
use frontend\models\Wishlists;

use yii\data\Pagination;
/**
 * AdvertisementController implements the CRUD actions for Advertisement model.
 */
class AdvertisementController extends Controller
{
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Advertisement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvertisementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index');
    }

    /**
     * Displays a single Advertisement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $category = $model->category_id;
        $country = $model->country;
        $city = $model->city;
        $query = "SELECT * from advertisement where  category_id= '$category' OR country='$country' AND city='$city' AND advertisement_id != '$id' ORDER BY advertisement_id Desc limit 3 ";
        $dbCommand = Yii::$app->db->createCommand($query);
        $recomends = $dbCommand->queryAll();
        return $this->render('view', [
            'model' => $model,'recomends'=>$recomends,
        ]);
    }

    /**
     * Creates a new Advertisement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdPostDetails()
    {
       $session = Yii::$app->session; 
       $category = $session->get('category_id');
       $sub = $session->get('subcategory_id');
      // $my_id = $session->get('id');
        $user = Yii::$app->user->identity;
        $my_id = $user->getId();
       $q= "SELECT * from categories where category_id = $category";
                                                        $dbCommand = Yii::$app->db->createCommand($q);
                                                        $categoryname= $dbCommand->queryOne();
                                                        $categoryname = $categoryname['english_name'];
        $q= "SELECT * from categories where category_id = $sub";
                                                        $dbCommand = Yii::$app->db->createCommand($q);
                                                        $subcategoryname= $dbCommand->queryOne();
                                                        $subcategoryname = $subcategoryname['english_name'];

       $categories_fields= new CategoriesFields();
       $fields = new Fields();
       $model = new Advertisement();
        $upload = new UploadForm();

       $q= "SELECT * from categories_fields inner join fields on categories_fields.field_id= fields.field_id where category_id = $category order by field_order";
       $dbCommand = Yii::$app->db->createCommand($q);
        $fields_related = $dbCommand->queryAll();
        $fields_list_related =  array();
        foreach ($fields_related as $fieldR) {
            if ($fieldR['field_type'] == "list" || $fieldR['field_type'] == "radio" ||$fieldR['field_type'] == "checkbox" )  
            {
                $field_id = $fieldR['field_id'];
                $q= "SELECT * from field_list_data where field_id = $field_id ";
                $dbCommand = Yii::$app->db->createCommand($q);
                $data = $dbCommand->queryAll();
                $fields_list_related[$fieldR['field_id']] = $data;
            }
        }
            $model->user_id = $my_id;
            $model ->category_id = $sub;
            $model->category_related = "nothing";
                       
        if ($model->load(Yii::$app->request->post())&& $model->save() ) { 
            $array = array();
            foreach ($fields_related as $fieldR ) {
                if ( $fieldR['field_type'] == "checkbox")
                {
                    $field_id =$fieldR['field_id'];
                     $post1 = 'field';
                    if (!empty($_POST[$post1])){
                    foreach ($_POST[$post1] as $checks) {
                        foreach ($checks as $check) {
                        array_push($array, array($fieldR['field_id'] => $check));
                        }
                       }
                    }
                }
                else{
                $post = 'field_'.$fieldR['field_id'];
                array_push($array, array($fieldR['field_id'] => $_POST[$post]));
                    }
                } 
            $model ->category_related = json_encode($array);
            $model->save(false);
            if ($upload->load(Yii::$app->request->post())){
            $upload->imageFiles = UploadedFile::getInstances($upload, 'imageFiles');
            if ($upload ->validate()) {
            foreach ($upload->imageFiles as $file) {
                $file->saveAs('images/ads/' . $file->baseName . '.' . $file->extension);
                $image = new AdvertisementPhotos();
                $image ->advertisement_id =$model->advertisement_id;
                $image ->photo_url ='images/ads/'. $file->baseName . '.' . $file->extension;
                $image->save(false);
            }
                //var_dump($upload);
                }
                else echo "unvalidate";
                

            }
        return $this->render('view',['id' => $model->advertisement_id]);
        } 
        else { 
            return $this->render('ad-post-details',
             [ 
                'model'=> $model,
                'upload'=> $upload,
                'fields' => $fields_related,
                'data'=> $fields_list_related,
                'categoryname'=>$categoryname,
                'subcategoryname'=>$subcategoryname,
            ]);
            }
    }

    public function actionSaveSession()
    {
        $main = $_POST['id'];
        $sub = $_POST['sub'];
        $session = Yii::$app->session;  
        $session -> open();
        $session ->set('category_id',$main);
        $session ->set('subcategory_id',$sub);
    }

    public function actionLists($id){
        $count_city = City::find()
        ->where(['country_id'=> $id])
        ->count();
        $cities = City::find()
        ->where(['country_id'=> $id])
        ->all();
        if ($count_city >0)
        {
            foreach ($cities as $city) {
                echo "<option value'".$city->city_id."'>".$city->city_english_name."</option>";
            }
        }
      else 
        echo "<option>-</option>";
        }
    

    /**
     * Updates an existing Advertisement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       // if ($model->load(Yii::$app->request->post()) && $model->save()) {
         //   return $this->redirect(['view', 'id' => $model->advertisement_id]);
        //} else {
            return $this->render('update', [
               'model' => $model,
            ]);
        //}
       
    }
    public function actionEdit($id){
        $model = $this->findModel($id);
       $categories_fields= new CategoriesFields();
       $fields = new Fields();
        $upload = new UploadForm();
        $sub= $model['category_id'];
        $sub = Categories::find()->where(['category_id'=>$sub])->one();
        $category = $sub['parent_category_id'];
       
      $q= "SELECT * from categories_fields inner join fields on categories_fields.field_id= fields.field_id where category_id = $category order by field_order";
       $dbCommand = Yii::$app->db->createCommand($q);
        $fields_related = $dbCommand->queryAll();

        $fields_list_related =  array();
        foreach ($fields_related as $fieldR) {
            if ($fieldR['field_type'] == "list" || $fieldR['field_type'] == "radio" ||$fieldR['field_type'] == "checkbox" )  
            {
                $field_id = $fieldR['field_id'];
                $q= "SELECT * from field_list_data where field_id = $field_id ";
                $dbCommand = Yii::$app->db->createCommand($q);
                $data = $dbCommand->queryAll();
                $fields_list_related[$fieldR['field_id']] = $data;
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo "updated";
         //return $this->redirect(['view', 'id' => $model->advertisement_id]);
     }
     else
        return $this->render('edit',['model'=>$model ,
                'fields' => $fields_related,
                'data'=> $fields_list_related]);
    }

    /**
     * Deletes an existing Advertisement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();
    //     return $this->redirect(['site/my-ads']);
    // }
    public function actionDelitem($id)
    {
        $this->findModel($id)->delete();
        $session = Yii::$app->session;
        $session_id = $session->get('id');
        $query = "SELECT * from user where id=$session_id";
        $dbCommand = Yii::$app->db->createCommand($query);
        $user = $dbCommand->queryOne();
        $id = $user['id'];
        $query = Advertisement::find()->where(['user_id'=>$id]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'defaultPageSize' => 4]);
        $my_ads = $query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        return $this->render('/site/my-ads',['user'=>$user,'count'=>$count,'my_ads'=> $my_ads ,'pagination'=>$pagination]);
    }



    /**
     * Finds the Advertisement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advertisement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advertisement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


   public function actionAdPost($id=null)
    {
        $query = "SELECT * from categories where  parent_category_id=0 ";
        $dbCommand = Yii::$app->db->createCommand($query);
        $MainCategories = $dbCommand->queryAll();
     if(isset($_GET['id']))
    {

        $id = $_GET['id'];
        $query2 = "SELECT * from categories where  parent_category_id='$id' ";
        $dbCommand = Yii::$app->db->createCommand($query2);
        $subCategories = $dbCommand->queryAll();
        return $this->render('ad-post',['MainCategories'=>$MainCategories , 'subCategories' =>$subCategories]);
        
    }
    else {
        $firstCategory = $MainCategories[0]['category_id'];
        $query2 = "SELECT * from categories where  parent_category_id='$firstCategory' ";
        $dbCommand = Yii::$app->db->createCommand($query2);
        $subCategories = $dbCommand->queryAll();
        return $this->render('ad-post',['MainCategories'=>$MainCategories , 'subCategories'=>$subCategories]);
    }
}


   public function actionApplyForm($id)
{
    $session = Yii::$app->session;
    $session_id=$session->get('id');
    $model= new Apply();
    $model->user_id = $session_id;
    $model->advertisement_id = $id;

    if ($model->load(Yii::$app->request->post())) {
         //get the instance of the uploaded file 
            $fileName = $model->name;
            $model ->file = UploadedFile::getInstance($model,'file');
            $model->file->saveAs('uploads/'.$fileName.'.'.$model->file->extension );
            //save the path in the db column
            $model->attach = 'uploads/'.$fileName.'.'.$model->file->extension;
            $model->save(false);
        if ($model->validate()) {
            
           return $this->render('view',['model'=>$this->findModel($id)]);
        }
    }

    return $this->renderAjax('apply-form', [
        'model' => $model,
    ]);
}

public function actionWishlist(){
        $user_id = $_POST['session_id'];
        $advertisement_id = $_POST['id'];
        $model = new Wishlists();
        $model->user_id = $user_id;
        $model->advertisement_id = $advertisement_id;
        $model->save();

}


}
