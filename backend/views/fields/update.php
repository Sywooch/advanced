<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Fields */

$this->title = 'Update Fields: ' . $model->field_id;
$this->params['breadcrumbs'][] = ['label' => 'Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->field_id, 'url' => ['view', 'id' => $model->field_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fields-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
