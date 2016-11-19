<?php include('include/header.php'); ?>

 <script type="text/javascript">
  
  function submitinfo(id,sub){ 
  	values = {id:id,sub:sub};
    document.getElementById("next-btn").style.backgroundColor = "#fc3c2c";

  	console.log(values);
    $.ajax({
        type: "post",
        url: "index.php?r=advertisement/save-session",
        data: values ,
        });
    console.log("success...");
    }

  </script>


<?php

if(isset($_GET['id']))
	$id = $_GET['id'];
else
	$id = 0;

?>
	<!-- post-page -->
	<section id="main" class="clearfix ad-post-page">
		<div class="container">

			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Add Dubarah</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Post Free Ad</h2>
			</div><!-- banner -->

			<div id="ad-post">
				<div class="row category-tab">	
					<div class="col-md-4 col-sm-6">
						<div class="section cat-option select-category post-option">
							<h4>Select Main Category</h4>
							<ul role="tablist">
								<?php
								foreach ($MainCategories as $mainCategory)
								{

									if ($mainCategory['category_id'] == $id)
										echo "<li class=\"select\"><a style=\"color: #e7412c;\" href=\"index.php?r=advertisement/ad-post&id=".$mainCategory['category_id']."\" >
										<span class=\"select\">
											<img src='".$mainCategory['icon']."' alt=\"Images\" class=\"img-responsive\">
										</span>
									 	".$mainCategory['english_name'] ."</a></li>";
									else
										echo "<li ><a href=\"index.php?r=advertisement/ad-post&id=".$mainCategory['category_id']."\" >
										<span class=\"select\">
											<img src='".$mainCategory['icon']."' alt=\"Images\" class=\"img-responsive\">
										</span>
									 	".$mainCategory['english_name'] ."</a></li>";
								}
								?>
							</ul>
						</div>
					</div>

					<!-- Tab panes -->
					<div class="col-md-4 col-sm-6">
						<div class="section tab-content subcategory post-option">
							<h4>Select a subcategory</h4>
							<div role="tabpanel" class="tab-pane active" id="cat">
							<?php
										foreach ($subCategories as $subCategory){
											$subId = $subCategory['category_id'];
											$parent = $subCategory['parent_category_id'];
											echo  "<ul>
											<li><a onclick="."submitinfo($parent,$subId);"." href=\"#\">".$subCategory['english_name']."</a></li></ul> ";
										
								}
							
								?>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="section next-stap post-option">
							<h2>Post an Ad in just <span>30 seconds</span></h2>
							<p>Please DO NOT post multiple ads for the same items or service. All duplicate, spam and wrongly categorized ads will be deleted.</p>
							<div class="btn-section">
								<a href="index.php?r=advertisement/ad-post-details" id = "next-btn" class="btn">Next</a>
								<a href="#" class="btn-info">or Cancle</a>
							</div>
						</div>
					</div><!-- next-stap -->
				</div>
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2 text-center">
						<div class="ad-section">
							<a href="#"><img src="images/ads/3.jpg" alt="Image" class="img-responsive"></a>
						</div>
					</div>
				</div><!-- row -->
			</div>				
		</div><!-- container -->
	</section><!-- post-page -->

<?php include('include/footer.php'); ?>