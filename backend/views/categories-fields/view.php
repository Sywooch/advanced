<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriesFields */

$this->title = $model->categories_fields_id;
$this->params['breadcrumbs'][] = ['label' => 'Categories Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-fields-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->categories_fields_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->categories_fields_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'categories_fields_id',
            'category_id',
            'field_id',
        ],
    ]) ?>




</div>
