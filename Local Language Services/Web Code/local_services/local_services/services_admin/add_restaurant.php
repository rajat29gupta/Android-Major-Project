<?php

include('fcm.php');

	if(isset($_GET['edit_id'])) {
		$data = $db->db_get_array("SELECT * FROM ".TABLE_RESTAURANT." WHERE restaurant_id='".$_GET['edit_id']."'");
		foreach($data as $ex_data);
	}

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		if(!isset($_GET['edit_id'])) {

   //	$lang=implode(',',$_POST['retail_food_language']);

			$arr = array(
				'restaurant_name'			=> $_POST['restaurant_name'],
				'restaurant_address'			=> $_POST['restaurant_address'],
				'restaurant_category'			=> $_POST['restaurant_category'],
				'restaurant_image'			=> $_POST['restaurant_image'],

				'restaurant_language'			=> $_POST['restaurant_language']
			);
			$insert_id = $db->insert(TABLE_RESTAURANT,$arr);
		//	$insert_id = mysql_insert_id();

			//$user = $db->db_get_array("SELECT * FROM ".TABLE_USER." WHERE user_device_id != '' ");
			//foreach($user as $users){
			//`	$did= $users['user_device_id'];

			//$msg = '1---'.$_POST['job_title'].' ';
			//AndroidPushNotification($did, $msg);
		//}

			if($_FILES['restaurant_image']['name'] != "") {
				$ext = substr($_FILES['restaurant_image']['name'],-4);
				if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg") {
					$ext = ($ext == "jpeg") ? ".jpg" : $ext;
					$filename = 'restaurant/'.$insert_id.$ext;
					$filepath = "../uploads/".$filename;
					if(file_exists($filepath)) unlink($filepath);
					copy($_FILES['restaurant_image']['tmp_name'],$filepath);


					//$wsct->resize($_FILES['product_img']['tmp_name'],$filepath,633,200,'255,255,255');
				}

				$condition = "restaurant_id = '".$insert_id."'";

			   echo $db->update(TABLE_RESTAURANT,array('restaurant_image' => $filename),$condition);

			}


		} else {

  // $lang=implode(',',$_POST['restaurant_language']);

				$arr = array(
					'restaurant_name'			=> $_POST['restaurant_name'],
					'restaurant_address'			=> $_POST['restaurant_address'],
					'restaurant_category'			=> $_POST['restaurant_category'],
				'restaurant_image'			=> $_POST['restaurant_image'],
				'restaurant_language'			=> $_POST['restaurant_language']
				);
			$insert_id = $_GET['edit_id'];
			$condition = "restaurant_id = '".$insert_id."' ";
			$db->update(TABLE_RESTAURANT,$arr,$condition);

			if($_FILES['restaurant_image']['name'] != "") {
				$ext = substr($_FILES['restaurant_image']['name'],-4);
				if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg") {
					$ext = ($ext == "jpeg") ? ".jpg" : $ext;
					$filename = 'restaurant/'.$insert_id.$ext;
					$filepath = "../uploads/".$filename;
					if(file_exists($filepath)) unlink($filepath);
					copy($_FILES['restaurant_image']['tmp_name'],$filepath);
					//$wsct->resize($_FILES['product_img']['tmp_name'],$filepath,633,200,'255,255,255');
				}
			}
			$condition = "restaurant_id = '".$insert_id."'";
		$db->update(TABLE_RESTAURANT,array('restaurant_image' => $filename),$condition);
    

		}
		$db->redirect("home.php?pages=view-restaurant");
	}
