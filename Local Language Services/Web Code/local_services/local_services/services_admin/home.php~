<?php
	include "../wsconfig/connection.php";
	if($_SESSION['ADMIN']['ID'] == "") $db->redirect("index.php");
?>
<?php include("common_head_file.php") ?>
<body class="">
<?php
	switch($_REQUEST['pages']) {

		case "" : include "dashboard.php"; break;

		case "account-setting" : include "account_setting.php"; break;

		case "profile" : include "profile.php"; break;

		case "change-password" : include "change_password.php"; break;

		case "add-jobs" : include "add_jobs.php"; break;

		case "view-jobs" : include "view_jobs.php"; break;

		case "view-users" : include "view_users.php"; break;

		case "apply-jobs" : include "view_apply_jobs.php"; break;

		case "user-detail" : include "user_detail.php"; break;
           
                case "add-retail-food" : include "add_retail_food.php"; break;

		case "view-retail-food" : include "view_retail_food.php"; break;
            
                 case "add-health-tips" : include "add_health_tips.php"; break;

		case "view-health-tips" : include "view_health_tips.php"; break;

                 case "add-online-news" : include "add_online_news.php"; break;

		case "view-online-news" : include "view_online_news.php"; break;
            
                 case "add-restaurant" : include "add_restaurant.php"; break;

		case "view-restaurant" : include "view_restaurant.php"; break;
               

		default : include "404.php";
	}
?>


<?php include("common_foot_file.php") ?>
<!---index page ui stop --->
