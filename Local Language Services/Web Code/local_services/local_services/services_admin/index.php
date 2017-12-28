<?php
	include "../wsconfig/connection.php";
	if($_SESSION['ADMIN']['ID'] == "") $db->redirect("login.php");
?>


<?php include("common_head_file.php") ?>
<body class="">

<?php
	switch($_REQUEST['pages']) {
		
		case "" : include "dashboard.php"; break;
		
		default : include "404.php";
	}
?>
<?php include("common_foot_file.php") ?>

