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

    <?= $form->field($model, 'is_required')->radioList(['1' => 'Required' , '0' => 'Not Required'],['separator' => ' - - - -  ']) ?>

    <?= $form->field($model, 'field_order')->input('number') ?>

    <?= $form->field($model, 'list_page')->radioList(['1' => 'Listed' , '0' => 'Not Listed'],['separator' => ' - - - -  ']) ?>

    <?= $form->field($model, 'filter_page')->radioList(['1' => 'Filtered' , '0' => 'Not Filtered'],['separator' => ' - - - -  ']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
