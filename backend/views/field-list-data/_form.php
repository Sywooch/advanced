<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FieldListData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="field-list-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'field_id')->textInput() ?>

    <?= $form->field($model, 'arabic_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'english_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