?>
<script type="text/javascript">
function getExt(filename)
{
    var ext = filename.split('.').pop();
    if(ext == filename) return "";
    return ext;
}
function validate() {

 	re = /^[A-Za-z ]+$/;
	te = /^[0-9]+$/;
	nu = /^\d{2}$/;
	se = /^[0-9A-Za-z ]+[A-Za-z ]+$/;
	email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

  if( document.getElementById('restaurant_name').value == "" ) {
   alert('Please Enter Restaurant Name');
   document.getElementById('restaurant_name').focus();
   return false;
  }

  if(document.getElementById('restaurant_address').value == ""){
  alert("Please Enter Restaurant Address");
  document.getElementById('restaurant_address').focus();
  return false;
  }


  return true;
}
</script>

  <div id="main" style="min-height:0">
	<!-- Start: Header -->
		<?php include("header.php"); ?>
	<!-- End: Header -->
	<!-- Start: Menu -->
		<?php include("menu.php"); ?>
	<!-- End: Menu -->
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <header id="topbar">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-active">
              <a href="home.php?pages=view-restaurant">View Restaurant</a>
            </li>
            <li class="crumb-icon">
              <a href="<?php echo ADMIN_URL;?>">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="<?php echo ADMIN_URL;?>">Home</a>
            </li>
            <li class="crumb-trail">Add Restaurant</li>
          </ol>
        </div>
        <div class="topbar-right" style="margin-top: 7px;">
          <div class="ib topbar-dropdown">
     <!--       <label for="topbar-multiple" class="control-label pr10 fs11 text-muted" style="color:#555;";><?php echo date('l jS \of F Y , h:i:s A'); ?></label>   -->
          </div>
        </div>
      </header>

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">
		<div class="tray tray-center" style="height: 100% !important;">
			<div class="center-block">
				<div class="panel panel-warning panel-border top mb35">
					<div class="panel-heading">
						<span class="panel-title" id="panel-error">
						Add Retail Food
						</span>
					</div>
					<div class="panel-body p20 pb10">
					  <div class="tab-content pn br-n admin-form">
						<div id="tab1_1" class="tab-pane active">
						  <form role="form" method="post" enctype="multipart/form-data" onSubmit="return validate()">
						  <div class="section row mbn">
							<div class="col-md-9 pl15">

							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="restaurant_name" class="field-label">Name</label>
				                    <label for="restaurant_name" class="field prepend-icon">
				                      <input type="text" name="restaurant_name" id="restaurant_name" value="<?=$ex_data['restaurant_name']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter Restaurant Name">
				                    </label>
								</div>
							  </div>

							  <div class="section row mb15">
								<div class="col-xs-12">
									<label for="restaurant_address" class="field-label">Address</label>
													<label for="restaurant_address" class="field prepend-icon">
														<textarea class="gui-textarea accc" style="height: 154px;" id="restaurant_address" name="restaurant_address" placeholder="Enter Restaurant Address"><?=$ex_data['restaurant_address']?></textarea>
													</label>
								</div>
							  </div>

									<!--$languages = explode(",",$ex_data['restaurant_language']); -->
									<div class="section row mb15">
									<div class="col-xs-12">
									  	<label for="restaurant_category" class="field-label">Category</label>
					                    <label for="restaurant_category" class="field prepend-icon">
					                      <input type="radio" <?php if($ex_data['restaurant_category']==0) { echo "checked"; }  ?> name="restaurant_category" id="restaurant_category" value="0"  checked="checked" > Both
																<input type="radio" <?php if($ex_data['restaurant_category']==1) { echo "checked"; }  ?>  name="restaurant_category" id="restaurant_category" value="1"  > Veg
																<input type="radio" <?php if($ex_data['restaurant_category']==2) { echo "checked"; }  ?>  name="restaurant_category" id="restaurant_category" value="2"   > Non-Veg
					                    </label>
									</div>
								  </div>


							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="restaurant_language" class="field-label">Language</label>
				                    <label for="restaurant_language" class="field prepend-icon">
				                      <input type="radio" <?php if($ex_data['restaurant_language']=="Hindi") { echo "checked"; }  ?> name="restaurant_language" id="restaurant_language" value="Hindi"  checked="checked" > Hindi
															<input type="radio" <?php if($ex_data['restaurant_language']=="English") { echo "checked"; }  ?>  name="restaurant_language" id="restaurant_language" value="English"  > English
															<input type="radio" <?php if($ex_data['restaurant_language']=="Spanish") { echo "checked"; }  ?>  name="restaurant_language" id="restaurant_language" value="Spanish"   > Spanish
				                    </label>
								</div>
							  </div>


							</div>

							<div class="col-md-3 pl15">

								<div class="fileupload fileupload-new admin-form" data-provides="fileupload">
									<div class="fileupload-preview thumbnail mb15" style="line-height: 136px !important; height:200px;">
									<?php	if(!isset($_GET['edit_id'])) {	?>

										<img data-src="holder.js/500x250" alt="500x250" src="" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">

									<?php	} else {	?>

									  <img data-src="" alt="500x250" src="../uploads/<?php echo $ex_data['restaurant_image']?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">

									<?php } ?>

									</div>
									<span class="button btn-system btn-file btn-block ph5">
									  <span class="fileupload-new">Restaurant Picture</span>
									  <span class="fileupload-exists">Restaurant Picture</span>
									  <input type="file" name="restaurant_image" id="restaurant_image">
									</span>
								</div>
							</div>



                            <div class="col-lg-12">
							  <div class="section row mb15 mt15">
								<div class="col-lg-3">
								<?php
									if(!isset($_GET['edit_id'])) {
								?>
									<input type="submit" id="maskedKey" class="button btn-primary btn-file btn-block ph5" value="Add Restaurant">
								<?php } else
								{
									?>
								<input type="submit" id="maskedKey" class="button btn-primary btn-file btn-block ph5" value="Update Restaurant">
								<?php
								}
								?>
							    </div>
							  </div>
							</div>
						  </div>
						  <!-- end section row -->
						  </form>
						</div>
					  </div>
					</div>
				</div>
			</div>

		</div>
      </section>
      <!-- End: Content -->
	  <?php include('fixfooter.php') ?>
    </section>
</div>
