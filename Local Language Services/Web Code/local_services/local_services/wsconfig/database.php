<?php
class Database{
	
	public $db;
	public function __construct()
	{
		$this->db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		if ($this->db->connect_error) 
		{
			trigger_error('Error: Could not make a database link (' . $this->db->connect_errno . ') ' . $this->db->connect_error);
			exit();
		}

		//$this->db->set_charset("utf8");
		//$this->db->query("SET SQL_MODE = ''");
	}

	public function query($sql) {

		$query = $this->db->query($sql);

		if (!$this->db->errno) {
			if ($query instanceof mysqli_result) {
				$data = array();

				while ($row = $query->fetch_assoc()) {
					$data[] = $row;
				}

				$result = new \stdClass();
				$result->num_rows = $query->num_rows;
				$result->row = isset($data[0]) ? $data[0] : array();
				$result->rows = $data;

				$query->close();

				return $result;
			} else {
				return true;
			}
		} else {
			$debug = debug_backtrace();
			$calling_file 		= (isset($debug[0]['file'])) ? $debug[0]['file'] : '';
			$calling_file_line 	= (isset($debug[0]['line'])) ? $debug[0]['line'] : '';
			
			trigger_error('Error: ' . $this->db->error  . '<br />Error No: ' . $this->db->errno . '<br />' . $sql.'<br/><br/>Function called from file : '.$calling_file.'<br/>Line: '.$calling_file_line);
		}
	}
	public function reconnect(){
	        $this->db->close();
		$this->db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		if ($this->db->connect_error) {
			trigger_error('Error: Could not make a database link (' . $this->db->connect_errno . ') ' . $this->db->connect_error);
			exit();
		}
	}
	public function __destruct() {
		$this->db->close();
	}
	public function countAffected() {
		return $this->db->affected_rows;
	}
	
	function redirect($path) {
			echo '<script>window.location = "'.$path.'"</script>';
		}
	
	public function getLastId() {
		if ($this->db) {
			return $this->db->insert_id;
		}
	}
	public function escape($value) {
		if ($this->db) {
			return mysql_real_escape_string($value);
		}
	}
}

$db = new Database(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);