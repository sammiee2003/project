<?php 
    include 'includes/header.php'; 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

?>


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
    <main>


<?php
    require('reg-server-config.php');
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($mysqli, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($mysqli, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($mysqli, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            

            while($obj = mysqli_fetch_assoc($result)){
                $is_admin = $obj['is_admin'];
            }

           
            $_SESSION['is_admin'] = $is_admin;
            $_SESSION['username'] = $username;

            if($is_admin == 1){
                header("Location: indexadmin.php");
            }else{
               
                header("Location: indexklant.php");
            }

            exit;
            
        }
        
        else {
            header("Location: opnieuw.php");
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Gebruikersnaam" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Wachtwoord"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">Registreren</a></p>
  </form>
    </main>
<?php
    }
    include 'includes/footer.php'
?>

</body>
</html>