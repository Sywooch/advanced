<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\models\Categories;
use frontend\models\Country;
use common\models\Fields;
use frontend\models\Advertisement;
use yii\bootstrap\Modal;

use yii\helpers\Url;
use frontend\models\Apply;
use frontend\models\Wishlists;
include('include/header.php');

 $id = $model->advertisement_id;
?>



<script type="text/javascript">
function wishlist(session_id,id)
{   document.getElementById("demo").style.display = 'none';
  //document.getElementById("demo").style.backgroundColor = "green";
  //document.getElementById("demo").value = "added successfully..";
  values = {session_id:session_id,id:id};
  console.log(values);
    $.ajax({
        type: "post",
        url: "index.php?r=advertisement/wishlist",
        data: values ,
        success: function (response) {
           console.log(response);
        }
    });
}
 </script>
<section id="main" class="clearfix category-page">
    <div class="container">
        <div class="banner">
            <div class="breadcrumb-section">
                        <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="index.php">Search</a></li>
                    <li> Details </li>
                </ol><!-- breadcrumb -->
                <h2 class="title"> <?php echo $model->title; ?></h2>
            </div>

            <div style="margin-bottom: 10px; margin-left:50%;">
                   <?php
                   $session = Yii::$app->session;
                    $session_id=$session->get('id');
                    if ($session_id != NULL){

                   $count = Apply::find()->where(['user_id' => $session_id])
                                        ->andwhere(['advertisement_id'=>$id])
                                        ->count();
                   if ($count == 0 ) {
                   echo Html::button('Apply',['value'=>Url::to('index.php?r=advertisement/apply-form&id='.$id.''),'class'=>'btn btn-success ','id'=>'modalButton','style' => 'margin-right:10px']);
                   }

                   $count1 = Wishlists::find()->where(['user_id' => $session_id])
                                        ->andwhere(['advertisement_id'=>$id])
                                        ->count();
                    if ($count1 == 0){

                        echo '<input type="submit" class="btn btn-danger" id="demo" value="add to wishlist" onclick="wishlist('.$session_id.','.$id.')">';

                            }
                    }
                    ?>
                           <?php
                            Modal::begin([
                                'options'=>[ 'tabindex' => false],
                                'id'=>'modalId',
                                'size'=>'modal-lg',
                                'header' => '<h2>Apply Form</h2>',
                                ]);

                            echo "<div id='modalContentId'></div>";
                            Modal::end();
                      ?>

                    </div>


                    <div class="banner form-full">
                    <div class="row">
                    <div class="section postdetails col-md-8">
                       <h3 style="color:#ff3a1d">  General Information </h3>
                         <?php
                         $title = $model->title;
                         $description = $model->description;
                         $city = $model->city;
                         $phone = $model->phone;

                         $email= $model->email;
                         $created = $model->created_at;

                         //get user
                         $user_id= $model->user_id;
                         $user = User::find()->where(['id'=>$user_id])->one();
                         $user = $user['username'];
                        //get category
                         $category = $model->category_id;
                         $category = Categories::find()->where(['category_id'=>$category])->one();
                         $category = $category['english_name'];
                         //get country
                         $country = $model->country;
                         $country = Country::find()->where(['country_id'=>$country])->one();
                         $country = $country['country_english_name'];


                         echo '<div class="row form-group add-title">
										               <label class="col-sm-3 label-title">Title</label>
										                              <div class="col-sm-6">
										                                    <div class="form-group field-advertisement-title">
                                                             <label class="control-label" for="advertisement-title"></label>
                                                             <span style="color:#000000">'.$title.'<span>
                                                             <div class="help-block"></div>
                                                        </div>
                                                  </div>
									            </div>';

                              echo '<div class="row form-group add-title">
                                        <label class="col-sm-3 label-title">Dscription</label>
                                                       <div class="col-sm-6">
                                                             <div class="form-group field-advertisement-title">
                                                                  <label class="control-label" for="advertisement-title"></label>
                                                                <span style="color:#000000">'.$description.'<span>
                                                                  <div class="help-block"></div>
                                                             </div>
                                                       </div>
                                   </div>';

                                   echo '<div class="row form-group add-title">
                                            <label class="col-sm-3 label-title">Created By</label>
                                                           <div class="col-sm-6">
                                                                 <div class="form-group field-advertisement-title">
                                                                       <label class="control-label" for="advertisement-title"></label>
                                                                       <span style="color:#000000">'.$user.'<span>
                                                                       <div class="help-block"></div>
                                                                  </div>
                                                            </div>
                                       </div>';

                                       echo '<div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Category</label>
                                                               <div class="col-sm-6">
                                                                     <div class="form-group field-advertisement-title">
                                                                           <label class="control-label" for="advertisement-title"></label>
                                                                           <span style="color:#000000">'.$category.'<span>
                                                                           <div class="help-block"></div>
                                                                      </div>
                                                                </div>
                                           </div>';

                                           echo '<div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Country</label>
                                                                   <div class="col-sm-6">
                                                                         <div class="form-group field-advertisement-title">
                                                                               <label class="control-label" for="advertisement-title"></label>
                                                                               <span style="color:#000000">'.$country.'<span>
                                                                               <div class="help-block"></div>
                                                                          </div>
                                                                    </div>
                                               </div>';

                                               echo '<div class="row form-group add-title">
                                                        <label class="col-sm-3 label-title">City</label>
                                                                       <div class="col-sm-6">
                                                                             <div class="form-group field-advertisement-title">
                                                                                   <label class="control-label" for="advertisement-title"></label>
                                                                                <span style="color:#000000">'.$city.'<span>
                                                                                   <div class="help-block"></div>
                                                                              </div>
                                                                        </div>
                                                   </div>';


                                                   echo '<div class="row form-group add-title">
                                                            <label class="col-sm-3 label-title">Created Date</label>
                                                                           <div class="col-sm-6">
                                                                                 <div class="form-group field-advertisement-title">
                                                                                       <label class="control-label" for="advertisement-title"></label>
                                                                                  <span style="color:#000000">'.$created.'<span>
                                                                                       <div class="help-block"></div>
                                                                                  </div>
                                                                            </div>
                                                       </div>';




                               ?>

                               <h3 style="color:#ff3a1d">  Details </h3>
                               <?php
                         //get category related fields
                         $fields = $model->category_related;

                         $fields = json_decode($fields);
                         if ( !empty($fields) ) {
                         foreach ($fields as $field) {
                             foreach ($field as $key => $value) {
                               //echo $value . " in " . $key . ", ";

                                $type = Fields::find()->where(['field_id'=>$key])->one();
                                $type = $type['field_type'];
                                $field_name = Fields::find()->where(['field_id'=>$key])->one();
                                $field_name = $field_name['english_name'];
                                    switch ($type) {
                                        case 'text':
                                                $val = $value;
                                                echo '<div class="row form-group add-title">
                                                         <label class="col-sm-3 label-title">'.$field_name.'</label>
                                                         <div class="col-sm-6">
                                                                <div class="form-group field-advertisement-title">
                                                                  <label class="control-label" for="advertisement-title"></label>
                                                                  <span style="color:#000000">'.$val.'<span>
                                                                  <div class="help-block"></div>
                                                                </div>
                                                        </div>
                                                      </div>';
                                            break;

                                        case 'number' :
                                                $val = $value;
                                                echo '<div class="row form-group add-title">
                                                         <label class="col-sm-3 label-title">'.$field_name.'</label>
                                                         <div class="col-sm-6">
                                                                <div class="form-group field-advertisement-title">
                                                                  <label class="control-label" for="advertisement-title"></label>
                                                                  <span style="color:#000000">'.$val.'<span>
                                                                  <div class="help-block"></div>
                                                                </div>
                                                        </div>
                                                      </div>';
                                            break;
                                        case 'list':
                                            $field_item = "SELECT * from field_list_data where  field_list_data_id = $value ";
                                            $dbCommand = Yii::$app->db->createCommand($field_item);
                                            $field_item = $dbCommand->queryOne();
                                            $field_item = $field_item['english_content'];
                                            echo '<div class="row form-group add-title">
                                                     <label class="col-sm-3 label-title">'.$field_name.'</label>
                                                     <div class="col-sm-6">
                                                            <div class="form-group field-advertisement-title">
                                                              <label class="control-label" for="advertisement-title"></label>
                                                              <span style="color:#000000">'.$field_item.'<span>
                                                              <div class="help-block"></div>
                                                            </div>
                                                    </div>
                                                  </div>';
                                            break;
                                        case 'radio':
                                            $field_item = "SELECT * from field_list_data where  field_list_data_id = $value ";
                                            $dbCommand = Yii::$app->db->createCommand($field_item);
                                            $field_item = $dbCommand->queryOne();
                                            $field_item = $field_item['english_content'];
                                            echo '<div class="row form-group add-title">
                                                     <label class="col-sm-3 label-title">'.$field_name.'</label>
                                                     <div class="col-sm-6">
                                                            <div class="form-group field-advertisement-title">
                                                              <label class="control-label" for="advertisement-title"></label>
                                                              <span style="color:#000000">'.$field_item.'<span>
                                                              <div class="help-block"></div>
                                                            </div>
                                                    </div>
                                                  </div>';
                                            break;
                                        case 'checkbox':
                                            $field_item = "SELECT * from field_list_data where  field_list_data_id = $value ";
                                            $dbCommand = Yii::$app->db->createCommand($field_item);
                                            $field_item = $dbCommand->queryOne();
                                            $field_item = $field_item['english_content'];
                                            echo '<div class="row form-group add-title">
                                                     <label class="col-sm-3 label-title">'.$field_name.'</label>
                                                     <div class="col-sm-6">
                                                            <div class="form-group field-advertisement-title">
                                                              <label class="control-label" for="advertisement-title"></label>
                                                              <span style="color:#000000">'.$field_item.'<span>
                                                              <div class="help-block"></div>
                                                            </div>
                                                    </div>
                                                  </div>';
                                            break;
                                        }  }
                                }
                             }

                         ?>
                         <h3 style="color:#ff3a1d"> Contact Information </h3>
                         <?php

                          if ($phone != NULL ){
                                echo '<div class="row form-group add-title">
                                         <label class="col-sm-3 label-title">Phone Number</label>
                                         <div class="col-sm-6">
                                                <div class="form-group field-advertisement-title">
                                                  <label class="control-label" for="advertisement-title"></label>
                                                  <span style="color:#000000">'.$phone.'<span>
                                                  <div class="help-block"></div>
                                                </div>
                                        </div>
                                      </div>';
                              }
                            if ($email != NULL )
                            echo '<div class="row form-group add-title">
                                     <label class="col-sm-3 label-title">Email</label>
                                     <div class="col-sm-6">
                                            <div class="form-group field-advertisement-title">
                                              <label class="control-label" for="advertisement-title"></label>
                                              <span style="color:#000000">'.$email.'<span>
                                              <div class="help-block"></div>
                                            </div>
                                    </div>
                                  </div>';
                               ?>

                               <!-- <h4>Share with : </h4>
                               <ul class="socail-links">
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                        </ul><!-- banner-socail -->
                               </div>



                        </div>
                        <!-- <div class="col-md-4">

                        </div> -->

                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-8">
                    <div class="section recommended-ads">
                    <h4>Related Ads</h4>
                    <?php
                    foreach ($recomends as $recomend) {
                        $country = Country::find()
                                ->where(['country_id' => $recomend['country']])
                                ->one();
                        $category = Categories::find()
                                    ->where(['category_id'=>$recomend['category_id']])
                                    ->one();
                        $category = $category['english_name'];
                          Yii::$app->formatter->locale = 'en-GB';
                            echo '
                            <div class="ad-item row">
                            <div class="item-image-box col-sm-3">
                                <div class="item-image">
                                    <a href="index.php?r=advertisement/view&id='.$recomend['advertisement_id'].'"><img src="images/listing/1.jpg" alt="Image" class="img-responsive"></a>
                                    <a href=""index.php?r=advertisement/view&id='.$recomend['advertisement_id'].'"" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-9">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h4 class="item-title"><a href="index.php?r=advertisement/view&id='.$recomend['advertisement_id'].'">'.$recomend['title'].'</a></h4>
                                    <div class="item-cat">
                                        <span>'.$recomend['description'].'</span>
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#"> '.Yii::$app->formatter->asDate($recomend['created_at']).'</a></span>
                                    </div>
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right" style="margin-top: 10;">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="'.$recomend['city'].','.$country['country_english_name'].'"><i class="fa fa-map-marker"></i></a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- ad-item -->
              ';
                    }
                    ?>

                    </div>
                    </div>
                    </div>
        </div>



    </div>

</section>


<?php include('include/footer.php'); ?>
