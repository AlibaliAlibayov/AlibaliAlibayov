<?php
    $host = 'db4free.net';
    $dbUsername = 'admin_alibali';
    $dbPassword = 'atv8F@Hwd7V88V$';
    $dbName = 'robocean_demo';        

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['ship'])) {
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $ship = $_POST['ship'];
    
        $sql = "INSERT INTO EspInfo (id, longitude, latitude, ship, whose, status, comingdate, acceptedtime, finishedtime) VALUES (NULL,'".$longitude."', '".$latitude."', '".$ship."',NULL, 'not accepted', CURRENT_TIMESTAMP, NULL, NULL)";
    
    	if ($conn->query($sql) === TRUE) {
    		echo "Values inserted in MySQL database table.";
    	} 
    	else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
    	}
    }
}
$conn->close();
?>