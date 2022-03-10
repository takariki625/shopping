<?php 
require("../../add/shop.php");
$shop=new Shop();
$shop->start();
$cartList=$shop->cartList();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta chrset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>トップページ</title>
    <link rel="stylesheet" href="css/cartList.css" media="screen and (max-width:600px)">
  </head>
  <body>
    <header>
      <ul>
        <li>…</li>
        <li>Eshop</li>
      </ul>
    </header>
<p id="greetingCart">--お気に入り--</p>
  <main>
    <ul id="cartList">
      <?php foreach($cartList as $goods): ?>
          <li data-id="<?= $goods["id"]; ?>">
            <img src="../../img/<?= $goods["img"]; ?>.png" class="img">
            <div class="delBtn">削除</div>
            <div class="name"><?= $goods["name"]; ?></div>
            <input type="number" value=<?=$goods["quantity"]; ?> class="quantity">
            <div class="comment"><?= $goods["comment"]; ?></div>
            <div class="price"><?= $goods["price"]; ?>円</div>
          </li>
      <?php endforeach; ?>
    </ul>
    <button id="purchase">購入手続き</button>
  </main>
    <script src="../js/define.js"></script>
    <script src="js/cartList.js"></script>
  </body>
</html>