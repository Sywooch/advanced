<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cms Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cms Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cms_category_id',
            'cms_category_name_en',
            'cms_category_name_ar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
