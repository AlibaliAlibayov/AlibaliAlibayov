<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index.html");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Own Task Robocean</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../images/icon.png">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <script src="script.js" defer></script>
    <script src="https://kit.fontawesome.com/cfe474865a.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <img src="../images/trash-2.png" class="background-image">

    <header>
        <div class="menu-logo">
            <div class="menu-bar">
                <span></span>
                <span></span>
                <span></span>
            </i></div>
            <a href="../index.html">
                <img src="../images/RoboceanHeaderDark.png" alt="logo" class="logo">
            </a>
        </div>
        <div class="side-bar">
            <ul>
                <li><a href="../home/index.php"><span><i class="fa-solid fa-house"></i></span><p>Home</p></a></li>
                <li><a href="../requests/index.php"><span><i class="fa-solid fa-paper-plane"></i></span><p>Requests</p></a></li>
                <li><a href="index.php"><span><i class="fa-solid fa-gear"></i></span><p>Own Task</p></a></li>
                <li><a href="../charts/index.php"><span><i class="fa-solid fa-chart-pie"></i></span><p>Charts</p></a></li>
            </ul>
            <div class="darkmode">
                <div><i class="fa-sharp fa-solid fa-moon"></i></div>
            </div>
        </div>
        <div class="account">
            <div class="title">Account <span><i class="fa-solid fa-caret-down dropdown"></i></span></i></div>
            <img src="../images/ProfilePhoto.jpg" alt="profile photo" class="profile-photo">
            <div class="account-info-wrap">
                <div class="margin">
                    <div class="admin">
                        <img src="../images/ProfilePhoto.jpg" alt="admin-photo" class="admin-photo">
                        <p class="admin-name"><?php echo $_SESSION['username'];?></p>
                    </div>
                    <hr>
                    <div class="log-out">
                        <div>
                            <span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                            <a class="text" href="../logout.php">Log out</a>
                        </div>
                        <span class="icon-go"><i class="fa-solid fa-caret-down"></i></span>
                    </div>
                    <div class="pravicy">
                        <div>
                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                            <span class="text">Privacy and Policy</span>
                        </div>
                        <span class="icon-go"><i class="fa-solid fa-caret-down"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <h4 class="table-title">My Dashboard</h4>
            <hr>
            <div class="table-container">
                <table class="headline">
                    <tr>
                        <th>#ID</th>
                        <th>ACCEPTED DATE</th>
                        <th>STATUS</th>
                        <th>DEATILS</th>
                    </tr>
                </table>
                <div class="tasks">
                    <?php 

                    $servername = "db4free.net"; // Replace with your database servername
                    $username = "admin_alibali"; // Replace with your database username
                    $password = "atv8F@Hwd7V88V$"; // Replace with your database password
                    $dbname = "robocean_demo"; // Replace with your database name

                    $connection = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$connection) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $sessionUsername = $_SESSION['username'];

                    $query = "SELECT * FROM EspInfo WHERE whose = ? AND status = 'working on'";
                    $stmt = mysqli_prepare($connection, $query);
                    
                    mysqli_stmt_bind_param($stmt, "s", $sessionUsername);
                    
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $date = $row['acceptedtime'];
                        $latitude = $row['latitude'];
                        $longitude = $row['longitude'];
                        $ship = $row['ship'];
                        $whose = $row['whose'];
                        $status = $row['status'];

                        echo"
                            <div class=\"card\">
                            <div class=\"row\">
                                <div class=\"col\">{$id}</div>
                                <div class=\"col\">{$date}</div>
                                <div class=\"col\">{$status}</div>
                                <div class=\"col\"><button class=\"btn\">More Info</button></div>
                            </div>
                            <form class=\"info-wrap\" action=\"change.php\" method=\"post\">
                                <div class=\"info-col\">
                                    <div class=\"info-row\">
                                        <div class=\"col\">#ID</div>
                                        <div class=\"col\">DATE</div>
                                        <div class=\"col\">LONGITUDE</div>
                                        <div class=\"col\">LATITUDE</div>
                                        <div class=\"col\">SHIP</div>
                                        <div class=\"col\">WHOSE</div>
                                        <div class=\"col\">STATUS</div>
                                    </div>
                                    <div class=\"info-row\">
                                        <div class=\"col\">{$id}</div>
                                        <div class=\"col\">{$date}</div>
                                        <div class=\"col\">{$longitude}</div>
                                        <div class=\"col\">{$latitude}</div>
                                        <div class=\"col\">{$ship}</div>
                                        <div class=\"col\">{$whose}</div>
                                        <div class=\"col\">{$status}</div>
                                    </div>
                                    <div class=\"info-row\">
                                        <input type=\"hidden\" value=\"{$id}\" name=\"id\">
                                        <button class=\"btn reject\" type=\"submit\" name=\"reject\">Reject</button>
                                        <button class=\"btn finish\" type=\"submit\" name=\"finish\">Finish</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        ";
                    }

                    mysqli_stmt_close($stmt);
                    
                    mysqli_close($connection);
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>