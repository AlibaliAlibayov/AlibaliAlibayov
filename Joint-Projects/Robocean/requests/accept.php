<?php

session_start();
// Connect to MySQL using PDO
$host = 'db4free.net';
$db = 'robocean_demo';
$user = 'admin_alibali';
$password = 'atv8F@Hwd7V88V$';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection to MySQL failed: " . $e->getMessage();
    exit();
}

// Assuming you have already started the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the "requestId" parameter is present
    if (isset($_POST['requestId'])) {
        $requestId = $_POST['requestId'];
        
        // Perform any necessary validation on the "requestId" value here
        
        // Retrieve the row with the specified requestId
        $query = "SELECT * FROM EspInfo WHERE id = :requestId";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':requestId', $requestId);
        
        if ($statement->execute()) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            
            // Check if the row exists
            if ($row) {
                $status = $row['status'];
                
                // Check if the status is "not accepted"
                if ($status === 'not accepted') {
                    // Update the status to "working on", set the username, and add the current date and time
                    $query = "UPDATE EspInfo SET status = 'working on', whose = :username, acceptedtime = NOW() WHERE id = :requestId";
                    $statement = $pdo->prepare($query);
                    $statement->bindParam(':requestId', $requestId);
                    $statement->bindParam(':username', $_SESSION["username"]);
                    
                    if ($statement->execute()) {
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "An error occurred while updating the status, username, and accepted time.";
                    }
                } else {
                    echo "The status is already different from 'not accepted'.";
                }
            } else {
                echo "No row found with the specified requestId.";
            }
        } else {
            echo "An error occurred while retrieving the row.";
        }
    } else {
        echo "The 'requestId' parameter is missing.";
    }
} else {
    echo "This endpoint only accepts POST requests.";
}
?>
