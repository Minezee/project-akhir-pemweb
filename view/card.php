<?php
$url = "wisata.php?nama=" . $nama_tempat . "&id=" . $id;
?>

<a href="<?php echo $url; ?>">
    <div class="h-64 bg-cover bg-center rounded-lg flex items-end justify-center text-lg"
        style="background-image: url('../model/img/<?php echo $firstImage; ?>');">
        <div class="w-full py-4 bg-black/40 text-white rounded-b-lg">
            <?php echo $nama_tempat ?>
        </div>
    </div>
</a>