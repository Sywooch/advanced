<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FieldListData */

$this->title = 'Update Field List Data: ' . $model->field_list_data_id;
$this->params['breadcrumbs'][] = ['label' => 'Field List Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->field_list_data_id, 'url' => ['view', 'id' => $model->field_list_data_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="field-list-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
