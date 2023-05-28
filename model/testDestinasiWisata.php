<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="nama" id="n">
        <input type="text" name="deskripsi" id="d">
        <input type="file" name="galeri[]" id="g" accept="image/*" multiple>
        <input type="text" name="lokasi" id="l">
        <input type="submit" value="submit" name="t">
    </form>
    <script>
        // document.querySelector("input[type='submit']").addEventListener("click", function(event){
        //     event.preventDefault();
        // });
    </script>
</body>

</html>

<?php
require("DestinasiWisata.php");

if (isset($_POST["t"])) {
    main();
}

function main()
{
    // cek input valid atau tidak
    // kode untuk ngecek...

    if (!file_exists("./img")) {
        mkdir("img");
    }

    $galeri = $_FILES['galeri'];
    for ($i = 0; $i < count($galeri['name']); $i++) {
        $target = "./img/" . $galeri['name'][$i];

        if (move_uploaded_file($galeri['tmp_name'][$i], $target)) {
            echo '<script type="text/JavaScript"> 
                            console.log("File sudah di-upload.")
                        </script>';
        } else {
            echo '<script type="text/JavaScript"> 
                            console.log("Terjadi kesalahan, coba lagi nanti.")
                         </script>';
        }
    }


    // $galeriJSON = json_encode($galeri['name']);
    // print_r($galeri['name']);
    $dw = new DestinasiWisata();
    $dw->addDestinasiWisata($_POST['nama'], $_POST['deskripsi'], $galeri['name'], $_POST['lokasi']);
}
?>