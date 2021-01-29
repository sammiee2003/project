<!DOCTYPE html>
<?php 
    include 'includes/header.klant.php'; 
    include 'reg-server-config.php';
    

 
    
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);






?>


<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/producten.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    

</head>

<body>
    <main>
    <div class="container">
    

    <div class="row">
        <?php 
        $query = $mysqli->query("SELECT * FROM producten WHERE catogorie = 'overig'");
        while ($row = mysqli_fetch_assoc($query)): 
        $i = explode( ",", $row["size"]);
        ?>
        <div class="col-md-3 col-sm-6" >
            <div class="product-grid7" method="POST" ENCTYPE="multipart/form-data">
                <div class="product-image7">
                    <a href="">
                        <img class="img" name="img" src="<?= $row["img"]?>">
                        
                    </a>
                    <ul class="social">
                        <li><a href="" class="fa fa-search"></a></li>
                        <li><a href="" type="submit" name="submit" class="fa fa-shopping-bag"></a></li>
                        <li><a href="winkelwagen.php" class="fa fa-shopping-cart"></a></li>
                    </ul>
                    <span class="product-new-label">New</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#" name="naam"><?= $row["naam"]?></a></h3>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                    <div class="size">
                    <h5>Size :</h5>
                   <?php 
                    foreach ($i as $size) : 
                    if(!empty($size)) :
                        
                   ?>
                   <span name="size"><?= $size ?></span>
                   <?php 
                    endif;
                    endforeach;
                   ?>
                </div>
                <div class="color">
                    <h5 >Color : <span name="color"><?= $row["color"]?></span></h5>
                </div>
                <div class="price">
                        <span name="prijs"><?= $row["prijs"]?></span>
                </div>
                <?php
                echo '<a href="specifiekklant.php?id=' . $row['id'] . '">Bekijk details</a>' 
                ?>
                    
            </div>
        </div>
       
        
      
</div>
<hr>
<?php 
        endwhile ?>


    </main>

    <?php
    include 'includes/footer.php'
    ?>
    <script src="script.js"></script>
</body>

</html>