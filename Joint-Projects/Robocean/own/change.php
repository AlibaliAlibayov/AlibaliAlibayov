<?php

$servername = "db4free.net"; // Replace with your database servername
$username = "admin_alibali"; // Replace with your database username
$password = "atv8F@Hwd7V88V$"; // Replace with your database password
$dbname = "robocean_demo"; // Replace with your database name

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
    if (isset($_POST['reject'])) {
        $query = "UPDATE EspInfo SET status = 'not accepted', whose = null, acceptedtime = null WHERE id = ?";
        $stmt = mysqli_prepare($connection, $query);
        
        mysqli_stmt_bind_param($stmt, "s", $id);
        
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            echo "Status update failed";
        }
        
        mysqli_stmt_close($stmt);
    } elseif (isset($_POST['finish'])) {
        $query = "UPDATE EspInfo SET status = 'finished', finishedtime = NOW() WHERE id = ?";
        $stmt = mysqli_prepare($connection, $query);

        mysqli_stmt_bind_param($stmt, "s", $id);
        
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            echo "Status update failed";
        }

        mysqli_stmt_close($stmt);
    }
}
mysqli_close($connection);
?>