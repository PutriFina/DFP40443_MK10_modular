<?php
session_start();

$menu=$_GET['menu'] ?? 'utama';

include "includes/product.php";
include "includes/header.php";
include "includes/nav.php";

if($menu=="utama"){
?>

<h1 class="page-title">Selamat Datang</h1>

<div class="gallery-row">

<?php foreach($data as $produk){ ?>

<img src="gambar/<?= $produk['gambar'] ?>"
class="gallery-thumb">

<?php } ?>

</div>

<div style="margin-top:40px;background:white;padding:30px;border-radius:8px;text-align:center">

<h3>Cara Membuat Tempahan</h3>

<p>

Klik menu <b>Tempah</b>, isi kuantiti biskut dan nama anda.

Tekan <b>Teruskan</b> untuk melihat invois dan cetak.

</p>

</div>

<?php
}

elseif($menu=="tempah"){

if($_SERVER["REQUEST_METHOD"]=="POST"){

$nama=$_POST['nama_pelanggan'];

$tempahan=$_POST['tempahan'];

$items=[];

$total=0;

foreach($tempahan as $pid=>$saizlist){

foreach($data as $p){

if($p['id']==$pid){

foreach($saizlist as $saiz=>$qty){

$qty=(int)$qty;

if($qty>0){

$harga=$p['harga'][$saiz];

$jumlah=$qty*$harga;

$items[]=[

'nama'=>$p['nama'],
'saiz'=>$saiz,
'harga'=>$harga,
'qty'=>$qty,
'jumlah'=>$jumlah

];

$total+=$jumlah;

}

}

}

}

}

if($total==0){

echo "<script>alert('Sila pilih sekurang-kurangnya satu biskut');location='index.php?menu=tempah'</script>";

exit();

}

$_SESSION['invois']=[

'nama'=>$nama,
'no'=>"INV".rand(10000,99999),
'tarikh'=>date("d/m/Y"),
'items'=>$items,
'total'=>$total

];

header("Location:index.php?menu=invois");
exit();

}
?>

<h1 class="page-title">Borang Tempahan</h1>

<form method="POST">

<div class="product-grid">

<?php foreach($data as $p){ ?>

<div class="product-card">

<img src="gambar/<?= $p['gambar'] ?>" class="product-image">

<h3><?= $p['nama'] ?></h3>

<?php foreach($p['harga'] as $saiz=>$harga){ ?>

<div>

<?= ucwords(str_replace("_"," ",$saiz)) ?>

RM<?= number_format($harga,2) ?>

<input type="number"
name="tempahan[<?= $p['id'] ?>][<?= $saiz ?>]"
value="0"
min="0"
class="qty-input">

</div>

<?php } ?>

</div>

<?php } ?>

</div>

<div class="checkout-section">

<label>Nama Penuh</label>

<input type="text"
name="nama_pelanggan"
required
style="width:100%;padding:10px">

<br><br>

<button type="submit">Teruskan</button>

</div>

</form>

<?php
}

elseif($menu=="invois"){

if(!isset($_SESSION['invois'])){

echo "<script>alert('Tiada tempahan');location='index.php?menu=tempah'</script>";
exit();

}

$inv=$_SESSION['invois'];
?>

<h1 class="page-title">Invois Tempahan</h1>

<p><b>Nama:</b> <?= $inv['nama'] ?></p>

<p><b>No Invois:</b> <?= $inv['no'] ?></p>

<p><b>Tarikh:</b> <?= $inv['tarikh'] ?></p>

<table border="1" width="100%" cellpadding="10">

<tr>
<th>Produk</th>
<th>Saiz</th>
<th>Harga</th>
<th>Qty</th>
<th>Jumlah</th>
</tr>

<?php foreach($inv['items'] as $i){ ?>

<tr>

<td><?= $i['nama'] ?></td>

<td><?= $i['saiz'] ?></td>

<td>RM<?= number_format($i['harga'],2) ?></td>

<td><?= $i['qty'] ?></td>

<td>RM<?= number_format($i['jumlah'],2) ?></td>

</tr>

<?php } ?>

<tr>

<td colspan="4"><b>Jumlah Besar</b></td>

<td><b>RM<?= number_format($inv['total'],2) ?></b></td>

</tr>

</table>

<br>

<button onclick="window.print()">Cetak Invois</button>

<?php
}

else{

echo "<h2>Menu tidak ditemui</h2>";

}

include "includes/footer.php";
?>