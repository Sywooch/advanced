<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FieldListData */

$this->title = 'Create Field List Data';
$this->params['breadcrumbs'][] = ['label' => 'Field List Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-list-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
