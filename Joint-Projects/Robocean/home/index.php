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
    <title>Admin Panel Robocean</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/cfe474865a.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
</head>
<body>
    
    <img src="../images/trash-2.png" alt="background-image" class="background-image">

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
                            <a href="../logout.php" class="text">Log out</a>
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
        <article>
            <div class="overlay">
                <img class="trash-photo" src="../images/trash-2.png" alt="trash">
                <div class="description">
                    <h2>Robocean</h2>
                    <div class="subtitle">Clean Oceans with Robocean</div>
                </div>
            </div>
        </article>
    
        <aside>
            <div class="card">
                <div class="img">
                    <div class="links">
                        <span><i class="fa-solid fa-envelope"></i></span>
                        <span><i class="fa-brands fa-instagram"></i></span>
                        <span><i class="fa-brands fa-twitter"></i></span>
                    </div>
                    <img src="../images/Alibali.png" alt="img" class="profile">
                </div>
                <div class="text">
                    <div class="title">Alibeyov Alibali</div>
                    <div class="description">He is a skilled professional adept at both frontend programming and Arduino programming. In the project, his responsibilities encompass creating and updating websites while also programming Arduino cards. His expertise extends to connecting Arduino cards to databases, effectively integrating the physical world with the digital realm. With his combined proficiency in frontend development and Arduino programming, he successfully contributes to the project's web development and hardware connectivity requirements.</div>
                </div>
            </div>
            <div class="card-reverse">
                <div class="img">
                    <div class="links">
                        <span><i class="fa-solid fa-envelope"></i></span>
                        <span><i class="fa-brands fa-instagram"></i></span>
                        <span><i class="fa-brands fa-twitter"></i></span>
                    </div>
                    <img src="../images/Nihat.png" alt="img" class="profile">
                </div>
                <div class="text">
                    <div class="title">Muradli Nihat</div>
                    <div class="description">He is an accomplished backend developer specializing in connecting frontend pages to MySQL databases using PHP. His role involves retrieving and storing crucial data such as location, time, and trash detection information from Arduino cards. These collected data are utilized to generate informative charts and assist in locating trash in the ocean. With his expertise in backend development and database integration, he plays a crucial role in leveraging the transmitted information to contribute to the important cause of addressing ocean pollution.</div>
                </div>
            </div>
            <div class="card">
                <div class="img">
                    <div class="links">
                        <span><i class="fa-solid fa-envelope"></i></span>
                        <span><i class="fa-brands fa-instagram"></i></span>
                        <span><i class="fa-brands fa-twitter"></i></span>
                    </div>
                    <img src="../images/Haci.png" alt="img" class="profile">
                </div>
                <div class="text">
                    <div class="title">Haciyev Haci</div>
                    <div class="description">He is an accomplished electronic engineer who plays a crucial role in the project by seamlessly connecting and fine-tuning all Arduino cards. With his extensive knowledge and expertise, he ensures smooth communication and synchronization between the various Arduino devices. Additionally, he takes charge of the entire view structure and design, meticulously crafting an intuitive and visually appealing user interface. His expertise as an electronic engineer proves invaluable in creating a cohesive and functional project, where the hardware and software seamlessly come together.</div>
                </div>
            </div>
        </aside>
    
        <footer>
            <div class="container">
                <div class="footer-col">
                    <h4>Start Up</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla ut debitis, aut tenetur quaerat aliquam vel, laudantium adipisci quas voluptatem recusandae doloremque accusamus doloribus explicabo. Consectetur earum fugiat obcaecati iure aliquam natus rem, corporis iste?</p>
                    <div class="social-links">
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                        <a href=""><i class="fa-brands fa-youtube"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Help</h4>
                    <ul class="help">
                        <li><a href="">About us</a></li>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Feedbacks</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact</h4>
                    <ul class="contact">
                        <li><a href=""><span><i class="fa-solid fa-location-dot"></i></span><span>344 Ave.Azerbaijan, Streat.No 2 Azerbaijan, Zaqatala</span></a></li>
                        <li><a href=""><span><i class="fa-solid fa-envelope"></i></span><span>info@robocean.com</span></a></li>
                        <li><a href=""><span><i class="fa-solid fa-phone"></i></span><span>+994-55-976-64-66</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="copy-right">The Web Site Copy Righted by Team of Mekatron Enginers 2023</div>
        </footer>
    </main>

    <script src="script.js"></script>
</body>
</html>