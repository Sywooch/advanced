<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\Categories;
use frontend\models\Advertisement;
use yii\data\Pagination;


class CategoriesController extends Controller
{

public $enableCsrfValidation = false;

  public function actionCategories($id)
  {
      //get all categories
      $query = "SELECT * from categories where 	parent_category_id =0 ";
      $dbCommand = Yii::$app->db->createCommand($query);
      $MainCategories = $dbCommand->queryAll();

      $model = $this->findModel($id);
      if ($model['parent_category_id'] == 0) {
          //get ads
          $SubCategories = Categories::find()
              ->where(['parent_category_id' => $model['category_id']])
              ->all();
          $ads = Advertisement::find()
              ->where(['category_id' => $SubCategories , 'status' =>1]);
          $count = $ads->count();
          $pagination = new Pagination(['defaultPageSize' => 4,
              'totalCount' => $count]);
          $ads = $ads->offset($pagination->offset)
              ->limit($pagination->limit)
              ->all();

          //$MainCategories = Categories::find()->where(['parent_category_id' => 0]);
      }
      else {
          $ads = Advertisement::find()->where(['category_id'=>$id , 'status' => 1]);
          $count = $ads->count();
          $pagination = new Pagination(['defaultPageSize' => 4,
              'totalCount' => $count]);
          $ads = $ads->offset($pagination->offset)
              ->limit($pagination->limit)
              ->all();
      }
      return $this->render('categories', ['MainCategories' => $MainCategories, 'model' => $model, 'ads' => $ads, 'pagination' => $pagination]);
  }




     public function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else 
        if (($model = Categories::findOne(1)) !== null) {
            return $model;        
          }
    }

    public function actionSearch(){
        
        $category  = ($_GET['category']);
        $searchword = ($_GET['search']);
        if ($category != null || $searchword != null){
            $model = $this->findModel($category);
            if ($model['parent_category_id'] == 0 ) {
                //get sub categories
                $SubCategories = Categories::find()
                    ->where(['parent_category_id' => $category])
                    ->all();
                $ads = Advertisement::find()
                    ->where(['category_id' => $SubCategories , 'status' => 1])
                    ->orFilterWhere(['like', 'title', $searchword])
                    ->orFilterWhere(['like', 'description', $searchword]);
                $count = $ads->count();
                $pagination = new Pagination(['defaultPageSize' => 4,
                    'totalCount' => $count]);
                $ads = $ads->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();
                // get category name
                $main = Categories::find()->where(['category_id' => $category])->one();
                $main = $main['english_name'];
            }
            else {
                $ads = Advertisement::find()
                    ->where(['category_id' => $category , 'status' => 1])
                    ->orFilterWhere(['like', 'title', $searchword])
                    ->orFilterWhere(['like', 'description', $searchword]);
                $count = $ads->count();
                $pagination = new Pagination(['defaultPageSize' => 4,
                    'totalCount' => $count]);
                $ads = $ads->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();
                // get category name
                $main = Categories::find()->where(['category_id' => $model['parent_category_id']])->one();
                $SubCategories = Categories::find()
                    ->where(['parent_category_id' => $main['category_id']])
                    ->all();
                $main = $main['english_name'];

            }


                return $this->render("search",['SubCategories'=>$SubCategories,'ads'=>$ads, 'main'=>$main,'pagination'=>$pagination]);
        }
        else
            return $this->goBack();

}


}
