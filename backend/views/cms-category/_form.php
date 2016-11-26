<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cms_category_name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cms_category_name_ar')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
