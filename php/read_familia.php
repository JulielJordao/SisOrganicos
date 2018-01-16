<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); 

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "sissolucoesagriorganica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT *  FROM familia";
$result = $conn->query($sql);
$data = "";
$x=1;

if ($result->num_rows > 0) {
	$num = $result->num_rows;
    // output data of each row
    while($row = $result->fetch_assoc()) {
       extract($row);
          
        $data .= '{';
            $data .= '"codFamilia":"'  . $codFamilia . '",';
            $data .= '"nomFamilia":"' . $nomFamilia . '"';
        $data .= '}'; 
          
        $data .= $x<$num ? ',' : ''; $x++; 
		} 
} else {
    echo "0 results";
}
$conn->close();
echo '{"records":[' . $data . ']}';
?>