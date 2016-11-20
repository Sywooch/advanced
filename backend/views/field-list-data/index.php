<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Field List Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-list-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Field List Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'field_list_data_id',
            'field_id',
            'arabic_content',
            'english_content',
            'field_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
