<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriesFields */

$this->title = 'Update Categories Fields: ' . $model->categories_fields_id;
$this->params['breadcrumbs'][] = ['label' => 'Categories Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->categories_fields_id, 'url' => ['view', 'id' => $model->categories_fields_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categories-fields-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
