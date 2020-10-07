<?php 
    include 'includes/header.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="style/winkelwagen.css">
    <script src="winkelwagen.js"></script>
    <title>Document</title>
</head>

<body>

<?php

session_start();
// Database connectie maken
include('Config.php');



// Kijk of er iets in de winkelwagen zit
if(empty($_SESSION['winkelwagen']))
{
    echo '<p class="error">Uw winkelwagen is momenteel leeg.</p>';
}
// Anders
else
{
    echo '<div class="wrapper">';
        echo '<div class="row">';
            echo '<p class="small"><b>Aantal:</b></p>';
            echo '<p class="small"><b>Art. nr.:</b></p>';
            echo '<p class="big"><b>Product:</b></p>';
            echo '<p class="small"><b>Actie:</b></p>';
            echo '<p class="small"><b>Prijs:</b></p>';
        echo '</div>';
    
        // Exploden
        $cart = explode('|', $_SESSION['winkelwagen']);

        // Begin formulier
        echo '<form action="Upd_winkelwagen.php" method="post">';
            // Show winkelwagen
            $i = 0;
            foreach($cart as $products)
            {
                // Split
                /*
                $product[x] -->
                    x == 0 -> product id
                    x == 1 -> hoeveelheid
                */
                $product = explode(',', $products);
        
                // Get product info
                $sql = mysql_query("SELECT * FROM producten WHERE id = '".intval($product[0])."'");
              
                // Als query gelukt is
                if($sql)
                {
                    // Als er items zijn
                    if(mysql_num_rows($sql) > 0)
                    {
                        // Alle items echoën
                        $rec = mysql_fetch_assoc($sql);
                        $i++;
        
                        // Verborgen vars
                        echo '<input type="hidden" name="productnummer_'.$i.'" value="'.$product[0].'" />';
                        
                        echo '<div class="row">';
                            // Aantal
                            echo '<p class="small">';
                                echo '<input type="text" class="aantal_w" name="hoeveelheid_'.$i.'" value="'.$product[1].'" size="2" maxlength="2" onKeyPress="return submitenter(this,event)" />';
                            echo '</p>';
                            
                            // Artikel nummer
                            echo '<p class="small">';
                                if($rec['voorraad'] < $product[1])
                                {
                                    echo '<font style="color: #FF0000;">'.$product[0].'</font>';
                                    $error = TRUE;
                                }
                                else
                                {
                                    echo $product[0];
                                }
                            echo '</p>';
                            
                            // titel
                            echo '<p class="big">';
                                echo $rec['titel'];
                            echo '</p>';
                            
                            // Acties
                            echo '<p class="small">';
                                echo '<a href="javascript:removeItem('.$i.')">Del</a>';
                            echo '</p>';
                            
                            // Prijs
                            echo '<p class="small">';
                                echo '&euro; '.($rec['prijs'] * $product[1]);
                            echo '</p>';
                        echo '</div>';
                    }
                    // Anders
                    else
                    {
                        // Fout weergeven
                        echo '<p class="error">Dit product is er niet meer.</p>';
                    }
                }
                // Anders
                else
                {
                    // Mysql error opvangen
                    echo 'Er is een fout opgetreden in de query. <br />';
                    echo mysql_error();
                }
            }
        echo '</form>';
        
        if($error == TRUE)
        {
            echo '<p class="error">';
                echo 'Van artikelen waarvan het artikelnummer rood is gekleurd hebben we niet voldoende op voorraad om je bestelling direct uit te kunnen leveren.';
            echo '</p>';
        }
    echo '</div>';
    
    // Winkelwagen leeghalen & Afrekenen
    echo '<a href="javascript:removeCart()">Winkelwagen leeghalen</a><br />';
    echo '<a href="Afrekenen.php">Afrekenen</a></p>';
}
?>
</body>
</html>