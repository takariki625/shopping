<?php 
require("../../add/shop.php");
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
  </head>
  <body>
    <header>
      <ul>
        <li id="topPage">⏎</li>
        <li>Eshop</li>
        <li id="cart">🛒</li>
      </ul>
    </header>
    <p id="greeting">USERさん --ようこそ</p>
    <main>
      <form>
        <input type="text" placeholder="キーワード検索"><!-------------------------------------------------------><input type="submit" value="🔎">
      </form>
      <ul id="contents">
        <li><img src="../../img/star.png"></a><br>お気に入り</li>
        <li><img src="../../img/toggle.png"></a><br>閲覧履歴</li>
        <li id="purchase"><img src="../../img/purchase.png"></a><br>購入履歴</li>
      </ul>
    