<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php include('include/header.php'); ?>

    <!-- signup-page -->
    <section id="main" class="clearfix user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="user-account">
                        <h2>Create a new Account</h2>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true , 'class' => "form-control",'placeholder'=>"Full Name"])->label('') ?>

                <?= $form->field($model, 'email')->textInput(['class' => "form-control",'placeholder'=>"Email Address"])->label('') ?>

                <?= $form->field($model, 'password')->passwordInput(['id' => 'password','class' => "form-control",'placeholder'=>"Password"])->label('') ?>

                <input type="password" class="form-control" placeholder="Confirm Password"
                    onchange="
                    var ele = document.getElementById('password');
                    if (ele.value == this.value)
                    {
                        document.getElementById('submit').disabled=false;
                    }
                    else
                    {
                        document.getElementById('submit').disabled=true;
                    }
                    ">
                <?= $form->field($model, 'mobile')->textInput(['class' => "form-control",'placeholder'=>"Mobile Number"])->label('') ?>

                <?= $form->field($model, 'place')->dropDownList(['Damascus, Syria'=>'Damascus, Syria',
                    'London UK'=>'London UK','Newyork, USA'=>'Newyork, USA','Seoul, Korea'=>'Seoul, Korea'],['prompt' => 'Select Country'])->label('') ?>

                            <div class="checkbox">
                                <label class="pull-left checked" for="signing">
                                <input type="checkbox" name="signing" id="signing"> By signing up for an account you agree to our Terms and Conditions </label>
                            </div><!-- checkbox --> 
                <div class="form-group">
                    <?= Html::submitButton('Registration', [ 'id' => 'submit','class' => 'btn', 'name' => 'signup-button','disabled' => 'true']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
                </div><!-- user-login -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- signup-page -->



<?php include('include/footer.php'); ?>