<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    

</head>

<body>
    <div id="header">
        <div id="headerlinks">
            <img src="images/gewicht.png" id="gewichtje" onclick="toonmenu('toon')">
            <div id="menu">
                <ul><br>
                    <li><a href="project.html">Home</a></li>
                    <li><a href="producten.php">Producten</a>
                        <ul class="drop">
                            <li><a href="gewichten.php">Gewichten</a></li>
                            <li><a href="elatieken.php">Elastieken</a></li>
                            <li><a href="andere.php">Andere sport artikelen</li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="inloggen.php">Inloggen</a></li>
                </ul><br>
                <button onclick="toonmenu('sluit')" id="sluit">sluit menu</button>



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

    

    <main>

    


    <?php

// $host = '127.0.0.1:3306';
// $db   = 'netland';
// $user = 'root';
// $pass = '';
// $charset = 'utf8mb4';
// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $options = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];
// try {
//     $dbh = new PDO($dsn, $user, $pass, $options);
//     // echo("Connected to: " . $db . " on " . $host . " version: " . phpversion());
//     echo("<br>");
// } catch (\PDOException $e) {
//     throw new \PDOException($e->getMessage(), (int)$e->getCode());
// }

session_start();

// include 'conn.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $login_user = $Mysqli->real_escape_string($_POST['gebruikersnaam']);
        $login_pass = $Mysqli->real_escape_string(sha1($_POST['wachtwoord']));
        $user_ip = $_SERVER['REMOTE_ADDR'];
        srand ((double) microtime( )*1000000);
        $session_id = rand(1000,1000000);
 
        $q1 = "
        SELECT
            id,
            username,
            block
        FROM
            users
        WHERE
            username = '".$login_user."'  
        AND
            password = '".$login_pass."'
        ";

            if(!$r1 = $Mysqli->query($q1))
        {
        
            echo 'Er is een fout opgetreden!. '. $Mysqli->error;
        
        }
                                        
                                
                elseif($Mysqli->affected_rows == 1)
                {
    

                                while ($row = $r1->fetch_assoc ())
                                {
                                
                                        $_SESSION["username"] = $row['username'];
                                        $_SESSION['user_id'] = $row['id'];  
                                        $_SESSION['user_ip'] = $user_ip;
                                        $_SESSION['session_id'] = $session_id;
                                              
                                    if ($row['block'] == 1)
                                    {
                                        echo 'Je bent geblokkeerd, je kunt niet meer inloggen!';
                                    }
                                        else
                                        {
                                            //Inloggen gelukt!!
                                            header("location: " . 'index.php?msg=succes');
                                        }

                                
    
    
                    $q2 = "
                    INSERT INTO
                        sessions
                    (
                        user_id,
                        session_id,
                        user_ip
                    )
                    VALUES
                    (
                        '".$row['id']."',
                        '".$session_id."',
                        '".$user_ip."'
                    )
                    ";
                                }

                                    if (!$Mysqli->query ($q2) )
                                    {
                                    
                                        echo 'Er is een fout opgetreden!'. $Mysqli->error;
                                    
                                    }
                                



                }
                    else
                    {  
                        echo 'Gebruikersnaam of wachtwoord onjuist, probeer het opnieuw!';
                    }  
          
    }
        else
        {
            ?>
                <html>
                <head>
                <title>Login</title>
                </head>
                <body>
                
                
                <?php
                    if(isset($_GET['error']))
                    {
                        if($_GET['error'] == 'sess')
                        {
                            echo 'De sessie is ongeldig! Log aub opnieuw in!<p>';
                        }
                    }
                ?>
                    <form method='post' class="form-5 clearfix" >  
                        <div id="login">
                            <h2>Gebruikers login</h2>
                                <table>  
                                    <tr>  
                                        <td>Gebruikersnaam:</td>  
                                        <td><input type='text' name='gebruikersnaam'></td>  
                                    </tr>  
                                    <tr>  
                                        <td>Wachtwoord:</td>  
                                        <td><input type='password' name='wachtwoord'></td>  
                                    </tr>  
                                    <tr>  
                                        <td><input type='submit' name='submit' value='Login'></td>  
                                    </tr>  
                                </table>  
                                </div>
                    </form>
                      
                </body>
                </html>          
        <?php
        }  
        ?>


    </main>

    <footer class="footer">
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
    <script src="script.js"></script>
</body>

</html>