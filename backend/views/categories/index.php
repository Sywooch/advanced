<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'category_id',
            'arabic_name',
            'english_name',
            [
                'attribute' => 'parent_category_id',
                'value' => function ($data) {
                    $name = \common\models\Categories::find()->where(['category_id'=>$data['category_id']])->one();
                    return $name['english_name'];}
            ],

            'arabic_description:ntext',
            // 'english_description:ntext',
            // 'icon',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
