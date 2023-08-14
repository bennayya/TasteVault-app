<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "datatv";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn, $query);
	
		if (!$result) {
			// Handle the query error here
			echo "Query error: " . mysqli_error($this->conn);
			return array(); // Return an empty array or handle the error as needed
		}
	
		$resultset = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		return $resultset;
	}
}	
?>