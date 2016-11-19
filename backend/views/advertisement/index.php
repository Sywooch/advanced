<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            [
                'label' => 'Category',
                'value' => function ($data) {return $data['category_id'];}
            ],
            'title',
            'description:ntext',
            'email:email',
            'category_related:ntext', 
            [
            'label' => 'status',
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
