<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php

    function mysql_prep( $value ) {
        $magic_quotes_active = get_magic_quotes_gpc();
        $new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
        if( $new_enough_php ) { // PHP v4.3.0 or higher
            // undo any magic quote effects so mysql_real_escape_string can do the work
            if( $magic_quotes_active ) { $value = stripslashes( $value ); }
            $value = mysql_real_escape_string( $value );
        } else { // before PHP v4.3.0
            // if magic quotes aren't already on then add slashes manually
            if( !$magic_quotes_active ) { $value = addslashes( $value ); }
            // if magic quotes are active, then the slashes already exist
        }
        return $value;
    }

    function redirect_to( $location = NULL ) {
        if ($location != NULL) {
            header("Location: {$location}");
            exit;
        }
    }

?>
<?php
    if (isset($_POST['klopt']) && ($_POST['klopt']) == "waar" ) {

        $errors = array();
        
            if (!empty($_POST['username'])){
                if (strlen(trim(mysql_prep($_POST['username']))) <6 || strlen(trim(mysql_prep($_POST['username']))) >20) {
                $errors[0] = "Username niet de juiste lengte";
                }
            } else {
            $errors[0] = "Username niet ingevoerd";
            }
            
            if (!empty($_POST['password'])){
                if (strlen(trim(mysql_prep($_POST['password']))) <6 || strlen(trim(mysql_prep($_POST['password']))) >30) {
                    $errors[1] = "password niet de juiste lengte";
                }
            } else {
                $errors[1] = "Password niet ingevoerd";
            }
            
        $username = trim(mysql_prep($_POST['username']));
        $password = trim(mysql_prep($_POST['password']));
        $hashed_password = sha1($password);
                
        if ( empty($errors) ) {
            
            $query = "SELECT id_accounts, username, voornaam, rechten ";
            $query .= "FROM accounts ";
            $query .= "WHERE username = '{$username}' ";
            $query .= "AND hashed_password = '{$hashed_password}' ";
            $query .= "LIMIT 1";
            $result = mysql_query($query);
            if (!$result) {
                die("Database query failed: " . mysql_error());
            }
            $nummer = mysql_num_rows($result);
            if ($nummer == 1) {

                $found_user = mysql_fetch_array($result);
                
                    $_SESSION['id_accounts'] = $found_user['id_accounts'];
                    $_SESSION['username'] = $found_user['username'];    
                    $_SESSION['voornaam'] = $found_user['voornaam'];
                    $_SESSION['rechten'] = $found_user['rechten'];
                    if (!isset($found_user['rechten'])){
                        exit;
                    } elseif ($found_user['rechten'] == 1){
                        header("Location: admin.php");
                        exit;
                    } elseif ($found_user['rechten'] == 0) {
                        header("Location: klant.php");
                    } else {
                        exit;
                    }
            } else {
                $message = "<br />Username/password combination incorrect.<br />
                    Please make sure your caps lock key is off and try again.";
            }
            
        } else {
            $message = "";
            if (isset ($errors[0])){$message =  "<br />" . $errors[0] . "<br />";}
            if (isset ($errors[1])){$message =  "<br />" . $errors[1] . "<br />";}
        }
        
    } else {
        $username = "";
        $password = "";
    }

?>
<div id="content">
<h1>Login</h1>
<form action="test.php" method="post" name="f1">
<table >
<tr>
<th>Username:</th>
<td ><input type="text" name="username" maxlength="30" value="
<?php echo htmlentities($username); ?>
" /></td>
</tr>
<tr>
<th>Password:</th>
<td ><input type="password" name="password" maxlength="30" value="
<?php echo htmlentities($password); ?>
" /></td>
</tr>
<tr>
<input type="hidden" name="klopt" value="waar">
<td colspan="2" ><input type="submit" name="submit" value="Login" /></td>
</tr>
</table>
</form>

<?php
    if (!empty($message)){
        echo "" . $message;
    }
?>

</div>
</body>
</html>