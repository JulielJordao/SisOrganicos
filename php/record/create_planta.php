<?php
// get database connection
include_once 'config/database.php';
$database = new Database ();
$db = $database->getConnection ();

// instantiate planta object
include_once 'objects/planta.php';
$planta = new Planta ( $db );

// get posted data
$data = json_decode ( file_get_contents ( "php://input" ) );

// set planta property values
$planta->name = $data->name;
$planta->price = $data->price;
$planta->description = $data->description;
$planta->created = date ( 'Y-m-d H:i:s' );

// create the planta
if ($planta->create ()) {
	echo "planta was created.";
} 

// if unable to create the planta, tell the user
else {
	echo "Unable to create planta.";
}
?>