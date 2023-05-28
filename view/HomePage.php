<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="font-inter">
    <header class="flex flex-col w-full aspect-[2.29299363057/1] bg-cover bg-no-repeat text-white"
        style="background-image: url('../assets/background.png');">
        <?php require_once 'navbar.php'; ?>
        <div class="flex flex-col w-full flex-1 text-5xl font-semibold items-center justify-center">
            <p>WELCOME TO OUR PAGE</p>
            <img src="../assets/beach.png" alt="">
        </div>
    </header>
    <main class="flex flex-col items-center w-full px-10">
        <h2 class="text-[#001E57] mt-10 text-5xl font-semibold">About this Website</h2>
        <div class="mt-10 w-full flex flex-row gap-10">
            <img src="../assets/background.png" alt="image" class="h-64 rounded-2xl">
            <p class="text-lg">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita corporis velit quas optio soluta, ad
                autem! Cum reiciendis facilis ut, quos incidunt iure eligendi blanditiis. Fuga explicabo quo minus
                reiciendis.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat consequuntur cum eveniet quia facere
                numquam asperiores officiis nisi error veritatis quas corrupti commodi, placeat quidem, rem quam, ab
                sequi maiores!
            </p>
        </div>
        <h2 class="text-[#001E57] text-5xl font-semibold mt-10">Know Your Destination Yet?</h2>
        <form method="get" class="w-1/2 border-black border-2 h-10 my-10 flex justify-between items-center px-2">
            <input type="search" name="search" class="h-full px-2 flex-1">
            <button>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="24" height="24" fill="url(#pattern0)" fill-opacity="0.5" />
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_29_111" transform="scale(0.00195312)" />
                        </pattern>
                        <image id="image0_29_111" width="512" height="512"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
            </button>
        </form>
        <div class="flex flex-col items-start w-full">
            <h2 class="text-[#001E57] text-4xl font-semibold text-start">Choice of Destination</h2>
            <div class="grid grid-cols-5 gap-10 mt-10 w-full text-white text-center">
                <?php
                require_once(__DIR__ . "/../model/DestinasiWisata.php");
                $dw = new DestinasiWisata();
                if (isset($_GET['search'])) {
                    $results = $dw->getMany($_GET['search']);
                    foreach ($results as $result) {
                        $nama_tempat = $result["nama"];
                        $id = $result["id"];
                        $image = $result['galeri'];
                        $imageArray = json_decode($image, true);
                        $firstImage = $imageArray[0];
                        require 'card.php';
                    }
                } else {
                    $results = $dw->getAll();
                    foreach ($results as $result) {
                        $nama_tempat = $result["nama"];
                        $id = $result["id"];
                        $image = $result['galeri'];
                        $imageArray = json_decode($image, true);
                        $firstImage = $imageArray[0];
                        require 'card.php';
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <?php require_once 'footer.php' ?>
</body>

</html>