<?php
require('reg-server-config.php');


 if($_SESSION['is_admin'] != 1){
     header("Location: index.php");
     exit;
 }
// Enter your host name, database username, password, and database name.
// If you have not set database password on localhost then set empty.


include 'includes/header.admin.php';


if(isset($_POST['submit'])){
    $qty = $_POST['quantity'];
    $pid = $_GET['pid'];

    mysqli_query("SELECT * FROM producten WHERE id='$pid'");
    

    if(!isset($_SESSION['cart'][$pid])){
        $_SESSION['cart'][$pid] = array(
            'aantal' => $qty 
        );
    }else{
        $currentQty = $_SESSION['cart'][$pid]['aantal'];
        $_SESSION['cart'][$pid]['aantal'] = $currentQty + $qty;
    }

    header("Location: winkelwagenadmin.php");
    exit;

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="style/specifiek.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<main>

<div class="container-fluid">
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container" >	
				<div class="col-md-12">
                
                <?php
                $stmt = $mysqli->query('SELECT * FROM producten WHERE id = "' . $_GET['id']. '"');
                foreach ($stmt as $row){ 
                ?>

                <form method="post" ENCTYPE="multipart/form-data" action="specifiekadmin.php?action=add&pid=<?php echo $row["id"]; ?>">
					<div class="product col-md-3 service-image-left" name="img">
                        <img class="img" name="img" src="<?= $row["img"]?>">
                    </div>
					
					<div class="col-md-7">
					<div class="product-title" name="naam">
                    <?php echo $row["naam"]; ?>
    	            </div>
					
					<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
					<div class="product-size" name="size" >
                    <?php
                    echo $row["size"];
                    ?>
                    </div>
					<div class="product-prijs" name="prijs">
                    <?php
                    echo $row["prijs"];
                    ?>

                    </div>
                    <div class="product-color" name="color">
                    <?php
                    echo $row["color"];
                    ?>
                    </div>
                    <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />
					<hr>
					<div class="btn-groupcart">
                    
					<input type="submit" name="submit" value= "add to cart" class="btnAddAction">
					</div>
                </form>
				</div>
			</div> 
        </div>
    </div>
</div>

		<!-- <div class="container-fluid">		
			<div class="col-md-12 product-info">
					
				
					<div class="tab-pane fade" id="service-two">
						
						<section class="container">
								
						</section>
						
					</div>
					<div class="tab-pane fade" id="service-three">
												
					</div>
				</div>
				<hr>
			</div>
		</div> -->

</main>
</body>
</html>

<?php
};

// case "add":
//     if(!empty($_POST["quantity"])) {
//     $pid=$_GET["id"];
//     $result=mysqli_query($con,"SELECT * FROM producten WHERE id='$pid'");
//     while($productByCode=mysqli_fetch_array($result)){
//     $itemArray = array($productByCode["code"]=>array('naam'=>$productByCode["naam"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'prijs'=>$productByCode["prijs"], 'img'=>$productByCode["img"], 'color'=>$productByCode["color"], 'size'=>$productByCode["size"] ));
//     if(!empty($_SESSION["cart_item"])) {
//     // searches for specific value code
//     if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
//     foreach($_SESSION["cart_item"] as $k => $v) {
//     if($productByCode[0]["code"] == $k) {
//     if(empty($_SESSION["cart_item"][$k]["quantity"])) {
//     $_SESSION["cart_item"][$k]["quantity"] = 0;
//     }
//     $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
//     }
//     }
//     } else {
//     //The array_merge() function merges one or more arrays into one array.
//     $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
//     }
//     } else {
//     $_SESSION["cart_item"] = $itemArray;
//     }
//     }
//     }
//     break;

include 'includes/footer.php'
?>