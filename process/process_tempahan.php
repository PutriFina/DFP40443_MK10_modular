<?php

include "includes/products.php";

$nama = htmlspecialchars(trim($_POST['nama_pelanggan']));

$tempahan = $_POST['tempahan'] ?? [];

$item_tempahan = [];

$jumlah_besar = 0;

foreach($tempahan as $produk_id=>$saiz_list){

foreach($data as $p){

if($p['id']==$produk_id){

foreach($saiz_list as $saiz=>$kuantiti){

$kuantiti=(int)$kuantiti;

if($kuantiti>0){

$harga=$p['harga'][$saiz];

$jumlah=$kuantiti*$harga;

$item_tempahan[]=[

'nama_produk'=>$p['nama'],
'saiz'=>ucwords(str_replace("_"," ",$saiz)),
'harga_seunit'=>$harga,
'kuantiti'=>$kuantiti,
'jumlah_harga'=>$jumlah

];

$jumlah_besar+=$jumlah;

}

}

}

}

}

if($jumlah_besar==0){

echo "<script>
alert('Sila pilih sekurang-kurangnya satu biskut');
window.location='index.php?menu=tempah';
</script>";

exit();
}

$_SESSION['invois_data']=[

'no_invois'=>"INV-".rand(10000,99999),
'nama_pelanggan'=>$nama,
'tarikh'=>date("d/m/Y"),
'items'=>$item_tempahan,
'jumlah_besar'=>$jumlah_besar

];

header("Location: index.php?menu=invois");

exit();