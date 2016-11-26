<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\CmsValues */

$this->title = 'Create Cms Values';
$this->params['breadcrumbs'][] = ['label' => 'Cms Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-values-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
