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
        $model = $this->findModel($id);
        $query = "SELECT * from categories where 	parent_category_id =0 ";
        $dbCommand = Yii::$app->db->createCommand($query);
        $MainCategories = $dbCommand->queryAll();

        //$MainCategories = Categories::find()->where(['parent_category_id' => 0]);
        return $this->render('categories',['MainCategories'=>$MainCategories,'model'=>$model]);
    }




     public function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSearch($category=null , $search =null){
        
        $category  = ($_GET['category']);
        $searchword = ($_GET['search']);
        if ($category != null || $searchword != null){
        //get sub categories
        $SubCategories = Categories::find()
        ->where(['parent_category_id'=> $category])
        ->all();

        $advertisement=  array();
        foreach ($SubCategories as $sub) {
           $ads= Advertisement::find()
            ->orFilterWhere(['like', 'title', $searchword])
            ->orFilterWhere(['like', 'description', $searchword])
            ->orFilterWhere(['category_id' => $sub['category_id']]);

             array_push($advertisement, $ads);
           }
            // $count = $query->count();
            // $pagination = new Pagination(['defaultPageSize' => 4 ,
            //     'totalCount' => $count]);
            // $ads = $query->offset($pagination->offset)
            // ->limit($pagination->limit)
            // ->all();


        //get category name 
        $main = Categories::find()->where(['category_id' => $category])->one();
        $main = $main['english_name'];
        return $this->render('search',['SubCategories'=>$SubCategories,'advertisement'=>$advertisement , 'main'=>$main]);
        }
        else 
            return $this->goBack();
}


}
