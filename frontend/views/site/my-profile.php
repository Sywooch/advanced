<?php include('include/header.php'); ?>

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
			
			<div class="ad-profile section">	
				<div class="user-profile">
					<div class="user-images">
						<img src="images/user.jpg" alt="User Images" class="img-responsive">
					</div>
					<div class="user">
						<h2>Hello, <a href="#"><?php echo $user['username']; ?></a></h2>
						<h5>You last logged in at: 14-01-2016 6:40 AM [ USA time (GMT + 6:00hrs)]</h5>
					</div>

					<div class="favorites-user">
						<div class="my-ads">
							<a href="index.php?r=site/my-ads">10<small>My ADS</small></a>
						</div>
						<div class="favorites">
							<a href="#">18<small>Whishlist</small></a>
						</div>
					</div>								
				</div><!-- user-profile -->
						
				<ul class="user-menu">
					<li class="active"><a href="index.php?r=site/my-profile">Profile</a></li>
					<li><a href="index.php?r=site/my-ads">My ads</a></li>
					<li><a href="favourite-ads.html">Applications</a></li>
					<li><a href="archived-ads.html">Ads Preferences</a></li>
					<li><a href="delete-account.html">Whishlist</a></li>
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
								<div class="form-group">
									<label>Full Name</label>
									<input type="text" class="form-control" placeholder="Jhon Doe">
								</div>

								<div class="form-group">
									<label>Email Address</label>
									<input type="email" class="form-control" placeholder="jhondoe@mail.com">
								</div>

								<div class="form-group">
									<label for="name-three">Mobile</label>
									<input type="text" class="form-control" placeholder="+213 1234 56789">
								</div>

								<div class="form-group">
									<label>Country</label>
									<select class="form-control">
										<option value="#">Syria</option>
										<option value="#">United Arab Emirates</option>
									</select>
								</div>	

								<div class="form-group">
									<label>City</label>
									<select class="form-control">
										<option value="#">Damascus</option>
										<option value="#">Aleppo</option>
										<option value="#">Homs</option>
									</select>
								</div>	
			
							</div><!-- profile-details -->

							<!-- change-password -->
							<div class="change-password section">
								<h2>Change password</h2>
								<!-- form -->
								<div class="form-group">
									<label>Old Password</label>
									<input type="password" class="form-control" >
								</div>
								
								<div class="form-group">
									<label>New password</label>
									<input type="password" class="form-control">	
								</div>
								
								<div class="form-group">
									<label>Confirm password</label>
									<input type="password" class="form-control">
								</div>															
							</div><!-- change-password -->
							
							<!-- preferences-settings -->
							<div class="preferences-settings section">
								<h2>Preferences Settings</h2>
								<!-- checkbox -->
								<div class="checkbox">
									<label><input type="checkbox" name="receive"> I want to receive newsletter.</label>
								</div><!-- checkbox -->						
							</div><!-- preferences-settings -->
							
							<a href="#" class="btn">Update Profile</a>
							<a href="#" class="btn cancle">Cancle</a>
						</div><!-- user-pro-edit -->
					</div><!-- profile -->

					<div class="col-sm-4 text-center">
						<div class="recommended-cta">					
							<div class="cta">
								<!-- single-cta -->						
								<div class="single-cta">
								<a href="index.php?r=site/ask-dubarji">
									<!-- cta-icon -->
									<div class="cta-icon icon-secure">
										<img src="images/icon/old/ask.png" alt="Icon" class="img-responsive">
									</div><!-- cta-icon -->

									<h4>Ask Dubarji</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
									</a>
								</div><!-- single-cta -->

								<!-- single-cta -->
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-support">
										<img src="images/icon/old/housing.png" alt="Icon" class="img-responsive">
									</div><!-- cta-icon -->

									<h4>Donate</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
								</div><!-- single-cta -->
							

								<!-- single-cta -->
								<div class="single-cta">
								<a href="index.php?r=site/suggestions">
									<!-- cta-icon -->
									<div class="cta-icon icon-trading">
										<img src="images/icon/old/Suggestions.png" alt="Icon" class="img-responsive">
									</div><!-- cta-icon -->

									<h4>Suggestions</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
									</a>
								</div><!-- single-cta -->

							</div>
						</div><!-- cta -->
					</div><!-- recommended-cta-->
				</div><!-- row -->	
			</div>				
		</div><!-- container -->
	</section><!-- ad-profile-page -->
	
	<?php include('include/footer.php'); ?>