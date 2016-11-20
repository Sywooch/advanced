<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CategoriesFields */

$this->title = 'Create Categories Fields';
$this->params['breadcrumbs'][] = ['label' => 'Categories Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
