<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/account.css">
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

    <div class="partOneInfo">
            <form method="post">
                <div class="txt_field">
                    <input type="email" required>
                    <span></span>
                    <label>E-mail *</label>
                </div>
                <div class="next">
                    <div class="txt_field">
                        <input type="password" required>
                        <span></span>
                        <label>Password *</label>
                    </div>
                    <p></p>
                    <div class="txt_field">
                        <input type="password" required>
                        <span></span>
                        <label>Confirm password *</label>
                    </div>
                </div>
                <div class="next">
                    <div class="txt_field">
                        <input type="text" required>
                        <span></span>
                        <label>Name *</label>
                    </div>
                    <p></p>
                    <div class="txt_field">
                        <input type="text" required>
                        <span></span>
                        <label>Last name *</label>
                    </div>
                </div>
                <div class="next">
                    <div class="txt_field">
                        <input type="text" required>
                        <span></span>
                        <label>Address *</label>
                    </div>
                    <p></p>
                    <div class="txt_field">
                        <input type="text" required>
                        <span></span>
                        <label>Extra *</label>
                    </div>
                </div>
                <div class="next">
                    <div class="txt_field">
                        <input type="text" required>
                        <span></span>
                        <label>ZIP code *</label>
                    </div>
                    <p></p>
                    <div class="txt_field">
                        <input type="text" required>
                        <span></span>
                        <label>City/Town *</label>
                    </div>
                </div>
                
                <div class="txt_field">
                    <input type="tel" required>
                    <span></span>
                    <label>Phone number</label>
                </div>
                <input type="submit" value="create account">
            </form>
        </div>

    </main>

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
    <script src="script.js"></script>
</body>

</html>