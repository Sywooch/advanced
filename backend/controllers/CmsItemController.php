<?php

namespace backend\controllers;

use Yii;
use frontend\models\CmsCategory;
use backend\models\CmsCategoryField;
use frontend\models\CmsItem;
use frontend\models\CmsValues;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CmsItemController implements the CRUD actions for CmsCategory model.
 */
class CmsItemController extends Controller
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
                    'custom' => ['GET']
                ],
            ],
        ];
    }

    /**
     * Lists all CmsCategory models.
     * @return mixed
     */


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CmsCategory::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCustom($cat)
    {

        $Fields = CmsCategoryField::find()->where(['cms_category_id'=>$cat])->all();
        return $this->render('custom',[
          'fields' => $Fields
        ]);
    }

    public function actionNew(){
      $dataProvider = new ActiveDataProvider([
          'query' => CmsCategory::find(),
      ]);

      return $this->render('index', [
          'dataProvider' => $dataProvider,
      ]);
    }

    /**
     * Displays a single CmsCategory model.
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
     * Creates a new CmsCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $model = new CmsItem();
      $model->cms_category_id = $_POST['category'];
      $model->date_time =  date('Y-m-d H:i:s');
      $model->save();
       $i = 0;
       $total = count($_POST);
       $allowed = $total - 3 ;
      while( list( $field, $value ) = each( $_POST )) {
        if ($i <= $allowed)
        {
         $model2 = new CmsValues();
         $model2->cms_item_id = $model->cms_item_id;
         $model2->cms_category_field_id = explode("_",$field)[1];
         $model2->cms_value = $value;
         $model2->save();


         $i++;
       }else {
         continue;
       }
       }

      return $this->redirect(['cms-category/view','id'=>$model->cms_category_id]);
    }

    /**
     * Updates an existing CmsCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cms_category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CmsCategory model.
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
     * Finds the CmsCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
