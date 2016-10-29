<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
 include('include/header.php'); ?>

    <!-- signin-page -->
    <section id="main" class="clearfix user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->         
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="user-account">
                        <h2>User Login</h2>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true ,'class' => "form-control",'placeholder'=>"Full Name"])->label('') ?>

                <?= $form->field($model, 'password')->passwordInput(['class' => "form-control",'placeholder'=>"Password"])->label('') ?>

                 <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn', 'name' => 'login-button']) ?>
                </div>

                <div class="user-option">
                <div class="checkbox pull-left">
                <?= $form->field($model, 'rememberMe')->checkbox(["chaked"]) ?>
                </div>
                <div class="pull-right forgot-password">
                  <?= Html::a('Forgot password', ['site/request-password-reset']) ?>.
                </div>
                </div>

            <?php ActiveForm::end(); ?>



            
             <a href="index.php?r=site/signup" class="btn-primary">Create a New Account</a>
            </div><!-- user-login -->           
            </div><!-- row -->  
        </div><!-- container -->
    </section><!-- signin-page -->
    
    
    
<?php include('include/footer.php'); ?>
