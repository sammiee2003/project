<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style/inlog.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

</head>
<body><div id="header">
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

            <img src="images/shoppingcart.png" id="winkelwagen">
        </div>
    </div>

<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
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