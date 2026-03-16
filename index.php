<?php

session_start();

$menu = $_GET['menu'] ?? 'utama';

switch($menu){

case "utama":
include "pages/utama.php";
break;

case "tempah":
include "pages/tempah.php";
break;

case "invois":
include "pages/invois.php";
break;

default:
echo "Menu tidak ditemui";

}