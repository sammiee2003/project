<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
$host = '127.0.0.1:3306';
$db   = 'adminpagina';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new \PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}


include 'includes/header.php';
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
			<div class="container">	
				<div class="col-md-12">
					<div class="product col-md-3 service-image-left">
                     <?php
                        $stmt = $pdo->query('SELECT img FROM producten WHERE id = "' . $_GET['id']. '"');
                        foreach ($stmt as $row){ ?>
                        <img class="img" name="img" src="<?= $row["img"]?>">
                        <?php
                        };
                        ?>
						
					</div>
					
					<div class="col-md-7">
					<div class="product-title">
                    <?php
                        $stmt = $pdo->query('SELECT naam FROM producten WHERE id = "' . $_GET['id']. '"');
                        foreach ($stmt as $row){
                        echo $row["naam"];
                        };
                        ?>
    	            </div>
					
					<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
					<div class="product-size"><?php
                        $stmt = $pdo->query('SELECT size FROM producten WHERE id = "' . $_GET['id']. '"');
                        foreach ($stmt as $row){
                        echo $row["size"];
                        };
                    ?></div>
					<div class="product-prijs">
                    <?php
                    $stmt = $pdo->query('SELECT prijs FROM producten WHERE id = "' . $_GET['id']. '"');
                    foreach ($stmt as $row){
                    echo $row["prijs"];
                    };
                ?>

                    </div>
                    <div class="product-color">
                   
<?php
$stmt = $pdo->query('SELECT color FROM producten WHERE id = "' . $_GET['id']. '"');
foreach ($stmt as $row){
    echo $row["color"];
};
?>

                    </div>
					<hr>
					<div class="btn-groupcart">
						<button type="button" class="btn btn-success" id="btn">
							Add to cart 
						</button>
					</div>
					
				</div>
			</div> 
		</div>
		<div class="container-fluid">		
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
		</div>
	</div>
</div>
</main>
</body>
</html>

<?php
include 'includes/footer.php'
?>