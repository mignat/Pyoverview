<?php
$servername = "127.0.0.1";
$username = "mensmentis";
$password = "Mariusv1isohunt";
$dbname = "UseTime";



$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$stat = array();
$stat = $obj['Station'];
$val = array();
$val = $obj['Value'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Station :$stat  ";
echo " Value : $val  ";



$sql = "INSERT INTO $stat (Value)
VALUES ('$val')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
