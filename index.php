<?php
session_start();
include "data_produk.php";

$menu = $_GET['menu'] ?? 'utama';

include "header.php";

switch ($menu) {
    case 'tempah':
        include "tempah.php";
        break;
    case 'invois':
        include "invois.php";
        break;
    default:
        include "utama.php";
}

include "footer.php";
?>