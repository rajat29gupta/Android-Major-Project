<?php
	include "../wsconfig/connection.php";
	if($_SESSION['ADMIN']['ID'] == "") $wsct->redirect("login.php");

  $details = $db->db_get_array("SELECT * FROM ".TABLE_ADMIN." WHERE admin_id = 1"); 
  foreach($details as $data);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>AdminPanel | <?php echo SITE_NAME ?></title>
  <meta name="keywords" content="AdminPanel" />
  <meta name="description" content="AdminPanel">
  <meta name="author" content="AdminPanel">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style type="text/css">
  @import url("css/css.css");
  @import url("css/bootstrap-formhelpers.min.css");
  @import url("js/plugins/datatables/media/css/dataTables.bootstrap.css");
  @import url("js/plugins/datatables/media/css/dataTables.plugins.css");
  @import url("css/admin-forms.css");
  @import url("js/plugins/select2/css/core.css");
  @import url("css/theme.css");
  @import url("css/fonts/glyphicons-pro/glyphicons-pro.css");
  @import url("css/fonts/iconsweets/iconsweets.css"); 
  @import url("css/jquery-te-1.4.0.css");
  </style>
  <link rel="shortcut icon" href="../<?=$data['favicon']?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

</head>