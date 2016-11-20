<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Fields */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fields-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'arabic_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'english_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_type')->dropDownList([ 'text' => 'Text', 'checkbox' => 'Checkbox', 'radio' => 'Radio', 'file' => 'File', 'list' => 'List', 'between' => 'Between', 'number' => 'Number', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_required')->textInput() ?>

    <?= $form->field($model, 'field_order')->textInput() ?>

    <?= $form->field($model, 'list_page')->textInput() ?>

    <?= $form->field($model, 'filter_page')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
