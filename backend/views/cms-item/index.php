<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cms Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cms Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cms_item_id',
            'cms_category_id',
            'date_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
