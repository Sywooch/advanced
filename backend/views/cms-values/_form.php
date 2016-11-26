<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsValues */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-values-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cms_item_id')->textInput() ?>

    <?= $form->field($model, 'cms_category_field_id')->textInput() ?>

    <?= $form->field($model, 'cms_value')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
