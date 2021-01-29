<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include "includes/header.klant.php"
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>uitloggen</title>
    <link rel="stylesheet" href="style/dashboard.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>u kunt hieronder klikken om uit te loggen</p>
        <p><a href="logout.php">Log uit</a></p>
    </div>
</body>
</html>
<?php include "includes/footer.php" ?>