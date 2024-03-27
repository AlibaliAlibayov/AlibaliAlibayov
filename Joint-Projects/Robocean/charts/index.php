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
    <title>Charts Robocean</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/cfe474865a.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
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
                        <p class="admin-name"><?php echo $_SESSION['username']; ?></p>
                    </div>
                    <hr>
                    <div class="log-out">
                        <div>
                            <span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                            <span class="text">Log out</span>
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

    <main class="container">
        <div class="card-box">
            <div class="card">
                <div>
                    <div class="value" id="dailyAccept">--</div>
                    <div class="card-name">Daily Unaccepted Requests</div>
                </div>
                <div class="icon-box">
                    <i class="fa-regular fa-paper-plane"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="value" id="dailyWork">--</div>
                    <div class="card-name">Daily Working On Requests</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-tools"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="value" id="dailyFinish">--</div>
                    <div class="card-name">Daily Finished Requests</div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-list-check"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="value" id="AllFinishedTasks">--</div>
                    <div class="card-name">Completed Requests</div>
                </div>
                <div class="icon-box">
                    <i class="fa-regular fa-circle-check"></i>
                </div>
            </div>
        </div>
        <div class="chart">
            <h2 class="title">Weekly Request Report</h2>
            <canvas id="daily-chart"></canvas>
        </div>
    </main>
      
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
</body>
</html>