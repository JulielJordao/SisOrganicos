<?php
class Database {
	
	// specify your own database credentials
	public $conn;
	
	// get the database connection
	public function getConnection() {
		try {
			$conn = mysqli_connect ( 'localhost:3306/sissolucoesagriorganica', 'root', '');
		} catch ( PDOException $exception ) {
			echo "Connection error: " . $exception->getMessage ();
		}
		
		return $this->conn;
	}
}
?>