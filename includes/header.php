<?php
if(!isset($menu)){
$menu="utama";
}
?>

<!DOCTYPE html>
<html lang="ms">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Biskut Klasik</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Imperial+Script&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Questrial&display=swap" rel="stylesheet">

<style>

.page-body{
font-family:'Questrial',sans-serif;
background:#f0f2f5;
margin:0;
padding:20px;
min-height:100vh;
display:flex;
flex-direction:column;
}

.container{
max-width:1200px;
margin:auto;
flex:1;
}

.header-wrapper{
display:flex;
justify-content:space-between;
align-items:center;
background:#333;
padding:20px;
border-radius:8px;
margin-bottom:20px;
}

.site-title{
font-family:'Imperial Script',cursive;
font-size:4.5rem;
color:#fff;
margin:0;
}

.nav-menu{
display:flex;
gap:20px;
}

.nav-link{
text-decoration:none;
color:white;
font-size:1.4rem;
}

.nav-link:hover{
color:#e44d26;
}

.nav-link.active{
color:#e44d26;
border-bottom:2px solid #e44d26;
}

.page-title{
text-align:center;
border-bottom:2px solid #ddd;
padding-bottom:10px;
}

.gallery-row{
display:flex;
gap:20px;
justify-content:center;
flex-wrap:wrap;
margin-top:30px;
}

.gallery-thumb{
width:150px;
border-radius:10px;
}

.product-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
gap:20px;
margin-top:20px;
}

.product-card{
background:white;
padding:20px;
border-radius:8px;
}

.product-image{
width:100%;
height:200px;
object-fit:contain;
}

.qty-input{
width:60px;
}

.checkout-section{
background:white;
padding:25px;
margin-top:40px;
border-radius:8px;
max-width:550px;
margin-left:auto;
margin-right:auto;
}

.total-amount{
font-size:2rem;
color:green;
}

.main-footer{
background:#333;
color:white;
text-align:center;
padding:20px;
margin-top:30px;
border-radius:8px;
}

</style>

</head>

<body class="page-body">

<div class="container">