<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsItem */

$this->title = 'Update Cms Item: ' . $model->cms_item_id;
$this->params['breadcrumbs'][] = ['label' => 'Cms Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cms_item_id, 'url' => ['view', 'id' => $model->cms_item_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cms-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
