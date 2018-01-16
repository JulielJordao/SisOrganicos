<?php
class Planta {
	// database connection and table name
	private $conn;
	private $table_name = "planta";
	
	// object properties
	public $codPlanta;
	public $nomPopular;
	public $nomCientifico;
	public $codFamilia;
	public $descricao;
	public $clima;
	public $regOrigem;
	public $numAcessos;
	public $datInsercao;
	
	// constructor with $db as database connection
	public function __construct($db) {
		$this->conn = $db;
	}
}

// create product
function create() {
	
	// query to insert record
	$query = "INSERT INTO
                " . $this->table_name . "
            SET
                nomPlanta=:nomPlanta, nomPopular=:nomPopular, nomCientifico=:nomCientifico, 
                		codFamilia=:codFamilia, clima=:clima, regOrigem=:regOrigem, 
                		regOrigem=:regOrigem,numAcessos=:numAcessos, datInsercao=:datInsercao";
	
	// prepare query
	$stmt = $this->conn->prepare ( $query );
	
	// posted values
	$this->nomPlanta = htmlspecialchars ( strip_tags ( $this->nomPlanta ) );
	$this->nomPopular = htmlspecialchars ( strip_tags ( $this->nomPopular ) );
	$this->nomCientifico = htmlspecialchars ( strip_tags ( $this->nomCientifico ) );
	$this->codFamilia = htmlspecialchars ( strip_tags ( $this->codFamilia ) );
	$this->clima = htmlspecialchars ( strip_tags ( $this->clima ) );
	$this->regOrigem = htmlspecialchars ( strip_tags ( $this->regOrigem ) );
	$this->numAcessos = htmlspecialchars ( strip_tags ( $this->numAcessos ) );
	$this->datInsercao = htmlspecialchars ( strip_tags ( $this->datInsercao ) );
	
	// bind values
	$this->nomPlanta = bindParam ( ":nomPlanta", $this->nomPlanta  );
	$this->nomPopular = bindParam ( ":nomPopular", $this->nomPopular  );
	$this->nomCientifico = bindParam ( ":nomCientifico", $this->nomCientifico  );
	$this->codFamilia = bindParam ( ":codFamilia", $this->codFamilia  );
	$this->clima = bindParam ( ":clima", $this->clima  );
	$this->regOrigem = bindParam ( ":regOrigem", $this->regOrigem  );
	$this->numAcessos = bindParam ( ":numAcessos", $this->numAcessos  );
	$this->datInsercao = bindParam ( ":datInsercao", $this->datInsercao  );
	
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

// read products
function readAll() {
	
	// select all query
	$query = "SELECT
                *
            FROM
                " . $this->table_name . "
            ORDER BY
                codPlanta DESC";
	
	// prepare query statement
	$stmt = $this->conn->prepare ( $query );
	
	// execute query
	$stmt->execute ();
	
	return $stmt;
}
?>