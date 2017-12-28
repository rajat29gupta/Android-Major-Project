<?php
	$detail = $db->db_get_array("SELECT * FROM ".TABLE_ADMIN." WHERE admin_id = 1"); 
	foreach($detail as $pro);
	
	if($_SERVER['REQUEST_METHOD'] == "POST") {
				$arr = array(
				'admin_name'		=> $_POST['admin_name'],
				'admin_number'	    => $_POST['admin_number'],
				'admin_email'		=> $_POST['admin_email'],
			);		

			$insert_id = 1;
			if($_FILES['admin_image']['name'] != "") {
				$ext = substr($_FILES['admin_image']['name'],-4);
				if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg") {
					$ext = ($ext == "jpeg") ? ".jpg" : $ext;
					$filename = 'uploads/admin/profile_'.$insert_id.$ext;
					$filepath = "../".$filename;
					if(file_exists($filepath)) unlink($filepath);
					copy($_FILES['admin_image']['tmp_name'],$filepath);
					$arr['admin_image'] = $filename;
				}
			}

			if($_FILES['logo']['name'] != "") {
				$ext = substr($_FILES['logo']['name'],-4);
				if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg") {
					$ext = ($ext == "jpeg") ? ".jpg" : $ext;
					$filename = 'uploads/admin/logo_'.$insert_id.$ext;
					$filepath = "../".$filename;
					if(file_exists($filepath)) unlink($filepath);
					copy($_FILES['logo']['tmp_name'],$filepath);
					$arr['logo'] = $filename;
				}
			}

			

			$condition = " admin_id = 1 ";
			$db->update(TABLE_ADMIN,$arr,$condition);		
			$db->redirect("home.php?pages=profile");
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
	se = /^[0-9A-Za-z ]+[A-Za-z ]+$/;  
	
  if( document.getElementById('admin_name').value == "" ) {
   alert('Please Enter Your Name');
   document.getElementById('admin_name').focus();
   return false;
  }
  if(!re.test(document.getElementById('admin_name').value))
  {
  alert("Please Enter Your Correct Name");
  document.getElementById('admin_name').focus();
  return false;
  }
  
  if( document.getElementById('admin_number').value == "" ) {
   alert('Please Enter Mobile Number');
   document.getElementById('admin_number').focus();
   return false;
  }
  if(!te.test(document.getElementById('admin_number').value))
  {
  alert("Please Enter Your Correct Mobile Number ( Only Numeric Value )");
  document.getElementById('admin_number').focus();
  return false;
  }
  
  var email = document.getElementById('admin_email');
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
  if (document.getElementById('admin_email').value == ""){
   alert("Please Enter Email Address");
   email.focus();
   return false;
  }
  else
  if (!filter.test(email.value)) {
  alert('Please Enter Correct Email Address');
  document.getElementById('admin_email').focus();
  return false;
  }
  
	ext = getExt(document.getElementById('admin_image').value);
	if(ext != "" && ext != "jpg" && ext != "jpeg" && ext != "png")
	{
		alert('Please Upload Only JPG or JPEG or PNG File');
		return false;
	}
  
  
  return true;
}


</script>

<div id="main" style="min-height:0">
		<?php include("header.php"); ?>
		<?php include("menu.php"); ?>
    <section id="content_wrapper">

      <header id="topbar">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-active">
              <a href="home.php?pages=profile">Profile</a>
            </li>
            <li class="crumb-icon">
              <a href="<?php echo ADMIN_URL;?>">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="<?php echo ADMIN_URL;?>">Home</a>
            </li>
            <li class="crumb-trail">Profile</li>
          </ol>
        </div>
        <div class="topbar-right" style="margin-top: 7px;">
          <div class="ib topbar-dropdown">
           <!-- <label for="topbar-multiple" class="control-label pr10 fs11 text-muted" style="color:#555;";><?php echo date('l jS \of F Y , h:i:s A'); ?></label>-->
          </div>
        </div>
      </header>

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center" style="height:100% !important;">

          <div class="mw1000 center-block">
			
			<div class="content-header">
              <h2> Please fillup below form to  <b class="text-primary">Your Profile</b> </h2>
              <p class="lead"></p>
            </div>
            <!-- Store Owner Details -->
            <div class="panel panel-warning panel-border top mt20 mb35">
              <div class="panel-heading">
                <span class="panel-title">Profile</span>
              </div>
              <div class="panel-body bg-light dark">
                <div class="admin-form">
					<form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" id="form" active="" onSubmit=" return validate();">
						<div class="col-md-12">
							<div class="tab-content pn br-n admin-form">
								<div id="tab1_1" class="tab-pane active">
									<div class="section row" style="  margin-bottom: 17px;">
										<div class="col-md-12">
										  <div class="input-group">
											<span class="input-group-addon">
											  <i class="fa fa-user"></i>
											</span>
											<input type="text" id="admin_name" name="admin_name" class="form-control product" autocomplete="off" value="<?php echo $pro['admin_name']?>" placeholder="Name">
										  </div>
										</div>
									</div>
									
									<div class="section row" style="  margin-bottom: 17px;">
										<div class="col-md-12">
										  <div class="input-group">
											<span class="input-group-addon">
											  <i class="fa fa-phone"></i>
											</span>
											<input type="text" id="admin_number" name="admin_number" id="maskedKey" value="<?php echo $pro['admin_number']?>" class="form-control product" autocomplete="off" placeholder="Telephone / Mobile Number"  maxlength="11">
										  </div>
										</div>
									</div>
									<div class="section row" style="  margin-bottom: 17px;"> 
										<div class="col-md-12">
										  <div class="input-group">
											<span class="input-group-addon">
											  <i class="fa fa-envelope"></i>
											</span>
											<input type="text" id="admin_email" name="admin_email" class="form-control product" value="<?php echo $pro['admin_email']?>" autocomplete="off" placeholder="Email Address">
										  </div>
										</div>
									</div>

									<div class="section row" style="  margin-bottom: 17px;"> 
										<div class="col-md-12">
											<div class="col-md-4" style="  margin-top: 4px;">
											  <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
												<div class="fileupload-preview thumbnail mb15" style="line-height: 136px !important; height:200px;">
												  <img data-src="" alt="100%x147" src="../<?php echo $pro['admin_image']?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
												</div>
												<span class="button btn-system btn-file btn-block ph5">
												  <span class="fileupload-new">Profile Picture</span>
												  <span class="fileupload-exists">Profile Picture</span>
												  <input type="file" name="admin_image" id="admin_image">
												</span>
											  </div>
											</div>
									
											<div class="col-md-4" style="  margin-top: 4px;">
											  <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
												<div class="fileupload-preview thumbnail mb15" style="line-height: 136px !important; height:200px;">
												  <img data-src="" alt="100%x147" src="../<?php echo $pro['logo']?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
												</div>
												<span class="button btn-system btn-file btn-block ph5">
												  <span class="fileupload-new">Logo Picture</span>
												  <span class="fileupload-exists">Logo Picture</span>
												  <input type="file" name="logo" id="logo">
												</span>
											  </div>
											</div>

										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
								  <div class="input-group" style="float: right;">
									<input type="submit" id="maskedKey" class="btn btn-primary" style="width: 220px; margin-right: 10px;" value="Update">
								  </div>
								</div>
							  </div>

					    </div>
					
					</form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- end: .tray-center -->

        

      </section>
      <!-- End: Content -->
	  <?php include('fixfooter.php') ?>
    </section>
</div>

