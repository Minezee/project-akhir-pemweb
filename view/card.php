<?php
$url = "wisata.php?nama=" . urlencode($nama_tempat);
?>

<a href="<?php echo $url; ?>">
    <div class="h-64 bg-cover bg-center rounded-lg flex items-end justify-center pb-4 text-lg"
        style="background-image: url('../assets/background.png');">
        <?php echo $nama_tempat; ?>
    </div>
</a>