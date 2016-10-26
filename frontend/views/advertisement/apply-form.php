
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<div class="row">
        <div class="col-lg-5">
    <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'message')->textarea(['rows' => 3]) ?>
        <?= $form->field($model, 'file')->fileInput() ?>

    
        <div class="form-group">
            <?= Html::submitButton('save', ['class' => 'btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
    </div>
