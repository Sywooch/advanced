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
use common\models\Fields;
use frontend\models\Country;
use frontend\models\City;

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
        return $this->render('view', [
            'model' => $this->findModel($id),
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
       $my_id = $session->get('id');
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
       $ad_photo = new AdvertisementPhotos();

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
             return $this->render(['view', 'id' => $model->advertisement_id]);
        } else { 
            return $this->render('ad-post-details',
             [ 
                'model'=> $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->advertisement_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Advertisement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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


}
