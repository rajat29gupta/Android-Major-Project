<?php

include('fcm.php');

	if(isset($_GET['edit_id'])) {
		$data = $db->db_get_array("SELECT * FROM ".TABLE_JOB." WHERE job_id='".$_GET['edit_id']."'");
		foreach($data as $ex_data);
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST") {

		if(!isset($_GET['edit_id'])) {

			'job_title'			=> $_POST['job_title'],
			$price =  json_encode(array("general"=>$_POST['general'],"obc"=>$_POST['obc'],"scst"=>$_POST['scst'],
			"female"=>$_POST['female']));

			$arr = array(
				'job_place'			=> $_POST['job_place'],
				'job_fees'			=> $_POST['job_fees'],
			//	'form_fees'			=> $_POST['form_fees'],
				'job_price'			=> $price,
				'job_description'	=> $_POST['job_description'],
				'job_last_date'		=> $_POST['job_last_date'],
				'job_junction_last_date'		=> $_POST['job_junction_last_date'],
			);
			$insert_id = $db->insert(TABLE_JOB,$arr);			
		//	$insert_id = mysql_insert_id();

			$user = $db->db_get_array("SELECT * FROM ".TABLE_USER." WHERE user_device_id != '' ");
			foreach($user as $users){
				$did= $users['user_device_id'];
			
			$msg = '1---'.$_POST['job_title'].' ';
			AndroidPushNotification($did, $msg);
		}

			if($_FILES['job_image']['name'] != "") {
				$ext = substr($_FILES['job_image']['name'],-4);
				if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg") {
					$ext = ($ext == "jpeg") ? ".jpg" : $ext;
					$filename = 'jobs/'.$insert_id.$ext;
					$filepath = "../uploads/".$filename;
					if(file_exists($filepath)) unlink($filepath);
					copy($_FILES['job_image']['tmp_name'],$filepath);
					//$wsct->resize($_FILES['product_img']['tmp_name'],$filepath,633,200,'255,255,255');
				}

				$condition = "job_id = '".$insert_id."'";
			    $db->update(TABLE_JOB,array('job_image' => $filename),$condition);
			}
			

		} else {

			$price =  json_encode(array("general"=>$_POST['general'],"obc"=>$_POST['obc'],"scst"=>$_POST['scst'],
			"female"=>$_POST['female']));

				$arr = array(
					'job_title'			=> $_POST['job_title'],
					'job_place'			=> $_POST['job_place'],
					'job_fees'			=> $_POST['job_fees'],
				//	'form_fees'			=> $_POST['form_fees'],
					'job_price'			=> $price,
					'job_description'	=> $_POST['job_description'],
					'job_last_date'		=> $_POST['job_last_date'],
					'job_junction_last_date'		=> $_POST['job_junction_last_date'],

				);
			$insert_id = $_GET['edit_id'];
			$condition = " job_id = '".$insert_id."' ";
			$db->update(TABLE_JOB,$arr,$condition);

			if($_FILES['job_image']['name'] != "") {
				$ext = substr($_FILES['job_image']['name'],-4);
				if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg") {
					$ext = ($ext == "jpeg") ? ".jpg" : $ext;
					$filename = 'jobs/'.$insert_id.$ext;
					$filepath = "../uploads/".$filename;
					if(file_exists($filepath)) unlink($filepath);
					copy($_FILES['job_image']['tmp_name'],$filepath);
					//$wsct->resize($_FILES['product_img']['tmp_name'],$filepath,633,200,'255,255,255');
				}
			}
			$condition = "job_id = '".$insert_id."'";
			$db->update(TABLE_JOB,array('job_image' => $filename),$condition);


		}
		$db->redirect("home.php?pages=view-jobs");
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
  
  if( document.getElementById('job_title').value == "" ) {
   alert('Please Enter Job Title');
   document.getElementById('job_title').focus();
   return false;
  }
 
  if(!te.test(document.getElementById('job_fees').value)){
  alert("Please Enter Fees In Number");
  document.getElementById('job_fees').focus();
  return false;
  }
  if(!te.test(document.getElementById('form_fees').value)){
  alert("Please Enter Form Fees In Number");
  document.getElementById('form_fees').focus();
  return false;
  } 
  if(document.getElementById('job_description').value == ""){
  alert("Please Enter Job Description");
  document.getElementById('job_description').focus();
  return false;
  }
  if(document.getElementById('datepicker').value == ""){
  alert("Please Select Last Date");
  document.getElementById('datepicker').focus();
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
              <a href="home.php?pages=view-jobs">View Jobs</a>
            </li>
            <li class="crumb-icon">
              <a href="<?php echo ADMIN_URL;?>">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="<?php echo ADMIN_URL;?>">Home</a>
            </li>
            <li class="crumb-trail">Add Jobs</li>
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
						Add Jobs						
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
								  	<label for="job_title" class="field-label">Job Title</label>
				                    <label for="job_title" class="field prepend-icon">
				                      <input type="text" name="job_title" id="job_title" value="<?=$ex_data['job_title']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter Job Title">
				                    </label>
								</div>
							  </div>

							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="job_place" class="field-label">Job Place</label>
				                    <label for="job_place" class="field prepend-icon">
				                      <input type="text" name="job_place" id="job_place" value="<?=$ex_data['job_place']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter Job Place">
				                    </label>
								</div>
							  </div>

							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="job_fees" class="field-label">Job Fees</label>
				                    <label for="job_fees" class="field prepend-icon">
				                      <input type="text" name="job_fees" id="job_fees" value="<?=$ex_data['job_fees']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter Job Fees">
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

									  <img data-src="" alt="500x250" src="../<?php echo $ex_data['job_image']?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
									
									<?php } ?>

									</div>
									<span class="button btn-system btn-file btn-block ph5">
									  <span class="fileupload-new">Job Picture</span>
									  <span class="fileupload-exists">Job Picture</span>
									  <input type="file" name="job_image" id="job_image">
									</span>
								</div>
							</div>

							<div class="col-md-12 pl15">

							  <div class="section row mb15" style="margin-top: 20px">
								<div class="col-xs-3">
								  	<label for="general" class="field-label">General Price</label>
				                    <label for="general" class="field prepend-icon">
				                      <input type="text" name="general" id="general" value="<?=$ex_data['general']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter General Price">
				                    </label>
								</div>

								<div class="col-xs-3">
								  	<label for="obc" class="field-label">OBC Price</label>
				                    <label for="obc" class="field prepend-icon">
				                      <input type="text" name="obc" id="obc" value="<?=$ex_data['obc']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter OBC Price">
				                    </label>
								</div>

								<div class="col-xs-3">
								  	<label for="scst" class="field-label">SC/ST Price</label>
				                    <label for="scst" class="field prepend-icon">
				                      <input type="text" name="scst" id="scst" value="<?=$ex_data['scst']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter SC/ST Price">
				                    </label>
								</div>

								<div class="col-xs-3">
								  	<label for="female" class="field-label">Female Candidate Price</label>
				                    <label for="female" class="field prepend-icon">
				                      <input type="text" name="female" id="female" value="<?=$ex_data['female']?>"  class="event-name gui-input br-light light focusss" placeholder="Enter Female Candidate Price">
				                    </label>
								</div>
							  </div>

							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="job_description" class="field-label">Job Description</label>
				                    <label for="job_description" class="field prepend-icon">
				                    	<textarea class="gui-textarea accc" style="height: 154px;" id="job_description" name="job_description" placeholder="Enter Job Description"><?=$ex_data['job_description']?></textarea>							
				                    </label>
								</div>
							  </div>

							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="job_last_date" class="field-label">Job Last Date</label>
				                    <label for="job_last_date" class="field prepend-icon">
				                      <input type="text" name="job_last_date" id="datepicker" value="<?=$ex_data['job_last_date']?>"  class=" event-name gui-input br-light light focusss" placeholder="Enter Job Last Date">
				                    </label>
								</div>
							  </div>

							  <div class="section row mb15">
								<div class="col-xs-12">
								  	<label for="job_junction_last_date" class="field-label">Job Junction Last Date</label>
				                    <label for="job_junction_last_date" class="field prepend-icon">
				                      <input type="text" name="job_junction_last_date" id="datepicker1" value="<?=$ex_data['job_junction_last_date']?>"  class=" event-name gui-input br-light light focusss" placeholder="Enter Job Junction Last Date">
				                    </label>
								</div>
							  </div>

							</div>
							
                            <div class="col-lg-12">
							  <div class="section row mb15 mt15">
								<div class="col-lg-3">
								<?php
									if(!isset($_GET['edit_id'])) {
								?>
									<input type="submit" id="maskedKey" class="button btn-primary btn-file btn-block ph5" value="Add Jobs">
								<?php } else
								{
									?>
								<input type="submit" id="maskedKey" class="button btn-primary btn-file btn-block ph5" value="Update Jobs">	
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
