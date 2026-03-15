<?php
session_start();

$menu = $_GET['menu'] ?? 'utama';

switch ($menu) {

case 'utama':
include "views/utama.php";
break;

case 'tempah':
include "views/tempah.php";
break;

case 'process_tempahan':
include "process/process_tempahan.php";
break;

case 'invois':
include "views/invois.php";
break;

default:
echo "Menu tidak dijumpai";
}