<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories Fields';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-fields-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Categories Fields', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'categories_fields_id',
            'category_id',
            'field_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
