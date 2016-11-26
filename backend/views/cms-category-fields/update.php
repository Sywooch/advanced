<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsCategoryFields */

$this->title = 'Update Cms Category Fields: ' . $model->cms_category_field_id;
$this->params['breadcrumbs'][] = ['label' => 'Cms Category Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cms_category_field_id, 'url' => ['view', 'id' => $model->cms_category_field_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cms-category-fields-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
