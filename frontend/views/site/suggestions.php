<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
include('include/header.php'); ?>

<!-- main -->
<section id="main" class="clearfix contact-us">
    <div class="container">

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li>Suggestions</li>
        </ol><!-- breadcrumb -->
        <h2 class="title">Get in touch</h2>

        <div class="corporate-info">
            <div class="row">
                <!-- contact-info -->
                <div class="col-sm-4">
                    <div class="contact-info">

                        <h2>Corporate Info</h2>
                        <address>
                            <p><strong>adress: </strong>1234 Street Name, City Name, Country</p>
                            <p><strong>Phone:</strong> <a href="#">(123) 456-7890</a></p>
                            <p><strong>Email: </strong><a href="#">info@company.com</a></p>
                        </address>

                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div><!-- contact-info -->

                <!-- feedback -->
                <div class="col-sm-8">
                    <div class="feedback">
                        <h2>Send Us Your Suggestions</h2>
                       <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?= $form->field($model, 'name')->textInput(['class' => "form-control",'placeholder'=>"Name"]) ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?= $form->field($model, 'email')->textInput(['class' => "form-control",'placeholder'=>"Email Id"]) ?>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <?= $form->field($model, 'subject')->textInput(['class' => "form-control",'placeholder'=>"Subject"]) ?>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <?= $form->field($model, 'message')->textarea(['rows' => 7 ,'class' => "form-control",'placeholder'=>"Message"]) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <?= Html::submitButton('Submit Your Message', ['class' => 'btn']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div><!-- feedback -->
            </div><!-- row -->
        </div>
    </div><!-- container -->
</section><!-- main -->


<?php include('include/footer.php'); ?>
