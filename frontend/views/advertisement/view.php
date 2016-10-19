<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\models\Categories;
use frontend\models\Country;
use common\models\Fields;

include('include/header.php');
?>

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

                    <div class="banner form-full">
                    <div class="row">
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


                         echo '
                                <div>
                               Title       :    '.$title.' </br> 
                               Dscription  :    '.$description.' </br>
                               Created By  :    '.$user.' </br>
                               Category    :     '.$category.' </br>
                               Country     :     '.$country.'  </br>
                               City        :      '.$city.'  </br>
                                Created Date :     '.$created.' ';
                              
                               ?> 

                               <h3 style="color:#ff3a1d">  Details  :  </h3>
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
                                                echo $field_name."   :   ". $val ; 
                                                echo "</br>";   
                                            break;

                                        case 'number' : 
                                                $val = $value;
                                                echo $field_name."   :   ". $val ;
                                                echo "</br>"; 
                                            break; 
                                        case 'list':
                                            $field_item = "SELECT * from field_list_data where  field_list_data_id = $value ";
                                            $dbCommand = Yii::$app->db->createCommand($field_item);
                                            $field_item = $dbCommand->queryOne();
                                            $field_item = $field_item['english_content'];
                                            echo $field_name."   :   ". $field_item;
                                            echo "</br>";  
                                            break;
                                        case 'radio':
                                            $field_item = "SELECT * from field_list_data where  field_list_data_id = $value ";
                                            $dbCommand = Yii::$app->db->createCommand($field_item);
                                            $field_item = $dbCommand->queryOne();
                                            $field_item = $field_item['english_content'];
                                            echo $field_name."   :   ". $field_item;
                                            echo "</br>";  
                                            break;
                                        case 'checkbox':
                                            $field_item = "SELECT * from field_list_data where  field_list_data_id = $value ";
                                            $dbCommand = Yii::$app->db->createCommand($field_item);
                                            $field_item = $dbCommand->queryOne();
                                            $field_item = $field_item['english_content'];
                                            echo $field_name."   :   ". $field_item;
                                            echo "</br>";  
                                            break;
                                        }

                                    }
                                }
                             }

                         ?>
                         <h3 style="color:#ff3a1d"> For Contact  : </h3>
                         <?php 

                          if ($phone != NULL )
                                echo 'Phone :    '.$phone;
                            if ($email != NULL )
                                echo 'Emil :    '.$email;
                           
                               echo ' </div>'; 
                               ?>


                        
                        </div>
                                
                    </div>
        </div>


    </div>

</section>


<?php include('include/footer.php'); ?>