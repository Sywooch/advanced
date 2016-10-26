
<?php 
//use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Country;
use yii\helpers\ArrayHelper;
use frontend\models\City;

include('include/header.php'); ?>

<!-- <script type="text/javascript">
	function getId(val)
	{
		console.log(val);
		$.ajax({
			type :"post",
			url: "index.php?r=advertisement/get-data",
			data :'country_id'+val,
			success:function (data)
			{
				console.log(data);
				$("#city").html(data);}
		})
		console.log("success...");
	}
	
</script> -->
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
	<!-- main -->
	<section id="main" class="clearfix ad-details-page">
		<div class="container">
		
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Add Dubarah</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Post Free Ad</h2>
			</div><!-- banner -->

			<div class="adpost-details">
				<div class="row">	
					<div class="col-md-8">
					<form action="index.php?r=advertisement/ad-post-details" method="POST" enctype="multipart/form-data">
							<fieldset>
							
								<div class="section postdetails">
									<h4>General Information <span class="pull-right">* Mandatory Fields</span></h4>
									<div class="form-group selected-product">
										<ul class="select-category list-inline">
											<li>
												<a href="index.php?r=advertisement/ad-post">
													<span class="select">
														<img src="images/icon/2.png" alt="Images" class="img-responsive">
													</span>
													<?php 

													echo $categoryname; ?>
												</a>
											</li>

											<li class="active">
												<a href="#"><?php echo $subcategoryname; ?> </a>
											</li>
										</ul>
										<a class="edit" href="#"><i class="fa fa-pencil"></i>Edit</a>
									</div>


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
										<?= $form->field($model, 'description')->textarea(['rows' => 8 ,'class' => "form-control",'placeholder'=>"Write few lines about your products "])->label('') ?>
							
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

									<div class="row form-group add-image">
										<label class="col-sm-3 label-title">Photos for your ad <span>(This will be your cover photo )</span> </label>
										<div class="col-sm-9">
											<h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload / Drag and Drop Files <span>You can add multiple images.</span></h5>
											<div class="upload-section" id="container">
												<label class="upload-image">
												<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    											<?= $form->field($upload, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*',
    											'id' => 'files'])->label('') ?>
    											<output id="list"></output>
<!-- <input type="file" id="files" name="files[]" multiple />
<output id="list"></output> -->

<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
          reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<label class="upload-second"><img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/></label>'].join('');
          document.getElementById('container').insertBefore(span, null);
            document.getElementById('files').className = "";
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>											</label>										
											</div>	
										</div>
									</div>
															
								</div><!-- section -->
								
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
								
									
								</div><!-- section -->


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
								

								<div class="checkbox section agreement">
									<label for="send">
										<input type="checkbox" name="send" id="send" onchange="
										var val = document.getElementById('submit');
										if (this.checked == true)
    											{
        									val.disabled = false;
    											}
    									else
										    {
										        val.disabled = true;
										    }
										"
										>
										I agree to <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Dubarah.
									</label>
									<button type="submit" id="submit" disabled="true" class="btn btn-primary">Post Your Ad</button>
								</div><!-- section -->
								
								<?php ActiveForm::end(); ?>
								<?php ActiveForm::end(); ?>

							
							</fieldset>	
							</form>
					</div>
				

					<!-- quick-rules -->	
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
				</div><!-- photos-ad -->				
			</div>	
		</div><!-- container -->
	</section><!-- main -->
	
<?php include('include/footer.php'); ?>
