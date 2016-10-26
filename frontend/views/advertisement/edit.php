<?php 
use yii\widgets\ActiveForm;

use frontend\models\Country;
use yii\helpers\ArrayHelper;
use frontend\models\City;
include('include/header.php');

?>
<script type="text/javascript">
function Check() {
if (document.getElementById('con_email').checked) {
	document.getElementById('ifEmail').style.display = 'block';
} else{
	document.getElementById('ifEmail').style.display = 'none';
}
if (document.getElementById('con_phone').checked) {
	document.getElementById('ifphone').style.display = 'block';
} else{
	document.getElementById('ifphone').style.display = 'none';
	}
if (document.getElementById('con_both').checked) {
document.getElementById('ifBoth').style.display = 'block';
	} else{
		document.getElementById('ifBoth').style.display = 'none';
			}
	}	

	</script>

	<div class="container">
	<h2 class="title"><?php echo "Update Ads :".$model->title;?></h2>
		<div class="adpost-details">
				<div class="row">	
					<div class="col-md-8">
					<form action="index.php?r=advertisement/edit" method="POST" enctype="multipart/form-data">
					<fieldset>

					<div class="section postdetails">
						<h4>General Information <span class="pull-right">* Mandatory Fields</span></h4>
						<?php $form = ActiveForm::begin(); ?>

						<div class="row form-group add-title">
							<label class="col-sm-3 label-title">Title for your Ad
							<span class="required">*</span></label>
							<div class="col-sm-9">
							<?= $form->field($model, 'title')->textInput([ 'class' => "form-control",'placeholder'=>"ex, Sony Xperia dual sim 100% brand new "])->label('') ?>
							</div>
						</div>

						<div class="row form-group item-description">
							<label class="col-sm-3 label-title">Description<span class="required">*</span></label>
							<div class="col-sm-9">
							<?= $form->field($model, 'description')->textarea(['rows' => 5 ,'class' => "form-control",'placeholder'=>"Write few lines about your products "])->label('') ?>
							
							</div>
						</div>

						<div class="row form-group">
							<label class="col-sm-3 label-title">Country<span class="required">*</span></label>
							<div class="col-sm-9">
							<?php $countries=Country::find()->all();
							$listData=ArrayHelper::map($countries,'country_id','country_english_name'); ?>

							<?= $form->field($model , 'country')->dropDownList($listData,
                            	['prompt'=>'Select Country',
                            	'onchange'=>'$.post("index.php?r=advertisement/lists&id='.'"+$(this).val(),
                            	function(data){
                            	$("select#advertisement-city").html(data);
                            	});'
                            	])->label('');?>
							</div>
						</div>

						<div class="row form-group">
							<label class="col-sm-3 label-title">City<span class="required">*</span></label>
							<div class="col-sm-9">
							 <?php $cities=City::find()->all();
							$listData2=ArrayHelper::map($cities,'city_id','city_english_name');?> 
							<?= $form->field($model ,'city')->dropDownList($listData2,
                            	['prompt'=>'Select City',
                            	'class' => "form-control"
                            	])->label('');?>
							</div>
					    </div>
						</div>

						<div class="section seller-info">
							<h4>Ad Details</h4>
							<?php
								foreach ($fields as $field) {
									switch ($field['field_type']) {
										case 'text':
										$field_id = $field['field_id'];
										if ($field['is_required']==1){ 
											echo '<div class="row form-group">
											<label class="col-sm-3 label-title">'.$field['english_name'].'<span class="required">*</span></label>';
												}
										else { echo '<div class="row form-group">
											<label class="col-sm-3 label-title">'.$field['english_name'].'</label>';}
											echo'<div class="col-sm-9">
											<input type="text" name="field_'.$field_id.'" class="form-control">
											</div>
											</div>';
										break;

										case 'number':
										$field_id = $field['field_id'];
										if ($field['is_required']==1){ 
											echo '<div class="row form-group">
												<label class="col-sm-3 label-title">'.$field['english_name'].'<span class="required">*</span></label>';
													}
										else { echo '<div class="row form-group">
											<label class="col-sm-3 label-title">'.$field['english_name'].'</label>';}
											echo'<div class="col-sm-9">
											<input type="number" name="field_'.$field_id.'" class="form-control">
											</div>
											</div>';
										break;
										case 'list':
										$field_id = $field['field_id'];										
										   if ($field['is_required']==1){ 
											echo '<div class="row form-group">
											<label class="col-sm-3 label-title">'.$field['english_name'].'<span class="required">*</span></label>';
												}
											else { echo '<div class="row form-group">
												<label class="col-sm-3 label-title">'.$field['english_name'].'</label>';}

												echo'<div class="col-sm-9">
												<select class="form-control" name="field_'.$field_id.'"> 
													<option value="">Select ..</option>';
												foreach ($data as $field_list_item) {
											        foreach ($field_list_item as $item) {
										                if($item['field_id']==$field_id){
										                    echo '<option value="'.$item['field_list_data_id'].'">'.$item['english_content'].'</option>';
										                		}
										                	}
										            	}
												echo '</select>
													</div>
												</div>';
												break;
												case 'radio':
												$field_id = $field['field_id'];										
										            if ($field['is_required']==1){ 
														echo '<div class="row form-group">
														<label class="col-sm-3 label-title">'.$field['english_name'].'<span class="required">*</span></label>';
															}
													else { echo '<div class="row form-group">
														<label class="col-sm-3 label-title">'.$field['english_name'].'</label>';}

														echo'<div class="col-sm-9">';
														foreach ($data as $field_list_item) {
										                foreach ($field_list_item as $item) {
										                	if($item['field_id']==$field_id){
										                    echo '<input type="radio" name="field_'.$field_id.'" id="'.$item['field_list_data_id'].'" checked="" value = "'.$item['field_list_data_id'].'"> <label for="'.$item['field_list_data_id'].'" >'.$item['english_content'].'</label>';
										                		}
										                	}
										            		}
															echo '
															</div>
														</div>';
												break;
												case 'checkbox':
												$field_id = $field['field_id'];										
										            if ($field['is_required']==1){ 
														echo '<div class="row form-group">
														<label class="col-sm-3 label-title">'.$field['english_name'].'<span class="required">*</span></label>';
															}
													else { echo '<div class="row form-group">
														<label class="col-sm-3 label-title">'.$field['english_name'].'</label>';}

														echo'<div class="col-sm-9">';
														foreach ($data as $field_list_item) {
										                foreach ($field_list_item as $item) {
										                	if($item['field_id']==$field_id){
										                    echo '<input type="checkbox" name="field['.$field_id.'][]" value="'.$item['field_list_data_id'].'"> <label >'.$item['english_content'].'</label></br>'; 
										                		}
										                	}
										            		}
															echo '
															</div>
														</div>';
												break;
													}
										}
									?>

						</div>

						<div class="section seller-info">
									<h4>Notifications</h4>
									<p>How do you want to receive requests for this position?</p>
									<div class="row form-group">
										<div class="col-sm-9">
											<input type="radio" name="sellerType" value="Email" id="con_email" checked=""   onclick="javascript:Check();">
											<label for="con_email">Email</label>
											<input type="radio" name="sellerType" value="phoneCalls" id="con_phone" onclick="javascript:Check();"> 
											<label for="con_phone">Phone Call</label>
											<input type="radio" name="sellerType" value="both" id="con_both" 
											onclick="javascript:Check();"> 
											<label for="con_both">Both</label>
											
										</div>
										<div class="col-sm-12">
											<br />
												 <div id="ifEmail" style="display:block"> 
												 	<?= $form->field($model, 'email')->textInput(['class' => "form-control",'placeholder'=>"Please add the email ex:john@dubarah.com"])->label('') ?>
												 </div>
												 <div id="ifphone" style="display:none">
												 <?= $form->field($model, 'phone')->textInput(['class' => "form-control",'placeholder'=>"Please add the phone"])->label('') ?>
												 </div>
												 <div id="ifBoth" style="display:none">
												 	<?= $form->field($model, 'email')->textInput(['class' => "form-control",'placeholder'=>"Please add the email ex:john@dubarah.com"])->label('') ?>
												 	<?= $form->field($model, 'phone')->textInput(['class' => "form-control",'placeholder'=>"Please add the phone"])->label('') ?>
												 </div>
											 
										</div>
									</div>
								
								</div><!-- section -->

							<button type="submit" id="submit" class="btn btn-primary">Update</button>
							<a href="#" class="btn btn-danger">Cancle</a>
								<?php ActiveForm::end(); ?>
						</fieldset>
						</form>
					</div>
					<div class="col-md-4">
						<div class="section quick-rules">
							<h4>Quick rules</h4>
							<p class="lead">Posting an ad on <a href="#">Dubarah.com</a> is free! However, all ads must follow our rules:</p>

							<ul>
								<li>Make sure you post in the correct category.</li>
								<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
								<li>Do not upload pictures with watermarks.</li>
								<li>Do not post ads containing multiple items unless it's a package deal.</li>
								<li>Do not put your email or phone numbers in the title or description.</li>
								<li>Make sure you post in the correct category.</li>
								<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
								<li>Do not upload pictures with watermarks.</li>
								<li>Do not post ads containing multiple items unless it's a package deal.</li>
							</ul>
						</div>
					</div><!-- quick-rules -->	
				</div>
		</div>
	</div>


<?php include('include/footer.php'); ?>