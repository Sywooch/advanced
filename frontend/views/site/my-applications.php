<?php include('include/header.php'); 
use yii\widgets\LinkPager;
use common\models\Categories;
use yii\helpers\Html;

?>

	<!-- myads-page --> 
	<section id="main" class="clearfix myads-page">
		<div class="container">

			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>My Account</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">My Ads</h2>
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
								<a href="index.php?r=site/my-ads"><?php echo $count; ?><small>My ADS</small></a>
							</div>
							<div class="favorites">
								<a href="#">18<small>Favorites</small></a>
							</div>
						</div>								
					</div><!-- user-profile -->
							
					<ul class="user-menu">
						<li><a href="index.php?r=site/my-profile">Profile</a></li>
						<li ><a href="index.php?r=site/my-ads">My ads</a></li>
						<li class="active"><a href="index.php?r=site/my-applications">Applications</a></li>
						<li><a href="archived-ads.html">Ads Preferences</a></li>
						<li><a href="index.php?r=site/my-wishlist">Whishlist</a></li>
					</ul>
			
			</div><!-- ad-profile -->			
			
			<div class="ads-info">
				<div class="row">
					<div class="col-sm-8">
						<div class="my-ads section">
							<h2>My ads</h2>
							<?php 
							foreach ($my_ads as $ad) {
								$subCat = Categories::find()->where(['category_id'=>$ad['category_id']])->one();
								
								$parent = $subCat['parent_category_id'];
								$mainCat = Categories::find()
								->where(['category_id'=>$parent])
								->one();
								$subCat = $subCat['english_name'];
								$mainCat = $mainCat['english_name'];
							echo '
							<!-- ad-item -->
							<div class="ad-item row">
								<!-- item-image -->
								<div class="item-image-box col-sm-4">
									<div class="item-image">
										<a href="index.php?r=advertisement/view&id='.$ad['advertisement_id'].'"><img src="images/trending/1.jpg" alt="Image" class="img-responsive"></a>
									</div><!-- item-image -->
								</div>
								
								<!-- rending-text -->
								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										
										<h4 class="item-title"><a href="index.php?r=advertisement/view&id='.$ad['advertisement_id'].'">'.$ad['title'].'</a></h4>
										<div class="item-cat">
											<span><a href="#">'.$mainCat.'</a></span> /
											<span><a href="#">'.$subCat.'</a></span>
										</div>										
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">Posted On: <a href="#">'.$ad['created_at'].'</a></span>
											<span class="visitors">Visitors: 221</span> 
										</div>										
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a class="edit-item" href="index.php?r=advertisement/edit&id='.$ad['advertisement_id'].' " data-toggle="tooltip" data-placement="top" title="Edit this ad">
											<i class="fa fa-pencil"></i></a>
											';

											echo '
											<a class="delete-item" href="index.php?r=advertisement/delitem&id='.$ad['advertisement_id'].' " data-toggle="tooltip" data-placement="top" title="Delete this ad">
											<i class="fa fa-times"></i></a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div><!-- ad-item -->';}

							  echo LinkPager::widget([
								    'pagination' => $pagination,
								]);?>

								</div>
								</div>
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
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->
	
	
	<?php include('include/footer.php'); ?>