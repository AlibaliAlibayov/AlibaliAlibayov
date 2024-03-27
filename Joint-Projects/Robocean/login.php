<?php

$host = 'db4free.net';
$dbUsername = 'admin_alibali';
$dbPassword = 'atv8F@Hwd7V88V$';
$dbName = 'robocean_demo';

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

$error;
$alert;

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function checkCredentials($conn, $username, $password) {
  $sql = "SELECT * FROM Users WHERE username = ? AND password = ?";
  $stmt = $conn->prepare($sql);

  $stmt->bind_param("ss", $username, $password);

  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    return true;
  } else {
    return false;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      $isValidCredentials = checkCredentials($conn, $username, $password);

      if ($isValidCredentials) {
        if (isset($_POST['remembering']) && $_POST['remembering'] === 'on') {
          setcookie('username', $username, time() + (86400 * 3), '/');
          setcookie('password', $password, time() + (86400 * 3), '/');
        }
        $error = "login succesful";
        $alert = false;
        session_start();
        $_SESSION['username'] = $username;
      } else {
        $error = "invalid login";
        $alert = true;
      }
    } else {
      $error = "empty inputs";
      $alert = true;
    }
  } else {
    $error = "didnot post all";
    $alert = true;
  }
} else {
  $error = "method problem";
  $alert = false;
}

$response = array('message' => $error,'alert' => $alert);
header('Content-Type: application/json');
echo json_encode($response);
exit;
?>