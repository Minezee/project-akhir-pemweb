<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="idDestinasiWisata" placeholder="id destinasi wisatanya">
        <input type="text" name="komentar" id="" placeholder="tambahkan komentar...">
        <input type="submit" value="submit" name="t">
    </form>
</body>
</html>

<?php 
    require("DestinasiWisata.php");

    if (isset($_POST['t'])) {
        main();
    }

    function main() {
        $dw = new DestinasiWisata();
        $dw->addKomentar($_POST['idDestinasiWisata'], $_POST['komentar']);
    }
?>