<?php
namespace frontend\controllers;

use yii\filters\VerbFilter;
use Yii;
use yii\web\Controller;
use backend\models\CmsCategoryField;
use frontend\models\CmsCategory;


class AboutController extends Controller
{
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



    public function actionIndex()
    {
  $rows = (new \yii\db\Query())
      ->select('cms_values.cms_value,cms_item.cms_item_id,cms_category_field.cms_field_name,cms_item.date_time')
      ->from('cms_category_field')
      ->innerJoin('cms_category', '`cms_category`.`cms_category_id` = `cms_category_field`.`cms_category_id`')
      ->innerJoin('cms_item','`cms_item`.`cms_category_id` = `cms_category`.`cms_category_id`')
      ->innerJoin('cms_values','`cms_values`.`cms_item_id` = `cms_item`.`cms_item_id` AND  `cms_values`.`cms_category_field_id` = `cms_category_field`.`cms_category_field_id`')
      ->where(['cms_category.cms_category_name_en' => 'stories'])
      ->all();

      $newsRows = (new \yii\db\Query())
          ->select('cms_values.cms_value,cms_item.cms_item_id,cms_category_field.cms_field_name,cms_item.date_time')
          ->from('cms_category_field')
          ->innerJoin('cms_category', '`cms_category`.`cms_category_id` = `cms_category_field`.`cms_category_id`')
          ->innerJoin('cms_item','`cms_item`.`cms_category_id` = `cms_category`.`cms_category_id`')
          ->innerJoin('cms_values','`cms_values`.`cms_item_id` = `cms_item`.`cms_item_id` AND  `cms_values`.`cms_category_field_id` = `cms_category_field`.`cms_category_field_id`')
          ->where(['cms_category.cms_category_name_en' => 'news'])
          ->all();

          $eventRows = (new \yii\db\Query())
              ->select('cms_values.cms_value,cms_item.cms_item_id,cms_category_field.cms_field_name,cms_item.date_time')
              ->from('cms_category_field')
              ->innerJoin('cms_category', '`cms_category`.`cms_category_id` = `cms_category_field`.`cms_category_id`')
              ->innerJoin('cms_item','`cms_item`.`cms_category_id` = `cms_category`.`cms_category_id`')
              ->innerJoin('cms_values','`cms_values`.`cms_item_id` = `cms_item`.`cms_item_id` AND  `cms_values`.`cms_category_field_id` = `cms_category_field`.`cms_category_field_id`')
              ->where(['cms_category.cms_category_name_en' => 'events'])
              ->all();



      $stories = array();
      $finalStories = array();
      foreach ($rows as $story) {
          if(!isset($stories[$story['cms_item_id']]))
            $stories[$story['cms_item_id']]  = array();
            array_push($stories[$story['cms_item_id']],$story);
      }


      foreach ($stories as $story) {
        for($i=0;$i<count($story);$i++)
        {
          $singleDetail = array();
          if ($story[$i]['cms_field_name'] == 'title')
          {
            if(!isset($singleDetail['title']))
            $singleDetail['title'] = $story[$i]['cms_value'];
          }elseif($story[$i]['cms_field_name'] == 'desc') {
            if(!isset($singleDetail['desc']))
            $singleDetail['desc'] = $story[$i]['cms_value'];
          }elseif ($story[$i]['cms_field_name'] == 'image') {
            if(!isset($singleDetail['image']))
            $singleDetail['image'] = $story[$i]['cms_value'];
                }
          if(!isset($finalStories[$story[$i]['cms_item_id']]))
            $finalStories[$story[$i]['cms_item_id']] = array();
          array_push($finalStories[$story[$i]['cms_item_id']] , $singleDetail);
        }
      }
/* ---------------------------- NEWS ---------------------------- */
      $news = array();
      $finalNews = array();
      foreach ($newsRows as $new) {
          if(!isset($news[$new['cms_item_id']]))
            $news[$new['cms_item_id']]  = array();
            array_push($news[$new['cms_item_id']],$new);
      }

      foreach ($news as $new) {
        for($i=0;$i<count($new);$i++)
        {
          $singleNews = array();
          if ($new[$i]['cms_field_name'] == 'title')
          {
            if(!isset($singleNews['title']))
            $singleNews['title'] = $new[$i]['cms_value'];
            if(!isset($singleNews['date']))
            $singleNews['date'] = $new[$i]['date_time'];
          }

          if(!isset($finalNews[$new[$i]['cms_item_id']]))
            $finalNews[$new[$i]['cms_item_id']] = array();
          array_push($finalNews[$new[$i]['cms_item_id']] , $singleNews);
        }
      }

      /* --------------------------- EVENTS ---------------------------------- */

            $events = array();
            $finalEvents = array();
            foreach ($eventRows as $event) {
                if(!isset($events[$event['cms_item_id']]))
                  $events[$event['cms_item_id']]  = array();
                  array_push($events[$event['cms_item_id']],$event);
            }


            foreach ($events as $event) {
              for($i=0;$i<count($event);$i++)
              {
                $singleEvent = array();
                if ($event[$i]['cms_field_name'] == 'type')
                {
                  if(!isset($singleEvent['type']))
                  $singleEvent['type'] = $event[$i]['cms_value'];
                }elseif($event[$i]['cms_field_name'] == 'title') {
                  if(!isset($singleEvent['title']))
                  $singleEvent['title'] = $event[$i]['cms_value'];
                }elseif($event[$i]['cms_field_name'] == 'day') {
                  if(!isset($singleEvent['day']))
                  $singleEvent['day'] = $event[$i]['cms_value'];
                }elseif($event[$i]['cms_field_name'] == 'month') {
                  if(!isset($singleEvent['month']))
                  $singleEvent['month'] = $event[$i]['cms_value'];
                }elseif($event[$i]['cms_field_name'] == 'desc') {
                  if(!isset($singleEvent['desc']))
                  $singleEvent['desc'] = $event[$i]['cms_value'];
                }
                if(!isset($finalEvents[$event[$i]['cms_item_id']]))
                  $finalEvents[$event[$i]['cms_item_id']] = array();
                array_push($finalEvents[$event[$i]['cms_item_id']] , $singleEvent);
              }
            }



        return $this->render('index',[
          'stories' => $finalStories ,
          'news' => $finalNews,
          'events' => $finalEvents
        ]);
    }

