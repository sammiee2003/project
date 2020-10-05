<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style/inlog.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="script.js"></script>
</head>
<body>
<div id="header">
        <div id="headerlinks">
            <img src="images/gewicht.png" id="gewichtje" onclick="toonmenu('toon')">
            <div id="menu" >
                <ul><br>
                    <li ><a href="project.html" class="betaalmenu">Home</a></li>
                    <li><a href="producten.php" class="betaalmenu">Producten</a>
                        <ul class="drop">
                            <li><a href="gewichten.php" class="betaalmenu">Gewichten</a></li>
                            <li><a href="elatieken.php" class="betaalmenu">Elastieken</a></li>
                            <li><a href="andere.php" class="betaalmenu">Andere sport artikelen</li>
                        </ul>
                    </li>
                    <li><a href="contact.php" class="betaalmenu">Contact</a></li>
                    <li><a href="testlog.php" class="betaalmenu">Inloggen</a></li>
                </ul><br>
                <button onclick="toonmenu('sluit')" id="sluit" class="button3">sluit menu</button>

               


            </div>
        </div>
        <div id="headerrechts">
            <div class="wrapper">
                <input type="text" class="input" placeholder="Waar bent u naar opzoek?">
                <div class="searchbtn"><i class="fas fa-search"></i></div>
            </div>

            <a href="winkelwagen.php" target="_blank">
            <img src="images/shoppingcart.png" id="winkelwagen" onclick="">
          </a>
        </div>
    </div>

<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
<footer>
        <div id="instagram">
            <p>Social media</p>
            <a href="https://www.w3schools.com/"></a>
            <img id="insta" src="images/insta.svg">
            </a>
        </div>

        <div id="contact">
            <div id="contactgegevens">Contactgegevens
                <img id="phone" src="images/phone.png">
                <p>Tobias: 06 3601 1018 </p>
                <p>Casper: 06 3121 5244</p>
                <img id="gm" src="images/Gmail.png">
                <p>musclemania.net@gmail.com</p>


            </div>
        </div>

        <div id="vandaag">

</div>

    </footer>
</body>
</html>