<?php 
require('reg-server-config.php');
    include 'includes/header.admin.php'; 
    
   if(empty($_SESSION['cart'])){
?>
<P id= "leeg">uw winkelwagen is leeg</p>
<?php
}else{
    
    
    if(isset($_POST["delete"])){
      unset($_SESSION["cart"]);
    }
   
    if(isset($_POST["remove"]) && isset($_SESSION['cart'])){
      unset($_SESSION['cart'][$_POST['remove']]);
    }

    
 


?>
      
  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/winkelwagen.css" rel="stylesheet">
    
    
    <title>Document</title>
</head>

<body>

<section>
<?php
 if(isset( $_POST["plus"])) {
  $pid = $_POST['plus'];
  //CODE TO ADD TO QUANTITY????
  $_SESSION['cart'][$pid]['aantal']++;
  header("Location: winkelwagenadmin.php");
  exit;
} 
if (isset( $_POST["min"])) {
    $pid = $_POST['min'];
    //CODE TO MIN TO QUANTITY????
    $_SESSION['cart'][$pid]['aantal']--;
    header("Location: winkelwagenadmin.php");
  exit;
  }

  $totaalPrijs = 0;
  
              




?>
 <form method="POST" ENCTYPE="multipart/form-data" action="winkelwagenadmin.php">
  <div class="row" >

  
    <div class="col-lg-8">

      
      <div class="mb-3">
        <div class="pt-4 wish-list">

          <h5 class="mb-4">Cart (<span><?php echo count($_SESSION['cart']); ?></span> items)</h5>
          <?PHP
          foreach($_SESSION['cart'] as $pid => $cart){
              // QUERY MAKEN MET PRODUCT 
              $query = $mysqli->query("SELECT * FROM producten WHERE id = $pid");
              while ($row = mysqli_fetch_assoc($query)){
                
                $productQuantity = $_SESSION["cart"][$pid]["aantal"];
                $productImg = $row["img"];
                $productNaam = $row['naam'];
                $productColor = $row["color"];
                $productPrijs = $row["prijs"];
                $productSize = $row["size"];
                $gewicht = $row['gewicht'];
               

              }



              $qty = $_SESSION['cart'][$pid]['aantal'];
              $totaalproductprijs= $qty * $productPrijs;
              $totaalPrijs= $totaalPrijs + $totaalproductprijs;

            
              
                
              




          ?>
          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                <a href="#!">
                  <div class="mask">
                  <img class="img" name="img" src="<?php echo $productImg;?>">
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5><?php echo $productNaam;?></h5>
                    <p class="mb-3 text-muted text-uppercase small"><?php echo $productColor;?></p>
                   
                    <p class="mb-3 text-muted text-uppercase small">Size: <?php echo $productSize;?></p>
                    <p class="mb-3 text-muted text-uppercase small">Size: <?php echo $productPrijs;?></p>
                  </div>
                  <div>
                    <div class="def-number-input number-input safari_only mb-0 w-100">
                      <button class="min" type="min" value="<?php echo $pid;?>" name="min">-</button>
                      <input class="quantity" min="0" name="quantity" value="<?php echo $_SESSION['cart'][$pid]['aantal'];?>" type="number">
                      <button class="plus" type="plus" value="<?php echo $pid;?>" name="plus">+</button>
                    </div>
                    
          
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <button type="submit" class="card-link-secondary small text-uppercase mr-3" name="remove" value="<?php echo $pid; ?>"> verwijder item </button>
                    
                  </div>
                  <p class="mb-0"><span><strong id="summary"> <?php echo $totaalproductprijs ;?>€</strong></span></p class="mb-0">
                </div>
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <?PHP } 
            

            $gewicht = $gewicht * $qty;
            
            $shipping = 0;
            if($gewicht >= 2 && $gewicht <= 10){
              $shipping = 6.75;
            }elseif($gewicht > 10 && $gewicht < 30){
              $shipping = 13.00;            
            }elseif ($totaalPrijs > 100){
              $shipping = 0;
            }
              $totaal = $totaalPrijs + $shipping;
          ?>

          
        

        </div>
      </div>
      
      <div class="mb-3">
      <button type="delete" name="delete" value="leeg winkelwagentje" id="delete">leeg winkelwagen</button>
        
    </div>
    

      <div class="mb-3">
        <div class="pt-4">

          
        </div>
      </div>
      
            </form>
    </div>
    
    <div class="col-lg-4">

  
      <div class="mb-3">
        <div class="pt-4">

          <h5 class="mb-3">totaal bedrag</h5>

          <ul class="list-group list-group-flush">
            
          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              totaal prijs van de producten
              <span><?php echo $totaalPrijs ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              verzendkosten
              <span><?php echo $shipping ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>totaal bedrag</strong>
              </div>
              <span><strong><?php echo $totaal;?></strong></span>
            </li>
          </ul>
          <?php 
          
          
          ?>
          <button type="button" class="btn btn-warning btn-block">ga naar afrekenen</button>

        </div>
      </div>
  
      

      <div class="mb-3">
        <div class="pt-4">

          
            </div>
          </div>
        </div>
      </div>
     

    </div>
    

  </div>
 

</section>




</body>
</html>
<?php 
  }
//unset($_session['cart']);
include 'includes/footer.php';

?>