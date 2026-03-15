<?php

if(!isset($_SESSION['invois_data'])){

echo "<script>
alert('Tiada invois');
window.location='index.php?menu=tempah';
</script>";

exit();

}

$invois=$_SESSION['invois_data'];

include "includes/header.php";
include "includes/nav.php";

?>

<h1 class="page-title">Invois Tempahan</h1>

<table class="invoice-table">

<tr>
<th>Produk</th>
<th>Saiz</th>
<th>Harga</th>
<th>Kuantiti</th>
<th>Jumlah</th>
</tr>

<?php foreach($invois['items'] as $item): ?>

<tr>

<td><?= $item['nama_produk'] ?></td>

<td><?= $item['saiz'] ?></td>

<td>RM <?= number_format($item['harga_seunit'],2) ?></td>

<td><?= $item['kuantiti'] ?></td>

<td>RM <?= number_format($item['jumlah_harga'],2) ?></td>

</tr>

<?php endforeach; ?>

<tr>

<td colspan="4">Jumlah Besar</td>

<td>RM <?= number_format($invois['jumlah_besar'],2) ?></td>

</tr>

</table>

<button onclick="window.print()">Cetak Invois</button>

<?php include "includes/footer.php"; ?>