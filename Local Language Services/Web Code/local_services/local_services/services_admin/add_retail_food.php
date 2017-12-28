<?php

include('fcm.php');

	if(isset($_GET['edit_id'])) {
		$data = $db->db_get_array("SELECT * FROM ".TABLE_RETAIL_FOOD." WHERE retail_food_id='".$_GET['edit_id']."'");
		foreach($data as $ex_data);
	}

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		if(!isset($_GET['edit_id'])) {

   //	$lang=implode(',',$_POST['retail_food_language']);

			$arr = array(
				'retail_food_name'			=> $_POST['retail_food_name'],
				'retail_food_price'			=> $_POST['retail_food_price'],
				'retail_food_image'			=> $_POST['retail_food_image'],

				'retail_food_language'			=> $_POST['retail_food_language']
			);
			$insert_id = $db->insert(TABLE_RETAIL_FOOD,$arr);
		//	$insert_id = mysql_insert_id();

			//$user = $db->db_get_array("SELECT * FROM ".TABLE_USER." WHERE user_device_id != '' ");
			//foreach($user as $users){
			//`	$did= $users['user_device_id'];

			//$msg = '1---'.$_POST['job_title'].' ';
			//AndroidPushNotification($did, $msg);
		//}

			if($_FILES['retail_food_image']['name'] != "") {
				$ext = substr($_FILES['retail_food_image']['name'],-4);
				if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg") {
					$ext = ($ext == "jpeg") ? ".jpg" : $ext;
					$filename = 'food/'.$insert_id.$ext;
					$filepath = "../uploads/".$filename;
					if(file_exists($filepath)) unlink($filepath);
					copy($_FILES['retail_food_image']['tmp_name'],$filepath);


					//$wsct->resize($_FILES['product_img']['tmp_name'],$filepath,633,200,'255,255,255');
				}

				$condition = "retail_food_id = '".$insert_id."'";

			   echo $db->update(TABLE_RETAIL_FOOD,array('retail_food_image' => $filename),$condition);

			}


		} else {

  // $lang=implode(',',$_POST['retail_food_language']);

				$arr = array(
					'retail_food_name'			=> $_POST['retail_food_name'],
				'retail_food_price'			=> $_POST['retail_food_price'],
				'retail_food_image'			=> $_POST['retail_food_image'],
				'retail_food_language'			=> $_POST['retail_food_language']
				);
			$insert_id = $_GET['edit_id'];
			$condition = "retail_food_id = '".$insert_id."' ";
			$db->update(TABLE_RETAIL_FOOD,$arr,$condition);

			if($_FILES['retail_food_image']['name'] != "") {
				$ext = substr($_FILES['retail_food_image']['name'],-4);
				if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg") {
					$ext = ($ext == "jpeg") ? ".jpg" : $ext;
					$filename = 'food/'.$insert_id.$ext;
					$filepath = "../uploads/".$filename;
					if(file_exists($filepath)) unlink($filepath);
					copy($_FILES['retail_food_image']['tmp_name'],$filepath);
					//$wsct->resize($_FILES['product_img']['tmp_name'],$filepath,633,200,'255,255,255');
				}
			}
			$condition = "retail_food_id = '".$insert_id."'";
			$db->update(TABLE_RETAIL_FOOD,array('retail_food_image' => $filename),$condition);


		}
		$db->redirect("home.php?pages=view-retail-food");
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

  if( document.getElementById('retail_food_name').value == "" ) {
   alert('Please Enter Food Name');
   document.getElementById('retail_food_name').focus();
   return false;
  }

  if(!te.test(document.getElementById('retail_food_price').value)){
  alert("Please Enter Price In Number");
  document.getElementById('retail_food_price').focus();
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
              <a href="home.php?pages=view-retail-food">View Retail Food</a>
            </li>
            <li class="crumb-icon">
              <a href="<?php echo ADMIN_URL;?>">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="<?php echo ADMIN_URL;?>">Home</a>
            </li>
            <li class="crumb-trail">Add Retail Food</li>
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
								  	<label for="retail_food_name" class="field-label">Name</label>
				                    <label for="retail_food_name" class="field prepend-icon">
				                      <input type="text" name="retail_food_name" id="retail_food_name" value="<?=$ex_data['retail_food_name']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter Food Name">
				                    </label>
								</div>
							  </div>

							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="retail_food_price" class="field-label">Price</label>
				                    <label for="retail_food_price" class="field prepend-icon">
				                      <input type="text" name="retail_food_price" id="retail_food_price" value="<?=$ex_data['retail_food_price']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter Food Price">
				                    </label>
								</div>
							  </div>
								<?php
									$languages = explode(",",$ex_data['retail_food_language']);
								?>
							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="retail_food_language" class="field-label">Language</label>
				                    <label for="retail_food_language" class="field prepend-icon">
				                      <input type="radio" <?php if($ex_data['retail_food_language']=="Hindi") { echo "checked"; }  ?> name="retail_food_language" id="retail_food_language" value="Hindi"  checked="checked" > Hindi
															<input type="radio" <?php if($ex_data['retail_food_language']=="English") { echo "checked"; }  ?>  name="retail_food_language" id="retail_food_language" value="English"  > English
															<input type="radio" <?php if($ex_data['retail_food_language']=="Spanish") { echo "checked"; }  ?>  name="retail_food_language" id="retail_food_language" value="Spanish"   > Spanish
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

									  <img data-src="" alt="500x250" src="../uploads/<?php echo $ex_data['retail_food_image']?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">

									<?php } ?>

									</div>
									<span class="button btn-system btn-file btn-block ph5">
									  <span class="fileupload-new">Food Picture</span>
									  <span class="fileupload-exists">Food Picture</span>
									  <input type="file" name="retail_food_image" id="retail_food_image">
									</span>
								</div>
							</div>



                            <div class="col-lg-12">
							  <div class="section row mb15 mt15">
								<div class="col-lg-3">
								<?php
									if(!isset($_GET['edit_id'])) {
								?>
									<input type="submit" id="maskedKey" class="button btn-primary btn-file btn-block ph5" value="Add Retail Food">
								<?php } else
								{
									?>
								<input type="submit" id="maskedKey" class="button btn-primary btn-file btn-block ph5" value="Update Retail Food">
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
