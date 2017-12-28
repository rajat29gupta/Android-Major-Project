<?php
  include "../wsconfig/connection.php";
    if(isset($_POST['login']) && $_POST['login'] == "Sign In") {
     
     $query = $db->db_get_array("SELECT * FROM ".TABLE_ADMIN." WHERE admin_email = '".
     $_POST['admin_email']."' AND admin_password = '".md5($_POST['password'])."'");
     $admin_tot = count($query);
     
     foreach ($query as $fetch );

     if($admin_tot) {
       $_SESSION['ADMIN']['ID'] = $fetch['admin_id'];
       $_SESSION['ADMIN']['UN'] = $fetch['admin_name'];
       $db->redirect(ADMIN_URL);
     } else {      
       $msg=1;
     }
    }
  if($_SESSION['ADMIN']['ID'] != "") $db->redirect(ADMIN_URL);
?>


<!DOCTYPE html>
<html>
<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>Login | AdminPanel</title>
  <meta name="keywords" content="AdminPanel" />
  <meta name="description" content="AdminPanel">
  <meta name="author" content="AdminPanel">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='css/css.css'>
  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="css/admin-forms.css">
  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" type="text/css" href="css/fonts/glyphicons-pro/glyphicons-pro.css">
  <link rel="stylesheet" type="text/css" href="css/fonts/iconsweets/iconsweets.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon.ico">

</head>
<script type="text/javascript">
function validatelogin() {
 	re = /^[A-Za-z ]+$/;
	te = /^[0-9]+$/;
	se = /^[0-9A-Za-z ]+[A-Za-z ]+$/;
  if( document.getElementById('admin_fname').value == "" ) {
   alert('Please Enter Your UserName');
   document.getElementById('admin_fname').focus();
   return false;
  }
  if(!re.test(document.getElementById('admin_fname').value))
  {
  alert("Please Enter Your Correct UserName");
  document.getElementById(admin_fname).focus();
  return false;
  }
  
  if(document.getElementById('password').value == "")
  {
  alert("Please Enter Your Password");
  document.getElementById('password').focus();
  return false;
  }
  return true;
}

</script>
<body class="external-page sb-l-c sb-r-c">
  <div id="main" class="animated fadeIn">
    <section id="content_wrapper">
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>
      <section id="content">
        <div class="admin-form theme-info" id="login1">
          <div class="row mb15 table-layout">			
		
      			<div class="col-xs-4 va-m pln">
            	<a href="index.php" title="Admin Logo"><img src="" width="150" height="70" class="img-responsive wslogo"/></a>
            </div>
            <div class="col-xs-4 va-m pln">
              <a href="index.php" title="Admin Logo">
                <img src="img/logo_white.png" width="116" height="43"  title="Admin Logo" class="img-responsive">
              </a>
            </div>
            <div class="col-xs-4 text-right va-b pr5"></div>
          </div>

          <div class="panel panel-info mt10 br-n">
            <!-- end .form-header section -->
            <form method="post" action="" onSubmit="return validatelogin()">
      			<?php 
      			  if($msg==1)
      			  {
      				$style="style=display:block;";
      			  }
      			  else{
      				  $style="style=display:none;";
      			  }
      			?>
      			<div class="panel-body p15 pt25" id="email_msg" <?php echo $style; ?>>
      				<div class="alert alert-micro alert-border-left alert-info pastel alert-dismissable mn">
      				  <i class="fa fa-info pr10"></i>Invalid! <b>Email Id</b> And <b>Password</b>
      				</div>
      			</div>
              <div class="panel-body bg-light p30" style="border-top:5px solid #3bafda;">				
                <div class="row">
                  <div class="col-sm-12 pr30 loginsssss">					
                    <div class="section">
                      <label for="username" class="field-label text-muted fs18 mb10">Email Id</label>
                      <label for="username" class="field prepend-icon">
                        <input type="email" name="admin_email" id="admin_email" class="gui-input" placeholder="Enter email id" required>
                        <label for="username" class="field-icon">
                          <i class="fa fa-envelope"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                      <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                      <label for="password" class="field prepend-icon">
                        <input type="password" name="password" id="password" class="gui-input" placeholder="Enter password" required>
                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                  </div>
                  
                </div>
              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix p10 ph15" style="border-top: 1px solid #DDD;">
                <input type="submit" class="button btn-primary mr10 pull-right" name="login" id="login" value="Sign In"/>
                <!-- <label class="switch ib switch-primary pull-left input-align mt10">
                  <a href="forgot_password.php" class="forgot_textss"><span>Forgot Password</span></a>
                </label> -->
              </div>
              <!-- end .form-footer section -->
            </form>
          </div>
        </div>
      </section>
      <!-- End: Content -->
    </section>
  </div>
  <!-- jQuery -->
  <script src="js/jquery/jquery-1.11.1.min.js"></script>
  <script src="js/jquery/jquery_ui/jquery-ui.min.js"></script>

  <!-- CanvasBG Plugin(creates mousehover effect) -->
  <script src="js/plugins/canvasbg/canvasbg.js"></script>

  <!-- Theme Javascript -->
  <script src="js/utility/utility.js"></script>
  <script src="js/demo/demo.js"></script>
  <script src="js/main.js"></script>

  <script>
$(document).ready(function() {
	$('img').on('dragstart', function(event) { event.preventDefault(); });
});
</script>
  
  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core      
    Core.init();

    // Init Demo JS
    Demo.init();

    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2,
        y: window.innerHeight / 3.3
      },
    });

  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>
</html>