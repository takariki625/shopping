<?php require("parts/header.php"); ?>
    <ul id="goodscontents">
      <?php foreach($goodsList as $goods): ?>
        <li data-id="<?= $goods["id"]; ?>">
          <div class="image">
            <img src="../../img/<?= $goods["img"]; ?>.png" class="img" name="<?= $goods["img"]; ?>" value="<?= $goods["img"]; ?>">
          </div>
          <div>
            <?= $goods["name"]; ?>
          </div>
          <div><?= $goods["price"]; ?>円</div>
        </li>
      <?php endforeach; ?>
    </ul>
<?php require("parts/footer.php"); ?>