<?php
require_once(__DIR__ . "/../model/DestinasiWisata.php");
$dw = new DestinasiWisata();
$results = $dw->getSingle($_GET['id']);
$imageArray = json_decode($results['galeri'], true);
$firstImage = $imageArray[0];
$deskripsi = $results["deksripsi"];
$lokasi = $results["lokasi"];
$coords = explode(", ", $lokasi);
$lat = $coords[0];
$lng = $coords[1];
$komenArray = json_decode($results['komen'], true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Document</title>
</head>

<body class="font-inter">
    <header class="flex flex-col w-full aspect-[2.29299363057/1] bg-cover bg-no-repeat text-white bg-black"
        style="background-image: url('../model/img/<?php echo $firstImage; ?>');">
        <div class="bg-black/20 w-full h-full flex flex-col">
            <?php require_once 'navbar.php'; ?>
            <div class="flex flex-col w-full flex-1 text-5xl font-semibold items-center justify-center">
                <p class="drop-shadow-md shadow-black">
                    <?php
                    if (isset($_GET['nama'])) {
                        $nama_tempat = $_GET['nama'];
                        echo $nama_tempat;
                    }
                    ?>
                </p>
            </div>
        </div>
    </header>
    <main class="flex flex-col items-start w-full px-10">
        <h2 class="text-[#001E57] mt-10 text-4xl font-bold">Description</h2>
        <p class="mt-3">
            <?php echo $deskripsi ?>
        </p>
        <h2 class="text-[#001E57] mt-10 text-4xl font-bold">Gallery</h2>
        <div class="swiper mySwiper h-[400px] w-full mt-10">
            <div class="swiper-wrapper">
                <?php
                $images = ['background.png', 'background.png', 'background.png', 'background.png', 'background.png', 'background.png'];

                foreach ($imageArray as $image) {
                    echo '<img class="swiper-slide rounded-2xl" src="../model/img/' . $image . '" alt="Slide Image">';
                }
                ?>
            </div>
        </div>
        <h2 class="text-[#001E57] mt-10 text-4xl font-bold">Location</h2>
        <div id="map" class="mt-3 w-96 h-96" style="height: 400px; width: 100%;"></div>
        <h2 class="text-[#001E57] mt-10 text-4xl font-bold">Comment</h2>
        <?php
        if (isset($_POST['komen'])) {
            main();
            header("Location: ".$_SERVER['REQUEST_URI']);
            exit;
        }

        function main()
        {
            $dw = new DestinasiWisata();
            $dw->addKomentar($_GET['id'], $_POST['komentar']);
        }
        ?>
        <div class="flex flex-row w-full items-center gap-3 mt-5">
            <img src="../assets/background.png" alt="profile" class="rounded-full h-14 w-14">
            <form action="" method="post" class="flex flex-row border border-gray-400 flex-1 items-center">
                <input class="px-2 py-3 flex-1" type="text" name="komentar" id="" placeholder="tambahkan komentar...">
                <button type="submit" name="komen" class="bg-[#001E57] h-full px-4 py-3 text-white font-bold">
                    submit
                </button>
            </form>
        </div>
        <div class="mt-10 w-full flex flex-col gap-5">
            <?php
            foreach ($komenArray as $waktu => $komentar) {
                require 'comment.php';
            }
            ;
            ?>
        </div>
    </main>
    <?php require_once 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNLrJhOMz6idD05pzfn5lhA-TAw-mAZCU&callback=initMap"
        async defer></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: '2',
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        function initMap() {
            var myLatLng = { lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?> };

            var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 15
            });

            var marker = new google.maps.Marker({
                map: map,
                position: myLatLng,
                title: 'Museum Angkut'
            });
        }
    </script>
</body>

</html>