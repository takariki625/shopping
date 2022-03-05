<?php require("../add/parts/header.php"); ?>
      <ul id="goodscontents">
        <?php foreach($goodsList as $goods): ?>
          <li data-id="<?= $goods["id"]; ?>">
            <div class="image">
              <?php if($goods["is_done"]): ?>
                <span class="tf">★</span>
              <?php else: ?>
                  <span class="ff">☆</span>
              <?php endif; ?>
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