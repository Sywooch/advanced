<?php
use frontend\models\Advertisement;
use common\models\Categories;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Country;
/* @var $this yii\web\View */
include('include/header.php'); ?>

    <!-- home-one-info -->
    <section id="home-one-info" class="clearfix home-one">
        <!-- world -->
        <div id="banner-two" class="parallax-section">
            <div class="row text-center">
                <!-- banner -->
                <div class="col-sm-12 " >
                    <div class="banner">
                        <h1 class="title" style="    margin-top: 50px;">Welcome to "Dubarah" Network!</h1>
                        <h3>We links those who has a problem with others <br> who has <span style="color:#ff3a1d">the solution</span></h3>
                        <br /><br />
                        <!-- banner-form -->
                        <div class="banner-form">
                            <?php ActiveForm::begin(['action' => 'index.php?r=categories/search', 'method' => 'get']); ?>


                                <!-- category-change -->

                                <select name="category" class="dropdown category-dropdown">

                                <option value="" >Select Category</option>
                                <?php
                                foreach ($categories as $cat ){
                                    echo "
                                    <option value=\"".$cat['category_id']."\">".$cat['english_name']."</option> ";
                                }
                                  ?>
                                   </select>
                                <!-- category-change -->

                                <input type="text" name="search" class="form-control" placeholder="What are you looking for...?">
                                <button style="height: 49px;" type="submit" class="form-control search-index" value="Search">Search</button>
                            <?php ActiveForm::end(); ?>
                        </div><!-- banner-form -->

                        <!-- banner-socail -->
                        <ul class="banner-socail">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul><!-- banner-socail -->
                    </div>
                </div><!-- banner -->
            </div><!-- row -->
        </div><!-- world -->

        <div class="container">
            <div class="section category-ad text-center">
                <ul class="category-list">
                    <?php
                    foreach ($categories as $category ){
                        $SubCategories = Categories::find()
                        ->where(['parent_category_id'=> $category['category_id']])
                        ->all();
                        $count =0;
                        foreach ($SubCategories as $sub) {

                               $ads = Advertisement::find()
                            ->where(['category_id'=> $sub['category_id'] , 'status' => 1])
                            ->count();
                            $count = $count+$ads;
                          }


                        echo "<li class='category-item'>
                        <a href=\"index.php?r=categories/categories&id=".$category['category_id']."\">
                            <div class='category-icon'><img src='".$category['icon']."' alt='images' class='img-responsive'></div>
                            <span class='category-title'>".$category['english_name']."</span>
                            <span class='category-quantity'>(".$count.")</span>
                        </a>
                    </li> ";
                  }
                    ?>

                </ul>
            </div><!-- category-ad -->

            <!-- trending-ads -->
            <div class="section trending-ads">
                <div class="section-title tab-manu">
                    <h4>Trending Ads</h4>
                     <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#recent-ads"  data-toggle="tab">Recent Ads</a></li>
                        <li role="presentation"><a href="#popular" data-toggle="tab">Popular Ads</a></li>
                        <li role="presentation"><a href="#hot-ads"  data-toggle="tab">Hot Ads</a></li>
                    </ul>
                </div>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- tab-pane -->
                    <div role="tabpanel" class="tab-pane fade in active" id="recent-ads">
                        <!-- ad-item -->

                            <!-- item-image -->
                            <?php
                            foreach ($advert as $ad) {
                                $country = Country::find()
                                    ->where(['country_id' => $ad['country']])
                                    ->one();
                                    Yii::$app->formatter->locale = 'en-GB';
                            echo '
                            <div class="ad-item row">
                            <div class="item-image-box col-sm-3">
                                <div class="item-image">
                                    <a href="index.php?r=advertisement/view&id='.$ad['advertisement_id'].'"><img src="images/listing/1.jpg" alt="Image" class="img-responsive"></a>
                                    <a href=""index.php?r=advertisement/view&id='.$ad['advertisement_id'].'"" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-9">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h4 class="item-title"><a href="index.php?r=advertisement/view&id='.$ad['advertisement_id'].'">'.$ad['title'].'</a></h4>
                                    <div class="item-cat">
                                        <span>'.$ad['description'].'</span>
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#"> '.Yii::$app->formatter->asDate($ad['created_at']).'</a></span>
                                    </div>
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right" style="margin-top: 10;">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="'.$ad['city'].','.$country['country_english_name'].'"><i class="fa fa-map-marker"></i></a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- ad-item -->
                        ';  }?>

                    </div><!-- tab-pane -->

                    <!-- tab-pane -->
                    <div role="tabpanel" class="tab-pane fade" id="popular">

                    </div><!-- tab-pane -->

                    <!-- tab-pane -->
                    <div role="tabpanel" class="tab-pane fade" id="hot-ads">

                    </div><!-- tab-pane -->
                </div>
            </div><!-- trending-ads -->

            <!-- cta -->
            <div class="cta text-center">
                <div class="row">
                    <!-- single-cta -->
                    <div class="col-sm-4">
                        <div class="single-cta">
                            <a href="index.php?r=site/ask-dubarji">
                                <!-- cta-icon -->
                                <div class="cta-icon icon-secure">
                                    <img src="images/icon/old/ask.png" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->

                                <h4>Contact Us</h4>
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie</p>
                            </a>
                        </div>
                    </div><!-- single-cta -->

                    <!-- single-cta -->
                    <div class="col-sm-4">
                        <div class="single-cta">
                            <a href="#">
                                <!-- cta-icon -->
                                <div class="cta-icon icon-support">
                                    <img src="images/icon/old/housing.png" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->

                                <h4>Donate</h4>
                                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit</p>
                            </a>
                        </div>
                    </div><!-- single-cta -->

                    <!-- single-cta -->
                    <div class="col-sm-4">
                        <div class="single-cta">
                            <a href="index.php?r=site/suggestions">
                                <!-- cta-icon -->
                                <div class="cta-icon icon-trading">
                                    <img src="images/icon/old/Suggestions.png" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->

                                <h4>Suggestions</h4>
                                <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>
                            </a>
                        </div>
                    </div><!-- single-cta -->
                </div><!-- row -->
            </div><!-- cta -->
        </div><!-- container -->
    </section><!-- home-one-info -->




<?php include('include/footer.php'); ?>
