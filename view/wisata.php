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
    <header class="flex flex-col w-full aspect-[2.29299363057/1] bg-cover bg-no-repeat text-white"
        style="background-image: url('../assets/background.png');">
        <?php require_once 'navbar.php'; ?>
        <div class="flex flex-col w-full flex-1 text-5xl font-semibold items-center justify-center">
            <p>
                <?php
                if (isset($_GET['nama'])) {
                    $nama_tempat = $_GET['nama'];
                    echo $nama_tempat;
                }
                ?>
            </p>
        </div>
    </header>
    <main class="flex flex-col items-start w-full px-10">
        <h2 class="text-[#001E57] mt-10 text-4xl font-bold">Description</h2>
        <p class="max-w-[50%] mt-3">Museum Angkut merupakan museum transportasi dan tempat wisata modern yang terletak
            di Kota Batu, Jawa Timur, sekitar 20 km dari Kota Malang. Museum ini terletak di kawasan seluas 3,8 hektar
            di lereng Gunung Panderman dan memiliki lebih dari 300 koleksi jenis angkutan tradisional hingga modern.</p>
        <h2 class="text-[#001E57] mt-10 text-4xl font-bold">Gallery</h2>
        <div class="swiper mySwiper h-[400px] w-full mt-10">
            <div class="swiper-wrapper">
                <?php
                $images = ['background.png', 'background.png', 'background.png', 'background.png', 'background.png', 'background.png'];

                foreach ($images as $image) {
                    echo '<img class="swiper-slide rounded-2xl" src="../assets/' . $image . '" alt="Slide Image">';
                }
                ?>
            </div>
        </div>
        <h2 class="text-[#001E57] mt-10 text-4xl font-bold">Location</h2>
        <div id="map" class="mt-3 w-96 h-96" style="height: 400px; width: 100%;"></div>
        <h2 class="text-[#001E57] mt-10 text-4xl font-bold">Comment</h2>
        <div class="flex flex-row w-full items-center gap-3 mt-5">
            <img src="../assets/background.png" alt="profile" class="rounded-full h-14 w-14">
            <input type="text" placeholder="Add a comment..." class="px-2 py-3 border border-gray-400 flex-1">
        </div>
        <div class="mt-10 w-full flex flex-col gap-5">
            <?php
            $data = ["Nauval Fahreza", "Jobel", "Rafi", "Michael"];

            foreach ($data as $datas) {
                require 'comment.php';
            }
            ;
            ?>
        </div>
        <?php require_once 'footer.php' ?>
    </main>
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
            var myLatLng = { lat: -7.878729, lng: 112.520172 };

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