<?php
//$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	class MySql {

	public function __construct() {
		$this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (mysqli_connect_errno($this->mysqli)) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die;
		}
		$mysqli = $this->mysqli;

		// To Set Timezone (Default UTC+5:30 - India)
		$query 		= "SET time_zone = '+05:30'";
		$execute 	= $mysqli->query($query);
		if(!$execute) {
			printf("<strong>Query Error:</strong><br />%s<br /><strong>Query:</strong> %s", $mysqli->error, $query);
			die;
		}
       }

       public function slugify($title = null, $table_name = null, $field_name = null) {
		$title = trim($title);
		$slug = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($title)));

		$query = "SELECT COUNT(*) AS NumHits FROM $table_name WHERE  $field_name  LIKE '$slug%'";
		$row = $this->db_get_array_row($query);

		$numHits = $row['NumHits'];

		return ($numHits > 0) ? ($slug . '-' . $numHits) : $slug;
	   }


       public function secureText($te = null, $flag = null) {
		$mysqli = $this->mysqli; // Define global of db connection

		$te = trim($te);
		if($flag) {
			$te = $mysqli->real_escape_string($te);
			$te = htmlentities($te);
		}

		return $te;
     	}

     	//Insert Query

       public function insert($table = null, $data = null, $flag = true) {
			$i = 0;
			$mysqli = $this->mysqli;
			foreach($data as $k => $v) {
				$i++;
				if($i == 1) {
					$string  = "$k = '".$this->secureText($v,$flag)."'";
				} else {
					$string .= ", $k = '".$this->secureText($v,$flag)."'";
				}
			}
			$ins = $mysqli->query("INSERT INTO $table SET $string");
			if(!$ins) {
			printf("<strong>Query Error:</strong><br />%s<br /><strong>Query:</strong> %s", $mysqli->error, $query);
			die;
		   }
		return $mysqli->insert_id;
		}

       //Update Query

		public function update($table,$data,$condition) {
			$mysqli = $this->mysqli;
			$i = 0;
			foreach($data as $k => $v) {
				$i++;
				if($i == 1) {
					$string  = "$k = '".$this->secureText($v,$flag)."'";
				} else {
					$string .= ", $k = '".$this->secureText($v,$flag)."'";
				}
			}
			if(is_array($condition)) {
				$condition = implode(" AND ",$condition);
			}
			$upd = $mysqli->query("UPDATE $table SET $string WHERE $condition");
			if(!$upd) {
							printf("<strong>Query Error:</strong><br />%s<br /><strong>Query:</strong> %s", $mysqli->error);
				die;
			}
		}
       
	    public function redirect($url = "") {
			if(!header("Location: $url"))
				echo '<script>window.location="'.$url.'"</script>';
			die;
		}

        //Select Query

        public function db_get_array($query = null) {
		$mysqli = $this->mysqli;
		$execute = $mysqli->query($query);
		if(!$execute) {
			printf("<strong>Query Error:</strong><br />%s<br /><strong>Query:</strong> %s", $mysqli->error, $query);
			die;
		}
		$result = array();
		while ($row = $execute->fetch_assoc()) {
			$result[] = $row;
		}
		return $result;
		}

		public function db_get_object($query = null) {
			$mysqli = $this->mysqli;
			$execute = $mysqli->query($query);
			if(!$execute) {
				printf("<strong>Query Error:</strong><br />%s<br /><strong>Query:</strong> %s", $mysqli->error, $query);
				die;
			}
			$result = array();
			while ($row = $execute->fetch_object()) {
				$result[] = $row;
			}
			return $result;
		}


        //Select Query single record 
        public function db_get_object_row($query = null) {
		$mysqli = $this->mysqli;
		$execute = $mysqli->query($query);
		if(!$execute) {
			printf("<strong>Query Error:</strong><br />%s<br /><strong>Query:</strong> %s", $mysqli->error, $query);
			die;
		}
		$result = $execute->fetch_object();
		return $result;
     	}
        
        public function db_get_array_row($query = null) {
		$mysqli = $this->mysqli;
		$execute = $mysqli->query($query);
		if(!$execute) {
			printf("<strong>Query Error:</strong><br />%s<br /><strong>Query:</strong> %s", $mysqli->error, $query);
			die;
		}
		$result = $execute->fetch_assoc();
		return $result;
	   }


	   # Delete Record
		public function delete($table = null, $conditions = null) {
			$mysqli = $this->mysqli;
			$query = "DELETE FROM `$table` WHERE 1=1";

			if(is_array($conditions)) {
				$op			= isset($conditions['relation']) ? $conditions['relation'] : "AND";
				$conditions = implode(" $op ", $conditions);
			}

			if($conditions != null) $query .= " AND $conditions";
			
			if(!$mysqli->query($query)) {
				printf("<strong>Query Error:</strong><br />%s<br /><strong>Query:</strong> %s", $mysqli->error, $query);
				die;
			}
		}

		
	
         # Insert Query
	// public function db_insert($table = null, $data = null, $flag = true) {
	// 	// INSERT INTO `table_name` (`name`, `email`) VALUES ('pradeep', 'pradeep@wscubetech.com') ON DUPLICATE KEY UPDATE ;

	// 	$mysqli = $this->mysqli;
	// 	$query = "INSERT INTO `$table` (";
	// 	$fields = array_keys($data);
	// 	$values = array_values($data);

	// 	$fls = "";
	// 	foreach ($fields as $f) {
	// 		# code...
	// 		$fls 	.= "`$f`, ";
	// 	}
	// 	$query .= substr($fls, 0, -2).") VALUES (";

	// 	$vls = "";
	// 	foreach ($values as $v) {
	// 		# code...
	// 		$vls 	.= "'{$this->secureText($v,$flag)}', ";
	// 	}
	// 	$query .= substr($vls, 0, -2).") ON DUPLICATE KEY UPDATE ";
	// 	$arrUpd = array();
	// 	foreach($fields as $key => $nf) {
	// 		$arrUpd[] = "$nf = '".$values[$key]."'";
	// 	}
	// 	$query .= implode(", ", $arrUpd);

	// 	if(!$mysqli->query($query)) {
	// 		printf("<strong>Query Error:</strong><br />%s<br /><strong>Query:</strong> %s", $mysqli->error, $query);
	// 		die;
	// 	}
	// 	return $mysqli->insert_id;
	// }
       


	}

?>