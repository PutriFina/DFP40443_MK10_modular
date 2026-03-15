<?php

include "includes/products.php";
include "includes/header.php";
include "includes/nav.php";

?>

<h1 class="page-title">Selamat Datang</h1>

<div class="gallery-row">

<?php foreach($data as $produk): ?>

<img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>"
class="gallery-thumb">

<?php endforeach; ?>

</div>

<div class="instructions-section">

<h3>Cara Membuat Tempahan</h3>

<p>
Klik menu Tempah, pilih kuantiti biskut dan masukkan nama anda.
Kemudian klik Teruskan untuk melihat invois tempahan.
</p>

</div>

<?php include "includes/footer.php"; ?>