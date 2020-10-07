<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link  rel="stylesheet" href="style/style.css">
    <script src="script.js"></script>
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
          <li><a href="login.php">Inloggen</a></li>
        </ul><br>
        <button onclick="toonmenu('sluit')" id="sluit" class="button3">sluit menu</button>

        <!-- <a href="something" class="button3">Button</a> -->


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
</body>
</html>