<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cms Category Fields';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-category-fields-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cms Category Fields', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cms_category_field_id',
            'cms_category_id',
            'cms_category_field_name_en',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
