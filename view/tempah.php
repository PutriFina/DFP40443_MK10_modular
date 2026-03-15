<?php

include "includes/products.php";
include "includes/header.php";
include "includes/nav.php";

?>

<h1 class="page-title">Borang Tempahan</h1>

<form action="index.php?menu=process_tempahan" method="POST">

<div class="product-grid">

<?php foreach($data as $produk): ?>

<div class="product-card">

<img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>"
class="product-image">

<h3><?= htmlspecialchars($produk['nama']) ?></h3>

<?php foreach($produk['harga'] as $saiz=>$harga): ?>

<div class="product-option">

<label>

<?= ucwords(str_replace("_"," ",$saiz)) ?>

(RM <?= number_format($harga,2) ?>)

</label>

<input type="number"

name="tempahan[<?= $produk['id']?>][<?= $saiz ?>]"

value="0"

min="0"

data-price="<?= $harga ?>"

class="qty-input">

</div>

<?php endforeach; ?>

</div>

<?php endforeach; ?>

</div>

<div class="checkout-section">

<label>Nama Penuh</label>

<input type="text" name="nama_pelanggan" required>

<br><br>

<button type="submit">Teruskan</button>

</div>

</form>

<?php include "includes/footer.php"; ?>