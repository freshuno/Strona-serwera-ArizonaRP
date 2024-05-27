<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ArizonaRP</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans&display=swap"
            rel="stylesheet">
    </head>

    <body>
        <span class="mouse"></span>
            <div class="landing-page">
                <header>
                <nav>
                    <div class="navbar">
                        <div class="logo">
                            <img src="public/assets/palm-tree-48.png" alt="palm-tree" width="48px">
                            <a href="#" class="logo-link">ArizonaRP</a>
                        </div>
                        <label class="switch-mode-container">
                            <input type="checkbox" class="switch-mode-checkbox">
                            <span class="btn-switch-mode" tabindex="0">
                                <span class="circle">
                                    <img src="public/assets/sun.png" alt="light-sun" class="circle-image">
                                </span>
                            </span>
                        </label>
                        <button class="hamburger">
                         <span class="pasek1"></span>
                        </button>
                        <ul class="navigation">
                            <li> <a href="index.php" class="nav-link"> Główna</a> </li>
                            <li> <a href="logout.php" class="nav-link"> Wyloguj się</a> </li>
                            <li> <a href="panel.php" class="nav-link active"> Panel</a> </li>
                        </ul>

                    </div>
                </nav>
                </header>
                    <div id="headline-panel" class="headline-section">
                        <?php
                            echo "<h1 class='headline'>Witaj {$_SESSION['user_nickname']}, miło cię widzieć ;)</h1>";
                            echo '<a href="profile.php"><button class="btn-join-2">Mój Profil</button></a>';
                        if ($_SESSION["user_rank"] == "rekrut") {
                            echo '<a href="#"><button class="btn-join-2">Zdaj na white-list</button></a>';
                        } else {
                            echo '<a href="https://discord.gg/WYq74GqehK" target="_blank"><button class="btn-join-2">Dołącz na serwer</button></a>';
                        }
                        if ($_SESSION["user_rank"] == "administrator") {
                            echo '<a href="#"><button class="btn-join-2">Zarządzaj podaniami</button></a>';
                            echo '<a href="manageUsers.php"><button class="btn-join-2">Zarządzaj graczami</button></a>';
                        }
                        ?>
                    </div>
                    <div class="container-car">

                    </div>


            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
            <script src="script-2.js"></script>
          

    </body>

    </html>