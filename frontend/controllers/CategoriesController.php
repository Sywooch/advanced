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
            //get ads
            $SubCategories = Categories::find()
                ->where(['parent_category_id' => $model['category_id']])
                ->all();

            $advertisement = array();
            foreach ($SubCategories as $sub) {
                $ads = Advertisement::find()->where(['category_id' => $sub['category_id']])
                    ->all();

                array_push($advertisement, $ads);
            }
        //$MainCategories = Categories::find()->where(['parent_category_id' => 0]);
        return $this->render('categories',['MainCategories'=>$MainCategories,'model'=>$model,'advertisement'=>$advertisement]);
    }




     public function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSearch(){
        
        $category  = ($_GET['category']);
        $searchword = ($_GET['search']);
        if ($category != null || $searchword != null){
        //get sub categories
        $SubCategories = Categories::find()
        ->where(['parent_category_id'=> $category])
        ->all();

        $advertisement=  array();
            $lastAds = array();
        foreach ($SubCategories as $sub) {
           $ads= Advertisement::find()
            ->orFilterWhere(['like', 'title', $searchword])
            ->orFilterWhere(['like', 'description', $searchword])
            ->orFilterWhere(['category_id' => $sub['category_id']]);
             array_push($advertisement, $ads);
           }
           foreach ($advertisement as $ads ){
               foreach ($ads as $ad)
               {
                   print_r($ad);
                   array_push($lastAds , $ad);
               }
           }
            $count = count($lastAds);
             $pagination = new Pagination(['defaultPageSize' => 4 ,
                 'totalCount' => $count]);
             $ads = $lastAds->offset($pagination->offset)
             ->limit($pagination->limit)
             ->all();


       // get category name
        $main = Categories::find()->where(['category_id' => $category])->one();
        $main = $main['english_name'];

        //return $this->render("search",['SubCategories'=>$SubCategories,'ads'=>$ads, 'main'=>$main,'pagination'=>$pagination]);
        }
        else
            return $this->goBack();

}


}
