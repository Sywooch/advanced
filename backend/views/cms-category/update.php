<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsCategory */

$this->title = 'Update Cms Category: ' . $model->cms_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Cms Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cms_category_id, 'url' => ['view', 'id' => $model->cms_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cms-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
