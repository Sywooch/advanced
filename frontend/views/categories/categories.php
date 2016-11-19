<?php include('include/header.php');
use frontend\models\Country;
use frontend\models\Advertisement;
use yii\widgets\LinkPager;?>

	<!-- main -->
	<section id="main" class="clearfix category-page">
		<div class="container">

			<div class="banner">
			
				<!-- banner-form -->
				<div class="banner-form banner-form-full">
					<form action="#">
						<!-- category-change -->
						<div class="dropdown category-dropdown">						
							<a data-toggle="dropdown" href="#"><span class="change-text">Select Category</span> <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu category-change">
								<li><a  href="#">Fashion & Beauty</a></li>
								<li><a href="#">Cars & Vehicles</a></li>
								<li><a href="#">Electronics & Gedgets</a></li>
								<li><a href="#">Real Estate</a></li>
								<li><a href="#">Sports & Games</a></li>
							</ul>								
						</div><!-- category-change -->

						<!-- language-dropdown -->
						<div class="dropdown category-dropdown language-dropdown ">						
							<a data-toggle="dropdown" href="#"><span class="change-text">Select Countray</span> <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu  language-change">
								<li><a href="#">United Kingdom</a></li>
								<li><a href="#">United States</a></li>
								<li><a href="#">China</a></li>
								<li><a href="#">Russia</a></li>
							</ul>								
						</div><!-- language-dropdown -->
					
						<input type="text" class="form-control" placeholder="Type Your key word">
						<button type="submit" class="form-control" value="Search">Search</button>
					</form>
				</div><!-- banner-form -->
			</div>
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><?php echo $model->english_name; ?> </li>
				</ol><!-- breadcrumb -->						
				<h2 class="title"><?php echo $model->english_name; ?></h2>
			</div>
			
	
			<div class="category-info">	
				<div class="row">
					<!-- accordion-->
					<div class="col-md-3 col-sm-4">
						<div class="accordion">
							<!-- panel-group -->
							<div class="panel-group" id="accordion">
							 	
								<!-- panel -->
								<div class="panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
											<h4 class="panel-title">Categories<span class="pull-right"><i class="fa fa-minus"></i></span></h4>
										</a>
									</div><!-- panel-heading -->

									<div id="accordion-one" class="panel-collapse collapse in">
										<!-- panel-body -->
										<div class="panel-body">
											<?php
											foreach ($MainCategories as $category )
											{
												echo " <a href=\"\">".$category['english_name']."</a> <br/>";
													$id =  $category['category_id'];
													$query2 = "SELECT * from categories where parent_category_id ='$id'";
													$dbCommand = Yii::$app->db->createCommand($query2);
													$SubCategories = $dbCommand->queryAll();
													$count = count($SubCategories);
													if ($count != 0){
														foreach ($SubCategories as $subCategory)
														{
															$count = \frontend\models\Advertisement::find()->where(['category_id'=>$subCategory['category_id'] , 'status' => 1])->count();
															echo '<ul>
																<li><a href="index.php?r=categories/categories&id='.$subCategory['category_id'].'">'.$subCategory['english_name'].' <span>('.$count.')</span></a></li>
																</ul>';
														}
													}

											}
											?>

										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->

								<!-- panel -->

								<!-- panel -->

								<div class="advertisement text-center">
										<a href="#"><img src="http://placehold.it/300x250" alt="" class="img-responsive"></a>
									</div> 
							 </div><!-- panel-group -->
						</div>
					</div><!-- accordion-->

					<!-- recommended-ads -->
					<div class="col-sm-9 col-md-9">				
						<div class="section recommended-ads">
							<!-- featured-top -->
							<div class="featured-top">
								<h4>Recommended Ads for You</h4>
								<div class="dropdown pull-right">
								
								<!-- category-change -->
								<div class="dropdown category-dropdown">
									<h5>Sort by:</h5>						
									<a data-toggle="dropdown" href="#"><span class="change-text">Popular</span><i class="fa fa-caret-square-o-down"></i></a>
									<ul class="dropdown-menu category-change">
										<li><a href="#">Featured</a></li>
										<li><a href="#">Newest</a></li>
										<li><a href="#">All</a></li>
										<li><a href="#">Bestselling</a></li>
									</ul>								
								</div><!-- category-change -->														
								</div>							
							</div><!-- featured-top -->	

							<?php
								foreach ($ads as $ad ) {
									$country = Country::find()
										->where(['country_id' => $ad['country']])
										->one();
									$category = \common\models\Categories::find()->where(['category_id' => $ad['category_id']])->one();
									$category = $category['english_name'];
									echo '<!-- ad-item -->
							<div class="ad-item row">
								<!-- item-image -->
								<div class="item-image-box col-sm-4">
									<div class="item-image">
										<a href="index.php?r=advertisement/view&id=' . $ad['advertisement_id'] . '"><img src="images/listing/1.jpg" alt="Image" class="img-responsive"></a>
										<span class="featured-ad">Featured</span>
									</div><!-- item-image -->
								</div>
								
								<!-- rending-text -->
								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h4 class="item-title"><a href="index.php?r=advertisement/view&id=' . $ad['advertisement_id'] . '">' . $ad['title'] . '</a></h4>
										<div class="item-cat">
											<span>' . $category . ' :  </span>
											<span>' . $ad['description'] . '  </span>
										</div>										
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated"><a href="#">Date: ' . $ad['created_at'] . '</a></span>
										</div>										
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="' . $ad['city'] . ',' . $country['country_english_name'] . '"><i class="fa fa-map-marker"></i> </a>
											<a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div><!-- ad-item -->';
								}
								echo '<div class="text-center">';
							echo LinkPager::widget([
								'pagination' => $pagination,
							]);
							echo '</div>';
							?>

						</div>
					</div><!-- recommended-ads -->

				</div>	
			</div>
		</div><!-- container -->
	</section><!-- main -->
	
	
	
<?php include('include/footer.php'); ?>