<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsCategoryFields */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-category-fields-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cms_category_id')->textInput() ?>

    <?= $form->field($model, 'cms_category_field_name_en')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
