<?php
include 'includes/header.admin.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


 
include 'reg-server-config.php';
   

if($_SESSION['is_admin'] != 1){
    header("Location: index.php");
    exit;
}


if (isset($_POST['submit'])) {
    $allsizes = '';
    $errors = [];
    $name = $_POST['name'];
    $size = $_POST['size'];
    $prijs = $_POST['price'];
    $color = $_POST['color'];
    $cato = $_POST['cato'];
    $gewicht = $_POST['gewicht'];

    if (empty($name)) {
        $errors[] = "vul een naam in";
    }
    if (empty($size)) {
        $errors[] = "vul maten in";
    }
    if (empty($prijs)) {
        $errors[] = "vul de prijs in";
    }
    if (empty($color)) {
        $errors[] = "select een kleur"; 
    }

    if (empty($cato)) {
        $errors[] = "select een catogorie"; 
    }

    if (empty($gewicht)) {
        $errors[] = "vul een gewicht in"; 
    }


    if(!$errors) {
        foreach ($size as $sizes){
            $allsizes.= $sizes . ",";
        }

        $error = $_FILES["img"]["error"];
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["img"]["tmp_name"];
            $dir = 'images/uploads/'.basename($_FILES["img"]["name"]);
            move_uploaded_file($tmp_name, $dir);
        }

        $stmt = $mysqli->prepare("INSERT INTO producten (naam, size, color, prijs, img, catogorie, gewicht) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param('sssdssd', $name, $allsizes, $color, $prijs, $dir, $cato, $gewicht);
        $stmt->execute();
    }

}

// $_FILES['bestand']['tmp_name'];

// if(isset($_FILES['bestand'])) {
//     //het bestand verplaatsten naar de juiste map op de server
//     move_uploaded_file($_FILES['bestand']['tmp_name'], "project1/project/");
//     //berichtje om te laten zien dat het bestand is opgeslagen
//     echo "Het bestand is opgeslagen";
// } else {
//     //er is geen bestand geselecteerd
//     echo "Selecteer een bestand";
// }



// move_upload_file($_FILE['img']['tmp_name'], 'project1/project/producten.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <title>AdminPage</title>
</head>

<body>
    <main>
        <form method="POST" class="form" ENCTYPE="multipart/form-data">
            <div class="name">
                <input type="text" name="name" placeholder="soort product">
            </div>
            <div class="size">
                <input type="checkbox" name="size[]" value="xs">xs
                <input type="checkbox" name="size[]" value="s">s
                <input type="checkbox" name="size[]" value="m">m
                <input type="checkbox" name="size[]" value="l">l
                <input type="checkbox" name="size[]" value="xl">xl
            </div>
            <div class="price">
                <input type="text" name="price" placeholder="€,-">
            </div>
            <div class="color">
                <select name="color">
                    <option type="checkbox" value="red">rood</option>
                    <option type="checkbox" value="blue">blauw</option>
                    <option type="checkbox" value="yellow">geel</option>
                    <option type="checkbox" value="green">groen</option>
                    <option type="checkbox" value="purple">paars</option>
                    <option type="checkbox" value="black">zwart</option>
                    <option type="checkbox" value="grey">grijs</option>
                </select>
            </div>
            <div class="img">
                <input type="file" name="img" placeholder="select een afbeelding" accept="image/jpeg" >
            </div>
            <div class="catogorie">
                <select name="cato">
                    <option type="checkbox" value="gewichten">gewichten</option>
                    <option type="checkbox" value="elastieken">elastieken</option>
                    <option type="checkbox" value="overig">overig</option>
                </select>
            </div>
            <div class="gewicht">
                <input type="text" name="gewicht" placeholder="kilogram">
            </div>
            <input type="submit" name="submit" value="Zet het online!">
        </form>
    </main>
    <footer>

    </footer>
    <script>

    </script>
</body>

</html>

<?php
include 'includes/footer.php'
?>