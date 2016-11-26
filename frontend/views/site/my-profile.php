<?php include('include/header.php'); 
use frontend\models\Advertisement;
use frontend\models\Wishlists;
use yii\widgets\ActiveForm;

$count = Advertisement::find()->where(['user_id'=>$model->id])->count();
$Wcount=Wishlists::find()->where(['user_id'=>$model->id])->count();
?>
	<!-- ad-profile-page -->
	<section id="main" class="clearfix  ad-profile-page">
		<div class="container">
		
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li>My Account</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">My Profile</h2>
			</div><!-- banner -->


			<?php if (Yii::$app->session->hasFlash('success')): ?>
				<div class="alert alert-success alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<h4><i class="icon fa fa-check"></i>Saved!</h4>
					<?= Yii::$app->session->getFlash('success') ?>
				</div>
			<?php endif; ?>
			
			<div class="ad-profile section">	
				<div class="user-profile">
					<div class="user-images">
						<img src="images/user.jpg" alt="User Images" class="img-responsive">
					</div>
					<div class="user" style="    margin-top: 25px;">
						<h2>Hello, <a href="#"><?php echo $model->username; ?></a></h2>
					</div>

					<div class="favorites-user">
						<div class="my-ads">
							<a href="index.php?r=site/my-ads"><?php echo $count; ?><small>My ADS</small></a>
						</div>
						<div class="favorites">
							<a href="index.php?r=site/my-wishlist"><?php echo $Wcount; ?><small>Whishlist</small></a>
						</div>
					</div>								
				</div><!-- user-profile -->
						
				<ul class="user-menu">
					<li class="active"><a href="index.php?r=site/my-profile">Profile</a></li>
					<li><a href="index.php?r=site/my-ads">My ads</a></li>
					<li><a href="favourite-ads.html">Applications</a></li>
				</ul>
			</div><!-- ad-profile -->	

			<div class="profile section">
				<div class="row">
					<div class="col-sm-8">
						<div class="user-pro-section">
							<!-- profile-details -->
							<div class="profile-details section">
								<h2>Profile Details</h2>
								<!-- form -->
								
								 <?php $form = ActiveForm::begin(); ?>
								<div class="form-group">
						
									<label>Full Name</label>
									<?= $form->field($model, 'username')->textInput(['autofocus' => true , 'class' => "form-control"])->label(''); ?>
								</div>

								<div class="form-group">
									<label>Email Address</label>
									<?= $form->field($model, 'email')->textInput(['class' => "form-control"])->label('') ?>
								</div>

								<div class="form-group">
									<label for="name-three">Mobile</label>
									<?= $form->field($model, 'mobile')->textInput(['class' => "form-control"])->label('') ?>
								</div>
								
								<div class="form-group">
								<label>Country</label>
    							 <?= $form->field($model, 'place')->dropDownList(['Damascus, Syria'=>'Damascus, Syria',
				                    'London UK'=>'London UK','Newyork, USA'=>'Newyork, USA','Seoul, Korea'=>'Seoul, Korea'],['prompt' => 'Select Country'])->label('') ?>
				                 </div>
				                 <!-- <div class="form-group">
								<label>Confrim your password please :</label>
    							 <?= $form->field($model, 'currentPassword')->passwordInput()->label('') ?>
				                 </div> -->
				                 <!-- preferences-settings -->
				                 <div class="preferences-settings section">
								<h2>Preferences Settings</h2>
								<!-- checkbox -->
								<div class="checkbox">
									<label><input type="checkbox" name="receive"> I want to receive newsletter.</label>
								</div><!-- checkbox -->						
								</div><!-- preferences-settings -->
				                 <button type="submit" class="btn">Save Changes</button>
								<?php $form = ActiveForm::end(); ?>
							
							</div><!-- profile-details -->

							<!-- change-password -->
							<div class="change-password section">
								<?php $form = ActiveForm::begin(); ?>
								<h2>Change password</h2>
								<!-- form -->
								<div class="form-group">
									<label>Old Password</label>
									<?= $form->field($model1,'currentPassword')->passwordInput(['class'=>'form-control'])->label('') ?>
								</div>
								
								<div class="form-group">
									<label>New password</label>
									<?= $form->field($model1,'newPassword')->passwordInput()->label('') ?>	
								</div>
								
								<div class="form-group">
									<label>Confirm password</label>
									<?= $form->field($model1,'confirmPassword')->passwordInput(['class'=>'form-control'])->label('') ?>
								</div>	
								<button type="submit" id="submit" class="btn">Save</button>
							<button  class="btn cancle">Cancel</button>
							<?php ActiveForm::end(); ?>														
							</div><!-- change-password -->
							
						</div><!-- user-pro-edit -->
					</div><!-- col -->

				</div><!-- row -->	
			</div>	<!--profile section -->			
		</div><!-- container -->
	</section><!-- ad-profile-page -->
	
	<?php include('include/footer.php'); ?>