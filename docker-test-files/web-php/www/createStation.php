<?php
$servername = "127.0.0.1";
$username = "root";
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
echo "Station :$stat";
echo " Value : $val";



$sql = "INSERT INTO `lopy_stations` (`id`, `station_name`, `status`, `last_contact`) VALUES (1, '$stat', 'OK', '2 months');\
CREATE TABLE `UseTime`.`$stat` ( `Value` VARCHAR(30) NOT NULL , `TIMESTAMP` TIMESTAMP NOT NULL );";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("HTTP/1.1 500 Internal Server Error");
        echo '...';//html for 500 page
}

$conn->close();
?>
