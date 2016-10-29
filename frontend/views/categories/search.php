<?php
use frontend\models\Country;
use frontend\models\Advertisement;
use yii\web\Linkable;
use yii\widgets\LinkPager;
use yii\base\Configurable;

use yii\data\Pagination;

 include('include/header.php'); ?>
	<!-- main -->
	<section id="main" class="clearfix category-page">
		<div class="container">

			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li> Search result </li>
				</ol><!-- breadcrumb -->						
				<h2 class="title"> Search result</h2>
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
											<h4 class="panel-title">Sub Categories<span class="pull-right"><i class="fa fa-minus"></i></span></h4>
										</a>
									</div><!-- panel-heading -->

									<div id="accordion-one" class="panel-collapse collapse in">
										<!-- panel-body -->
										<div class="panel-body">
											<?php
											echo '<a href="#">'.$main.'</a>';
											?>
											<ul>
											<?php 
											foreach ($SubCategories as $sub) {
												$count = Advertisement::find()->where(['category_id' => $sub->category_id])->count();
											echo '<li><a href="index.php?r=categories/search&category='.$sub['category_id'].'&search=">&raquo;'.$sub['english_name'].'<span>('.$count.')</span></a></li>';
											}?>
											</ul>

										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->


								<!-- panel -->
								<div class="panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion-two">
											<h4 class="panel-title">Filter<span class="pull-right"><i class="fa fa-minus"></i></span></h4>
										</a>
									</div><!-- panel-heading -->

									<div id="accordion-two" class="panel-collapse collapse in">
										<!-- panel-body -->
										<div class="panel-body">
											<a href="#">Career Level</a>
											<label for="new"><input type="checkbox" name="new" id="new"> Student/Intern</label>
											<label for="used"><input type="checkbox" name="used" id="used"> Junior</label>
											<label for="used"><input type="checkbox" name="used" id="used"> Mid-level</label>
											<label for="used"><input type="checkbox" name="used" id="used"> Senior</label>
											<label for="used"><input type="checkbox" name="used" id="used"> Executive/Director</label>
											<br />
											<a href="#">Minimum Experience</a>
											<label for="new"><input type="checkbox" name="new" id="new"> 1-2 Years</label>
											<label for="used"><input type="checkbox" name="used" id="used"> 2-5 Years</label>
											<label for="used"><input type="checkbox" name="used" id="used"> 5-10 Years</label>
											<label for="used"><input type="checkbox" name="used" id="used"> 10+ Years</label>
											<br />
											<a href="#">Employment Type</a>
											<label for="new"><input type="checkbox" name="new" id="new"> Full Time</label>
											<label for="used"><input type="checkbox" name="used" id="used"> Part Time</label>
											<label for="used"><input type="checkbox" name="used" id="used"> Contract</label>
											<label for="used"><input type="checkbox" name="used" id="used"> Temporary</label>
											<br />
											<a href="#">Salary</a>
											<div class="price-range"><!--price-range-->
												<div class="price">
													<span>$100 - <strong>$700</strong></span>
													<div class="dropdown category-dropdown pull-right">	
														<a data-toggle="dropdown" href="#"><span class="change-text">USD</span><i class="fa fa-caret-square-o-down"></i></a>
														<ul class="dropdown-menu category-change">
															<li><a href="#">USD</a></li>
															<li><a href="#">AUD</a></li>
															<li><a href="#">EUR</a></li>
															<li><a href="#">GBP</a></li>
															<li><a href="#">JPY</a></li>
														</ul>								
													</div><!-- category-change -->													
													 <input type="text"value="" data-slider-min="0" data-slider-max="700" data-slider-step="5" data-slider-value="[250,450]" id="price" ><br />
												</div>
												<br />
												<button value="Search" class="btn btn-primary btn-block" type="submit">Search</button>
											</div><!--/price-range-->
										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->

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
								foreach ($ads as $ad) {	
								$country = Country::find()
						        ->where(['country_id' => $ad['country']])
						        ->one();
									$category = \common\models\Categories::find()->where(['category_id'=>$ad['category_id']])->one();
									$category = $category['english_name'];
								echo '<div class="ad-item row">
								<!-- item-image -->
								<div class="item-image-box col-sm-4">
									<div class="item-image">
										<a href="index.php?r=advertisement/view&id='.$ad['advertisement_id'].'"><img src="images/listing/1.jpg" alt="Image" class="img-responsive"></a>
										<span class="featured-ad">Featured</span>
									</div><!-- item-image -->
								</div>
								<!-- rending-text -->
								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h4 class="item-title"><a href="index.php?r=advertisement/view&id='.$ad['advertisement_id'].'">'.$ad['title'].'</a></h4>
										<div class="item-cat">
											<span> '.$ad['description'].' </span>
										</div>										
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated"><a href="#">Date: '.$ad['created_at'].'</span>
										</div>										
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="'.$ad['city'].','.$country['country_english_name'].'"><i class="fa fa-map-marker"></i> </a>
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

							<!-- pagination  -->
							<!-- <div class="text-center">
								<ul   class="pagination ">
									<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
									<li class="active" ><a href="#">1</a></li>
									<li ><a href="#" >2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">...</a></li>
									<li><a href="#">10</a></li>
									<li><a href="#">20</a></li>
									<li><a href="#">30</a></li>
									<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>			
								</ul>
								<div id='page_navigation'></div>
							</div> --><!-- pagination  -->	
												
						</div>
					</div><!-- recommended-ads -->

				</div>	
			</div>
		</div><!-- container -->
	</section><!-- main -->
	
	
	
<?php include('include/footer.php'); ?>