    public function actionNews()
    {
      $newsRows = (new \yii\db\Query())
          ->select('cms_values.cms_value,cms_item.cms_item_id,cms_category_field.cms_field_name,cms_item.date_time')
          ->from('cms_category_field')
          ->innerJoin('cms_category', '`cms_category`.`cms_category_id` = `cms_category_field`.`cms_category_id`')
          ->innerJoin('cms_item','`cms_item`.`cms_category_id` = `cms_category`.`cms_category_id`')
          ->innerJoin('cms_values','`cms_values`.`cms_item_id` = `cms_item`.`cms_item_id` AND  `cms_values`.`cms_category_field_id` = `cms_category_field`.`cms_category_field_id`')
          ->where(['cms_category.cms_category_name_en' => 'news'])
          ->all();

          $news = array();
          $finalNews = array();
          foreach ($newsRows as $new) {
              if(!isset($news[$new['cms_item_id']]))
                $news[$new['cms_item_id']]  = array();
                array_push($news[$new['cms_item_id']],$new);
          }

          foreach ($news as $new) {
            for($i=0;$i<count($new);$i++)
            {
              $singleNews = array();
              if ($new[$i]['cms_field_name'] == 'title')
              {
                if(!isset($singleNews['title']))
                $singleNews['title'] = $new[$i]['cms_value'];
                if(!isset($singleNews['date']))
                $singleNews['date'] = $new[$i]['date_time'];
              }elseif($new[$i]['cms_field_name'] == 'category'){
                if(!isset($singleNews['category']))
                $singleNews['category'] = $new[$i]['cms_value'];
              }elseif($new[$i]['cms_field_name'] == 'image'){
                if(!isset($singleNews['image']))
                $singleNews['image'] = $new[$i]['cms_value'];
              }elseif($new[$i]['cms_field_name'] == 'description'){
                if(!isset($singleNews['description']))
                $singleNews['description'] = $new[$i]['cms_value'];
              }

              if(!isset($finalNews[$new[$i]['cms_item_id']]))
                $finalNews[$new[$i]['cms_item_id']] = array();
              array_push($finalNews[$new[$i]['cms_item_id']] , $singleNews);
            }
          }

        //  echo '<pre>'.var_dump($finalNews).'</pre>';

        return $this->render('news',[
          'news' => $finalNews
        ]);

    }

