<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Fields;
use common\models\Categories;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advertisements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisement-index">

    <h1><?= Html::encode($this->title) ?></h1>

 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            'advertisement_id',
            [
                'attribute' => 'Category',
                'value' => function ($data) {
                                    $name = \common\models\Categories::find()->where(['category_id'=>$data['category_id']])->one();
                                    return $name['english_name'];}
            ],
            'title',
            'description:ntext',
            'email:email',
            ['attribute' => 'category_related' ,
             'value' => function ($data) { if ($data['category_related'] != 'nothing' ){
                 $fields  =  json_decode($data['category_related']);
                 if ( !empty($fields) ) {
                     foreach ($fields as $field) {
                         foreach ($field as $key => $value) {
                             //echo $value . " in " . $key . ", ";

                             $type = Fields::find()->where(['field_id'=>$key])->one();
                             $type = $type['field_type'];
                             $field_name = Fields::find()->where(['field_id'=>$key])->one();
                             $field_name = $field_name['english_name'];
                             switch ($type) {
                                 case 'text':
                                     $val = $value;
                                     //echo $field_name."   :   ". $val ;
                                     //echo "</br>";
                                     $cr1 = $field_name.'   :   '. $val;

                                     break;

                                 case 'number' :
                                     $val = $value;
                                     //echo $field_name."   :   ". $val ;
                                     //echo "</br>";
                                     $cr2 = $field_name.'   :   '. $val;

                                     break;
                                 case 'list':
                                     $field_item = "SELECT * from field_list_data where  field_list_data_id = $value ";
                                     $dbCommand = Yii::$app->db->createCommand($field_item);
                                     $field_item = $dbCommand->queryOne();
                                     $field_item = $field_item['english_content'];
                                    // echo $field_name."   :   ". $field_item;
                                     //echo "</br>";
                                     $cr3 = $field_name.'   :   '. $field_item ;
                                     break;
                                 case 'radio':
                                     $field_item = "SELECT * from field_list_data where  field_list_data_id = $value ";
                                     $dbCommand = Yii::$app->db->createCommand($field_item);
                                     $field_item = $dbCommand->queryOne();
                                     $field_item = $field_item['english_content'];
                                    // echo $field_name."   :   ". $field_item;
                                    // echo "</br>";
                                     $cr4 = $field_name."   :   ". $field_item;
                                     break;
                                 case 'checkbox':
                                     $field_item = "SELECT * from field_list_data where  field_list_data_id = $value ";
                                     $dbCommand = Yii::$app->db->createCommand($field_item);
                                     $field_item = $dbCommand->queryOne();

                                     $field_item = $field_item['english_content'];
                                     //echo $field_name."   :   ". $field_item;
                                     //echo "</br>";
                                     $cr5 = $field_name.'   :' .$field_item .',';
                                     break;
                             }  }
                     }
                     return $cr1 .','. $cr2 .','. $cr3 .','. $cr4 .','. $cr5;
                 }

                          }
                 else {
                     return $data['category_related'];
                }
                 }] ,
            [
            'attribute' => 'status',
            'value' => function($data) {
                if($data['status'] == 0)
                    return 'Hidden';
            }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'edit' => function ($data) {
//
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $data, [
                            'title' => \Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                        ]);
                    },
                    'remove' => function ($data) {
//
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',$data, [
                            'title' => \Yii::t('yii', 'Delete'),
                            'data-confirm' => \Yii::t('yii', 'Are you sure to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
                    }
                ],
                'template' => '{edit}{remove}'
            ],
        ],
    ]); ?>
</div>
