<?php require("../add/parts/header.php"); ?>
  <form>
    <input type="text" placeholder="キーワード検索"><!-------------------------------------------------------><input type="submit" value="🔎">
  </form>
  <ul id="contents">
    <li><img src="../img/star.png"></a><br>お気に入り</li>
    <li><img src="../img/toggle.png"></a><br>閲覧履歴</li>
    <li><img src="../img/purchase.png"></a><br>購入履歴</li>
  </ul>
  <ul id="goodscontents">
    <?php foreach($goodsList as $goods): ?>
      <li data-id="<?= $goods["id"]; ?>">
        <div class="image">
          <img src="../img/<?= $goods["img"]; ?>.png" class="img" name="<?= $goods["img"]; ?>" value="<?= $goods["img"]; ?>">
        </div>
        <div>
          <?= $goods["name"]; ?>
        </div>
        <div><?= $goods["price"]; ?>円</div>
      </li>
    <?php endforeach; ?>
  </ul>
<?php require("../add/parts/footer.php"); ?>