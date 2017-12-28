<?php

include('fcm.php');

	if(isset($_GET['edit_id'])) {
		$data = $db->db_get_array("SELECT * FROM ".TABLE_NEWS." WHERE online_news_id='".$_GET['edit_id']."'");
		foreach($data as $ex_data);
	}

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		if(!isset($_GET['edit_id'])) {

   //	$lang=implode(',',$_POST['online_news_language']);

			$arr = array(
				'online_news_title'			=> $_POST['online_news_title'],
				'online_news_description'			=> $_POST['online_news_description'],
				'online_news_image'			=> $_POST['online_news_image'],

				'online_news_language'			=> $_POST['online_news_language']
			);
			$insert_id = $db->insert(TABLE_NEWS,$arr);
		//	$insert_id = mysql_insert_id();

			//$user = $db->db_get_array("SELECT * FROM ".TABLE_USER." WHERE user_device_id != '' ");
			//foreach($user as $users){
			//`	$did= $users['user_device_id'];

			//$msg = '1---'.$_POST['job_title'].' ';
			//AndroidPushNotification($did, $msg);
		//}

			if($_FILES['online_news_image']['name'] != "") {
				$ext = substr($_FILES['online_news_image']['name'],-4);
				if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg") {
					$ext = ($ext == "jpeg") ? ".jpg" : $ext;
					$filename = 'news/'.$insert_id.$ext;
					$filepath = "../uploads/".$filename;
					if(file_exists($filepath)) unlink($filepath);
					copy($_FILES['online_news_image']['tmp_name'],$filepath);
					//$wsct->resize($_FILES['product_img']['tmp_name'],$filepath,633,200,'255,255,255');
				}

				$condition = "online_news_id = '".$insert_id."'";
			   echo $db->update(TABLE_NEWS,array('online_news_image' => $filename),$condition);
			}


		} else {

   $lang=implode(',',$_POST['online_news_language']);

				$arr = array(
					'online_news_title'			=> $_POST['online_news_title'],
				'online_news_description'			=> $_POST['online_news_description'],
				'online_news_image'			=> $_POST['online_news_image'],

				'online_news_language'			=> $_POST['online_news_language']
				);
			$insert_id = $_GET['edit_id'];
			$condition = " online_news_id = '".$insert_id."' ";
			$db->update(TABLE_NEWS,$arr,$condition);

			if($_FILES['online_news_image']['name'] != "") {
				$ext = substr($_FILES['online_news_image']['name'],-4);
				if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg") {
					$ext = ($ext == "jpeg") ? ".jpg" : $ext;
					$filename = 'news/'.$insert_id.$ext;
					$filepath = "../uploads/".$filename;
					if(file_exists($filepath)) unlink($filepath);
					copy($_FILES['online_news_image']['tmp_name'],$filepath);
					//$wsct->resize($_FILES['product_img']['tmp_name'],$filepath,633,200,'255,255,255');
				}
			}
			$condition = "online_news_id = '".$insert_id."'";
			$db->update(TABLE_NEWS,array('online_news_image' => $filename),$condition);


		}
		$db->redirect("home.php?pages=view-online-news");
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

  if( document.getElementById('online_news_title').value == "" ) {
   alert('Please Enter Online News Title');
   document.getElementById('online_news_title').focus();
   return false;
  }

    if(document.getElementById('online_news_description').value == ""){
  alert("Please Enter Online News Description");
  document.getElementById('online_news_description').focus();
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
              <a href="home.php?pages=view-online-news">View Online News</a>
            </li>
            <li class="crumb-icon">
              <a href="<?php echo ADMIN_URL;?>">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="<?php echo ADMIN_URL;?>">Home</a>
            </li>
            <li class="crumb-trail">Add Online News</li>
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
						Add Online News
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
								  	<label for="online_news_title" class="field-label">Title</label>
				                    <label for="online_news_title" class="field prepend-icon">
				                      <input type="text" name="online_news_title" id="online_news_title" value="<?=$ex_data['online_news_title']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter Online News Title">
				                    </label>
								</div>
							  </div>

							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="online_news_description" class="field-label">Description</label>
				                    <label for="online_news_description" class="field prepend-icon">
				                    	<textarea class="gui-textarea accc" style="height: 154px;" id="online_news_description" name="online_news_description" placeholder="Enter Online News Description"><?=$ex_data['online_news_description']?></textarea>
				                    </label>
								</div>
							  </div>


								<!--	$languages = explode(",",$ex_data['online_news_language']);-->

							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="online_news_language" class="field-label">Language</label>
				                    <label for="online_news_language" class="field prepend-icon">
				                      <input type="radio" <?php if($ex_data['online_news_language']=="Hindi") { echo "checked"; }  ?> name="online_news_language" id="online_news_language" value="Hindi" checked="checked"> Hindi
															<input type="radio" <?php if($ex_data['online_news_language']=="English") { echo "checked"; }  ?>  name="online_news_language" id="online_news_language" value="English"  > English
															<input type="radio" <?php if($ex_data['online_news_language']=="Spanish") { echo "checked"; }  ?>  name="online_news_language" id="online_news_language" value="Spanish"   > Spanish
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

									  <img data-src="" alt="500x250" src="../uploads/<?php echo $ex_data['online_news_image']?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">

									<?php } ?>

									</div>
									<span class="button btn-system btn-file btn-block ph5">
									  <span class="fileupload-new">Online News Picture</span>
									  <span class="fileupload-exists">Online News Picture</span>
									  <input type="file" name="online_news_image" id="online_news_image">
									</span>
								</div>
							</div>



                            <div class="col-lg-12">
							  <div class="section row mb15 mt15">
								<div class="col-lg-3">
								<?php
									if(!isset($_GET['edit_id'])) {
								?>
									<input type="submit" id="maskedKey" class="button btn-primary btn-file btn-block ph5" value="Add Online News">
								<?php } else
								{
									?>
								<input type="submit" id="maskedKey" class="button btn-primary btn-file btn-block ph5" value="Update Online News">
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