    public function actionProducts()
    {
      $productsRows = (new \yii\db\Query())
      ->select('cms_values.cms_value,cms_item.cms_item_id,cms_category_field.cms_field_name,cms_item.date_time')
      ->from('cms_category_field')
      ->innerJoin('cms_category', '`cms_category`.`cms_category_id` = `cms_category_field`.`cms_category_id`')
      ->innerJoin('cms_item','`cms_item`.`cms_category_id` = `cms_category`.`cms_category_id`')
      ->innerJoin('cms_values','`cms_values`.`cms_item_id` = `cms_item`.`cms_item_id` AND  `cms_values`.`cms_category_field_id` = `cms_category_field`.`cms_category_field_id`')
      ->where(['cms_category.cms_category_name_en' => 'products'])
      ->all();

      $products = array();
      $finalProducts = array();
      foreach ($productsRows as $product) {
          if(!isset($products[$product['cms_item_id']]))
            $products[$product['cms_item_id']]  = array();
            array_push($products[$product['cms_item_id']],$product);
      }

      foreach ($products as $product) {
        for($i=0;$i<count($product);$i++)
        {
          $singleProduct = array();
          if ($product[$i]['cms_field_name'] == 'title')
          {
            if(!isset($singleProduct['title']))
            $singleProduct['title'] = $product[$i]['cms_value'];
            if(!isset($singleProduct['date']))
            $singleProduct['date'] = $product[$i]['date_time'];
          }elseif($product[$i]['cms_field_name'] == 'image'){
            if(!isset($singleProduct['image']))
            $singleProduct['image'] = $product[$i]['cms_value'];
          }elseif($product[$i]['cms_field_name'] == 'description'){
            if(!isset($singleProduct['description']))
            $singleProduct['description'] = $product[$i]['cms_value'];
          }elseif($product[$i]['cms_field_name'] == 'link'){
            if(!isset($singleProduct['link']))
            $singleProduct['link'] = $product[$i]['cms_value'];
          }elseif($product[$i]['cms_field_name'] == 'release'){
            if(!isset($singleProduct['release']))
            $singleProduct['release'] = $product[$i]['cms_value'];
          }elseif($product[$i]['cms_field_name'] == 'logo'){
            if(!isset($singleProduct['logo']))
            $singleProduct['logo'] = $product[$i]['cms_value'];
          }elseif($product[$i]['cms_field_name'] == 'google_play'){
            if(!isset($singleProduct['google_play']))
            $singleProduct['google_play'] = $product[$i]['cms_value'];
          }elseif($product[$i]['cms_field_name'] == 'apple_store'){
            if(!isset($singleProduct['apple_store']))
            $singleProduct['apple_store'] = $product[$i]['cms_value'];
          }

          if(!isset($finalProducts[$product[$i]['cms_item_id']]))
            $finalProducts[$product[$i]['cms_item_id']] = array();
          array_push($finalProducts[$product[$i]['cms_item_id']] , $singleProduct);
        }
      }


        return $this->render('products',[
          'products' => $finalProducts
        ]);

    }

    public function actionInfo()
    {
        return $this->render('info');

    }

    public function actionDirectory()
    {
        return $this->render('directory');

    }

    public function actionGallery()
    {
        return $this->render('gallery');

    }
}
