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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests Robocean</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.png">
    <script src="https://kit.fontawesome.com/cfe474865a.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="canvas">
        <form class="modal" action="accept.php" method="post">
            <div class="modal-row">
                <div class="delete-btn"><span><i class="fa-solid fa-xmark"></i></span></div>
            </div>
            <div class="modal-row">
                <img src="../images/box.png" alt="" class="box">
            </div>
            <div class="modal-row">
                <p class="modal-text">Do you accept the #ID <span id="idPlace">X</span>. trash area for celan?</p>
                <input id="hiddenInput" type="hidden" name="requestId">
            </div>
            <div class="modal-row">
                <button class="cancel-btn" type="button">Cancel</button>
                <button class="confirm-btn" type="submit">Confirm</button>
            </div>
        </form>
    </div>

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
                <li><a href="../own/index.php"><span><i class="fa-solid fa-gear"></i></span><p>Own Task</p></a></li>
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
            <h4 class="table-title">Requests</h4>
            <hr>
            <table class="filter-table">
                <tr>
                    <th><button class="btn notacc">Not Accepted</button></th>
                    <th><button class="btn woron">Working On</button></th>
                    <th><button class="btn fined">Finished</button></th>
                </tr>
            </table>
            <div class="table-container">
                <table class="header">
                    <tr>
                        <th>#ID</th>
                        <th>DATE</th>
                        <th>STATUS</th>
                        <th>DEATILS</th>
                    </tr>
                </table>
                <div class="accept">
                <?php

                $host = 'db4free.net';
                $dbUsername = 'admin_alibali';
                $dbPassword = 'atv8F@Hwd7V88V$';
                $dbName = 'robocean_demo';

                $mysqli = new mysqli($host, $dbUsername, $dbPassword, $dbName);

                if ($mysqli->connect_errno) {
                    die('Connect Error: ' . $mysqli->connect_error);
                }
                $query = "SELECT id, longitude, latitude, ship, whose, status, comingdate, acceptedtime, finishedtime FROM EspInfo WHERE status = 'not accepted'";
                $result = $mysqli->query($query);

                if($result){
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $date = $row['comingdate'];
                        $latitude = $row['latitude'];
                        $longitude = $row['longitude'];
                        $ship = $row['ship'];
                        $whose = $row['whose'];
                        $status = $row['status'];

                        echo "
                            <div class=\"request\" id=\"accept-request\" data-id=\"{$id}\">
                            <div class=\"row\">
                                <div class=\"col\">{$id}</div>
                                <div class=\"col\">{$date}</div>
                                <div class=\"col\">{$status}</div>
                                <div class=\"col\"><button type=\"button\" class=\"btn\">More Info</button></div>
                            </div>
                            <form class=\"info-wrap\" action=\"\" method=\"post\">
                                <div class=\"info-col\">
                                    <div class=\"info-row\">
                                        <div class=\"col\">#ID</div>
                                        <div class=\"col\">COMING DATE</div>
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
                                        <button class=\"btn accept-btn\" type=\"button\">ACCEPT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        ";
                    }
                    $result->free();
                }else{
                    echo "Error: " . $mysqli->error;
                }
                ?>
                </div>
                <div class="working">
                    <?php
                        $query1 = "SELECT id, longitude, latitude, ship, whose, status, comingdate, acceptedtime, finishedtime FROM EspInfo WHERE status = 'working on'";
                        $result1 = $mysqli->query($query1);

                        if ($result1) {
                            while ($row1 = $result1->fetch_assoc()) {
                                $id = $row1['id'];
                                $date = $row1['acceptedtime'];
                                $latitude = $row1['latitude'];
                                $longitude = $row1['longitude'];
                                $ship = $row1['ship'];
                                $whose = $row1['whose'];
                                $status = $row1['status'];

                                echo "
                                    <div class=\"request\">
                                        <div class=\"row\">
                                            <div class=\"col\">{$id}</div>
                                            <div class=\"col\">{$date}</div>
                                            <div class=\"col\">{$status}</div>
                                            <div class=\"col\"><button class=\"btn\">More Info</button></div>
                                        </div>
                                        <div class=\"info-wrap\">
                                            <div class=\"info-col\">
                                                <div class=\"info-row\">
                                                    <div class=\"col\">#ID</div>
                                                    <div class=\"col\">ACCEPT DATE</div>
                                                    <div class=\"col\">LONGITUDE</div>
                                                    <div class=\"col\">LATATITUDE</div>
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
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                            $result1->free();
                        }else{
                            echo "Error: " . $mysqli->error;
                        }
                    ?>
                </div>
                <div class="finish">
                    <?php
                        $query2 = "SELECT id, longitude, latitude, ship, whose, status, comingdate, acceptedtime, finishedtime FROM EspInfo WHERE status = 'finished'";
                        $result2 = $mysqli->query($query2);

                        if ($result2) {
                            while ($row = $result2->fetch_assoc()) {
                                $id = $row['id'];
                                $date = $row['finishedtime'];
                                $latitude = $row['latitude'];
                                $longitude = $row['longitude'];
                                $ship = $row['ship'];
                                $whose = $row['whose'];
                                $status = $row['status'];

                                echo "
                                    <div class=\"request\">
                                        <div class=\"row\">
                                            <div class=\"col\">{$id}</div>
                                            <div class=\"col\">{$date}</div>
                                            <div class=\"col\">{$status}</div>
                                            <div class=\"col\"><button class=\"btn\">More Info</button></div>
                                        </div>
                                        <div class=\"info-wrap\">
                                            <div class=\"info-col\">
                                                <div class=\"info-row\">
                                                    <div class=\"col\">#ID</div>
                                                    <div class=\"col\">FINISH DATE</div>
                                                    <div class=\"col\">LONGITUDE</div>
                                                    <div class=\"col\">LATATITUDE</div>
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
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                            $result2->free();
                        }else{
                            echo "Error: " . $mysqli->error;
                        }
                        $mysqli->close();
                    ?>
                </div>
            </div>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>