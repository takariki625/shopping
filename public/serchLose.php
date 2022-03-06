<?php require("../add/parts/header.php"); ?>
<main>
  <form>
    <input type="text" placeholder="キーワード検索"><!-------------------------------------------------------><input type="submit" value="🔎">
  </form>
  <ul id="contents">
    <li><img src="../img/star.png"></a><br>お気に入り</li>
    <li><img src="../img/toggle.png"></a><br>閲覧履歴</li>
    <li><img src="../img/purchase.png"></a><br>購入履歴</li>
  </ul>
  <ul id="goodscontents">

  </ul>
  <span id="serchLose">
    <div style="color:red">
      お探しのキーワードのものはありませんでした。
    </div>
    <a href="index.php">トップページに戻る</a>
  </span>
  <?php require("../add/parts/footer.php"); ?>