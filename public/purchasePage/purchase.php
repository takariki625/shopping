<?php 
require("../../add/shop.php");
$shop=new Shop();
$shop->start();
$purchaseList=$shop->purchaseList();
$list=json_encode($purchaseList);
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta chrset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>購入履歴</title>
    <link rel="stylesheet" href="css/purchase.css" media="screen and (max-width:600px)">
  </head>
  <body>
    <header>
      <ul>
        <li>…</li>
        <li>Eshop</li>
        <li id="topPage">Top</li>
      </ul>
    </header>
    <p id="greetingCart">--購入履歴--</p>
    <main>
    </main>
    <script>
      let list=JSON.parse('<?php echo $list; ?>');
    </script>
    <script src="../js/define.js"></script>
    <script src="js/purchase.js"></script>
  </body>
</html>