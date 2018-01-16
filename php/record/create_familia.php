<?php
// get database connection
include_once 'config/database.php';
$database = new Database ();
$db = $database->getConnection ();

// instantiate familia object
include_once 'objects/familia.php';
$familia = new Familia ( $db );

// get posted data
$data = json_decode ( file_get_contents ( "php://input" ) );

// set familia property values
$familia->nomFamilia = $data->nomFamilia;

// create the familia
if ($familia->create ()) {
	echo "familia was created.";
} 

// if unable to create the familia, tell the user
else {
	echo "Unable to create familia.";
}
?>