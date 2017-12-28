<?php  
    error_reporting(0);
	session_start();
	date_default_timezone_set('Asia/Kolkata');

	$SiteName="Local Services";	
	if($_SERVER["HTTP_HOST"]=="localhost" || $_SERVER["HTTP_HOST"]=="192.168.12.150"  || $_SERVER["HTTP_HOST"]=="61.16.242.205") {
		define('DB_HOST','localhost');
		define('DB_USER','root');
		define('DB_PASSWORD','');
		define('DB_NAME','local_services');	
		define('SITE_NAME','Local Services');	
		define('DD_NAME','Local Services');
		define('DD_LINK','Local Services');
		define('BASE_URL','http://localhost/local_services/');
		define('ADMIN_URL','http://localhost/local_services/services_admin/');
	} else {
		define('DB_HOST','localhost');
		define('DB_USER','wscubapp_laado');
		define('DB_PASSWORD','laado');
		define('DB_NAME','wscubapp_local_services');	
		define('SITE_NAME','Local Services');		
		define('DD_NAME','Local Services');
		define('DD_LINK','Local Services');
		define('BASE_URL','http://wscubetechapps.in/mobileteam/local_services/');
		define('ADMIN_URL','http://wscubetechapps.in/mobileteam/local_services/services_admin/');
	}
	
	require_once "mysqli.php";	
	include_once "ht_access_function.php";
	include_once "database_table.php";

$db 	= new MySql();
