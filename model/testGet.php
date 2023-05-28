<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="search" id="">
        <input type="submit" value="findMany" name="gm"> <br> <br>

        <input type="submit" value="findAll" name="ga"> <br> <br>

        <input type="text" name="id" id="">
        <input type="submit" value="findSingle" name="gs">
    </form>
</body>
</html>

<?php 
    require("./DestinasiWisata.php");
    $dw = new DestinasiWisata();

    if (isset($_GET['gm'])) {
        print_r($dw->getMany($_GET['search']));
    }
    else if (isset($_GET['ga'])) {
        print_r($dw->getAll());
    }
    else if (isset($_GET['gs'])) {
        print_r($dw->getSingle($_GET['id']));
    }
?>