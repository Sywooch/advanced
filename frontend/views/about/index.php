<?php

use yii\helpers\Url;
include('about-include/header.php');
?>

<!--end:.header-primary-->
<div class="wrapper">
    <h1 class="page-title">Dubarah's Newsroom</h1>
    <div class="home-hero">
        <div class="tag-top-stories">
            <div class="tag-top-stories-inner">Top Stories </div>
        </div>
        <div class="featured-carousel">


<?php

foreach ($stories as $story) {

  echo '<div class="slide">
        <div class="slide-panel">
            <!--<p class="date">October 10, 2016</p> -->
            <h2 class="large">
                <a href="#">
                    '.$story[0]['title'].'
                </a>
            </h2>
            <p class="excerpt">'.$story[1]['desc'].'</p>
            <a href="#" class="read-more">Read more</a>
        </div>
        <div class="slide-image"  style="background-image: url('.$story[2]['image'].')">
            <div class="slide-advance">
                <!-- next slide trigger -->
            </div>
        </div>
    </div>';
}
?>


        </div>
        <!--end:.hero-slideshow-slides-->
        <div class="featured-carousel-next">Next</div>
        <div class="featured-carousel-pager">
        </div>
        <!--end:.hero-slideshow-pager-->
    </div>
    <!--end:.hero-slideshow-->
    <section class="two-columns home-main">
        <div class="primary-content float">
            <div class="home-recent-news">
                <div class="card-padding clearfix">
                    <a class="right small" href="#">See all</a>
                    <h2 class="heading">Recent News and Announcements</h2>


                    <?php
                    Yii::$app->formatter->locale = 'en-GB';
                    foreach ($news as $new) {

echo'  <div class="home-recent-news-item home-recent-news-item-1">
          <p class="date">'.Yii::$app->formatter->asDate($new[0]['date']).'</p>
          <h3><a href="#">'.$new[0]['title'].'</a></h3>
        </div>';
          }


?>

                    <!--end:.home-recent-news-item-->
                    <div style="overflow: hidden; height: 0px; visibility: hidden;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div>
                </div>
            </div>
            <!--end:.home-recent-news-->
        </div>
        <!--end:.primary-content-->
        <div class="secondary-content">
            <div class="home-link-box">
                <h2>Contact Us</h2>
                <p><a href="mailto:press@fb.com">press@fb.com</a></p>
            </div>
            <div class="home-events">
                <h2>Upcoming Events</h2>
                <?php
foreach ($events as $event) {


                echo '
                <div class="upcoming-event">
                    <div class="event-date">
                        <span class="month">'.$event[3]['month'].'</span>
                        <span class="day">'.$event[2]['day'].'</span>
                    </div>
                    <!--end:.event-date-->
                    <div class="event-details">
                        <h3><a href="#">'.$event[1]['title'].'</a></h3>
                        <p class="location">'.$event[0]['type'].'</p>
                        <p>'.$event[4]['desc'].'</p>
                        <a href="#" class="read-more">Read more</a>
                    </div>
                </div>';
              }
                ?>
            </div>
            <!--end:.home-events-->
        </div>
        <!--end:.secondary-content-->
    </section>
    <!-- Your Google Analytics Plugin is missing the tracking ID -->
</div>
<!--end:.wrapper-->
<div id="newsroom-like">
    <div class="fb-like" data-href="https://newsroom.fb.com/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" data-width="330"></div>
</div>
<div class="wrapper">
    <?php
    include('about-include/footer.php');
    ?>
