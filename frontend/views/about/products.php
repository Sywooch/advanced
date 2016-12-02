<?php

use yii\helpers\Url;
include('about-include/header.php');
?>

<div class="wrapper">
    <section id="products" class="clearfix">
        <div class="card fullwidth clearfix">
            <div class="card-padding page-header-padding">
                <div class="page-header">
                    <h1>Products</h1>
                    <nav class="select-nav">
                        <div class="custom-select" id="sel-product">
                        </div>
                    </nav>
                </div>
            </div>
            <div class="post">

              <?php
              foreach ($products as $product) {

                if(!isset($product[0]['title']))
                  $title = "";
                else
                  $title = $product[0]['title'];

                if(!isset($product[1]['description']))
                  $description = "";
                else
                  $description = $product[1]['description'];

                if(!isset($product[2]['image']))
                  $image = "";
                else
                  $image = $product[2]['image'];

                if(!isset($product[3]['link']))
                  $link = "";
                else
                  $link = $product[3]['link'];

                if(!isset($product[4]['release']))
                  $release = "";
                else
                  $release = $product[4]['release'];

                if(!isset($product[5]['logo']))
                  $logo = "";
                else
                  $logo = $product[5]['logo'];

                if(!isset($product[6]['google_play']))
                  $google_play = "";
                else
                  $google_play = $product[6]['google_play'];

                if(!isset($product[7]['apple_store']))
                  $apple_store = "";
                else
                  $apple_store = $product[7]['apple_store'];

                echo '
                <div class="wrapper">
                   <hr />
                </div>
                <div class="two-columns-products clearfix">
                   <div class="primary-content">
                       <div class="card-padding clearfix">
                           <img src="'.$image.'" alt="'.$title.'" />
                       </div>
                   </div>
                   <div class="secondary-content">
                       <div class="padding">
                           <!-- <div class="card-padding"> -->
                           <header class="clearfix">
                               <h2>'.$title.'</h2>
                               <p class="date">'.$release.'</p>
                           </header>
                           <div class="post-content">
                               <p>'.$description.'</p>
                               <p>Read more updates about '.$title.' <a href="'.$link.'">here</a>.</p>
                           </div>
                           <!-- </div> -->
                       </div>
                   </div>
                </div>';
              }

?>
            </div>
        </div>
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
