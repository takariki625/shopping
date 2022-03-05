<?php require("../add/parts/header.php"); ?>
      <ul id="goodscontents">
        <?php foreach($goodsList as $goods): ?>
          <li data-id="<?= $goods["id"]; ?>">
            <div class="image">
              <span class="favoriteFalse" <?= $goods["is_done"]?"checked":""?>>☆</span>
              <img src="../img/<?= $goods["img"]; ?>.png" class="img" name="<?= $goods["img"]; ?>">
            </div>
            <div>
              <?= $goods["name"]; ?>
            </div>
            <div><?= $goods["price"]; ?>円</div>
          </li>
        <?php endforeach; ?>
      </ul>
<?php require("../add/parts/footer.php"); ?>