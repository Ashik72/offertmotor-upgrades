<?php 

include 'config.php';

/**
* DB Connection and Queries
*/
class DB_Tasks
{
	
	private $servername = DB_HOST;
	private	$username = DB_USER;
	private	$password = DB_PASSWORD;
	private	$db_name = DB_NAME;
	public $conn;

	function __construct() {

				// Create connection
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db_name);

		// Check connection
		if ($this->conn->connect_error) {
		    die("Connection failed: " . $$this->conn->connect_error);
		}

	}


	public function execute_sql($sql = "SELECT * FROM company") {

	$result = $this->conn->query($sql);

	return $result;
	}

	public function real_escape_string($str) {

		$string = $this->conn->real_escape_string($str);
		return $string;
	}

}


$db = new DB_Tasks;

/*$get_data = $db->execute_sql("SELECT company_name FROM company");
var_dump($get_data);

    while($row = $get_data->fetch_assoc()) {
    	var_dump($row);
	    }*/
 ?>

