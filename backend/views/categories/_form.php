<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">
    <div class="row">
        <div class="col-lg-5">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'arabic_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'english_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_category_id')->textInput()->dropDownList(ArrayHelper::map(\common\models\Categories::find()-> where(['parent_category_id' => 0 ])->all(), 'category_id', 'english_name'),['prompt' => 'Select Main Category..']) ?>

    <?= $form->field($model, 'arabic_description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'english_description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'file')->fileInput()->label('Category Icon'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
        </div>
</div>
