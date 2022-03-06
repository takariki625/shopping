<?php 
require("../add/shop.php");
$shop=new Shop();
$shop->start();
$goodsList=$shop->getList();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta chrset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>トップページ</title>
    <link rel="stylesheet" href="css/index.css" media="screen and (min-width:601px)">
    <link rel="stylesheet" href="css/mobile.css" media="screen and (max-width:600px)">
    <link rel="stylesheet" href="css/cartList.css" media="screen and (max-width:600px)">
  </head>
  <body>
    <header>
      <ul>
        <li>…</li>
        <li>Eshop</li>
        <li id="cartList">🛒</li>
      </ul>
      <p>USERさん --ようこそ</p>
    </header>
    <main>
    