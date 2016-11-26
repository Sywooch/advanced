<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsValues */

$this->title = 'Update Cms Values: ' . $model->cms_values_id;
$this->params['breadcrumbs'][] = ['label' => 'Cms Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cms_values_id, 'url' => ['view', 'id' => $model->cms_values_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cms-values-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
