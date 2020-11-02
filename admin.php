<?php
include 'includes/header.php';
include 'reg-server-config.php';

$name = "";
$size = [];
$allsizes = "";
$prijs = "";
$color = "";
$error = [];

if (isset($_post['submit'])) {
    $name = $_post['name'];
    $size = $_post['size'];
    $prijs = $_post['price'];
    $color = $_post['color'];

    $stmt = $pdo->prepare("SELECT naam FROM producten WHERE naam = 1");
    $stmt ->execute([$name]);

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

    if(!$errors) {
        foreach ($size as $sizes){
            $allsizes = $allsizes . $sizes . ",";
        }
        $sql = "INSERT INTO producten (naam, size, prijs, color)";
        $stmt = $pdo-> prepare($sql);
        $stmt-> execute([$name,$allsizes,$prijs,$colors]);
    }
}

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
        <form action="Admin.php" method="POST" enctype="multipart/form-data" class="form">
            <div class="name">
                <input type="text" name="name" required placeholder="soort product">
            </div>
            <div class="size">
                <input type="checkbox" name="size[]" value="xs">
                <input type="checkbox" name="size[]" value="s">
                <input type="checkbox" name="size[]" value="m">
                <input type="checkbox" name="size[]" value="l">
                <input type="checkbox" name="size[]" value="xl">
            </div>
            <div class="price">
                <input type="text" name="price" placeholder="€,-" required>
            </div>
            <div class="color">
                <select name="colors">
                    <option type="checkbox" value="red">rood</option>
                    <option type="checkbox" value="blue">blauw</option>
                    <option type="checkbox" value="yellow">geel</option>
                    <option type="checkbox" value="green">groen</option>
                    <option type="checkbox" value="purple">paars</option>
                    <option type="checkbox" value="black">zwart</option>
                    <option type="checkbox" value="grey">grijs</option>
                </select>
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