<?php
	$details = $db->db_get_array("SELECT * FROM ".TABLE_ADMIN." WHERE admin_id = 1"); 
	foreach($details as $pass);
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		if ($_POST['admin_password'] == $_POST['admin_cpassword']){
			if(md5($_POST['admin_opassword']) == $pass['admin_password'])
			{
			$arr = array(
				'admin_password'			=> md5($_POST['admin_password']),
			);		
			$condition = " admin_id = 1 ";
			$db->update(TABLE_ADMIN,$arr,$condition);
			$msg = "Your Password Successfully Changed";
			}
			else
			{
				$msg = "Your Password Not Changed";
			}
		}
	}
	
?>
<script type="text/javascript">

function validatepassa() {
	if( document.getElementById('admin_opassword').value=="" ) {
		alert("Please Enter Your Current Password");
		document.getElementById('admin_opassword').focus();
		return false;
	}
	if( document.getElementById('admin_password').value=="" ) {
		alert("Please Enter New Password ");
		document.getElementById('admin_password').focus();
		return false;
	}
	if( document.getElementById('admin_cpassword').value=="" ) {
		alert("Please Enter Confirm Password");
		document.getElementById('admin_cpassword').focus();
		return false;
	}
	if( document.getElementById('admin_cpassword').value != document.getElementById('admin_password').value ) {
			alert('New Password and Confirm Password Not Match');
			document.getElementById('admin_cpassword').focus();
			return false;
	}
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
              <a href="home.php?pages=change-password">Change Password</a>
            </li>
            <li class="crumb-icon">
              <a href="<?php echo ADMIN_URL;?>">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="<?php echo ADMIN_URL;?>">Home</a>
            </li>
            <li class="crumb-trail">Change Password</li>
          </ol>
        </div>
        <div class="topbar-right" style="margin-top: 7px;">
          <div class="ib topbar-dropdown">
            <!--<label for="topbar-multiple" class="control-label pr10 fs11 text-muted" style="color:#555;";><?php echo date('l jS \of F Y , h:i:s A'); ?></label>-->
          </div>
        </div>
      </header>

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center" style="height: 100% !important;">

          <div class="mw1000 center-block">
			
			<div class="content-header">
              <h2> Please fillup below form to  <b class="text-primary">Change Your Password</b> </h2>
              <p class="lead"></p>
            </div>
            <!-- Store Owner Details -->
            <div class="panel panel-warning panel-border top mt20 mb35">
              
              <?php 
      			  if($msg!= "")
      			  {
      				$style="style=display:block;";
      			  }
      			  else{
      				  $style="style=display:none;";
      			  }
      			?>
      			<div class="panel-body p15 pt25" id="email_msg" <?php echo $style; ?>>
      				<div class="alert alert-micro alert-border-left alert-info pastel alert-dismissable mn">
      				  <i class="fa fa-info pr10"></i><?php echo $msg; ?>
      				</div>
      			</div>
			  
			  
              <div class="panel-body bg-light dark">
                <div class="admin-form">
					<form class="form-horizontal" role="form" method="post" id="form" active="" onSubmit=" return validatepassa();">					  
					  <div class="form-group">
						<label for="admin_opassword" class="col-lg-2 control-label">Current Password</label>
						<div class="col-lg-9">
						  <div class="input-group">
							<span class="input-group-addon">
							  <i class="fa fa-key"></i>
							</span>
							<input type="password" id="admin_opassword" name="admin_opassword" class="form-control product" maxlength="25" autocomplete="off" placeholder="">
						  </div>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="admin_password" class="col-lg-2 control-label">New Password</label>
						<div class="col-lg-9">
						  <div class="input-group">
							<span class="input-group-addon">
							  <i class="glyphicons glyphicons-keys"></i>
							</span>
							<input type="password" name="admin_password" class="form-control product" maxlength="25" autocomplete="off" id="admin_password" />
						  </div>						  
							<span style="font-size:12px;color:#f00;margin-top:5px;"><?php //echo $passwordErr; ?></span>
							<span style="font-size:12px;color:#4a89dc;margin-top:5px;"><?php //	echo $cpasswordErr;?> </span>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="admin_cpassword" class="col-lg-2 control-label">Confirm Password</label>
						<div class="col-lg-9">
						  <div class="input-group">
							<span class="input-group-addon">
							  <i class="glyphicons glyphicons-keys"></i>
							</span>
							<input type="password" id="admin_cpassword" name="admin_cpassword" class="form-control product" maxlength="25" autocomplete="off" placeholder="">
						  </div>
						</div>
					  </div>
					  
					  <div class="form-group">
						<div class="col-lg-11">
						  <div class="input-group" style="float: right;">
							<input type="submit" id="maskedKey" class="btn btn-primary" value="Change Password">
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
