<?php
class Familia {
	// database connection and table name
	private $conn;
	private $table_name = "familia";
	
	// object properties
	public $codFamilia;
	public $nomFamilia;
		
	// constructor with $db as database connection
	public function __construct($db) {
		$this->conn = $db;
	}
}

// create familia
function create() {
	
	// query to insert record
	$query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:nomFamilia";
	
	// prepare query
	$stmt = $this->conn->prepare ( $query );
	
	// posted values
	$this->nomFamilia = htmlspecialchars ( strip_tags ( $this->nomFamilia ) );
		
	// bind values
	$stmt->bindParam ( ":nomFamilia", $this->nomFamilia );

	// execute query
	if ($stmt->execute ()) {
		return true;
	} else {
		echo "<pre>";
		print_r ( $stmt->errorInfo () );
		echo "</pre>";
		
		return false;
	}
}

// read familias
function readAll() {
	
	// select all query
	$query = "SELECT
                codFamilia, name
            FROM
                " . $this->nomFamilia . "
            ORDER BY
                id DESC";
	
	// prepare query statement
	$stmt = $this->conn->prepare ( $query );
	
	// execute query
	$stmt->execute ();
	
	return $stmt;
}
?>