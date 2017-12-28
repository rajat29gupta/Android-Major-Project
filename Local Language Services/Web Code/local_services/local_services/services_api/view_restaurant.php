<?php
header("Content-Type: application/json");
include '../wsconfig/connection.php';
$table = TABLE_RESTAURANT;


if($_REQUEST['language']!="") {
	$where .= " and restaurant_language = '".$_REQUEST['language']."' "; 
}

    $ex_data = $db->db_get_array("SELECT * FROM $table WHERE restaurant_status = 1 $where ORDER BY restaurant_id desc");
	$ex_tot	 = count($ex_data); 

		foreach($ex_data as $ex_datas){			
			$arr[] = $ex_datas;
		}
		
    if($ex_tot > 0) {
		$re = array(
			'result'				=> 1,
			'msg'					=> $arr
		);
	}else{
		$re = array(
			'result'		=> 0,
			'msg'			=> "No Record Available",
		);
	}

echo json_encode($re, JSON_PRETTY_PRINT);
