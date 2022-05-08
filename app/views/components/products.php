    <div class="card shadow" id=<?=$item['id']?> style="width: 300px">
      <div id="sku-<?=$item['id']?>" class="visually-hidden"> <?=$item['sku']?> </div>
      <img
        class="card-img-top border-bottom"
        src="<?=$item["image"] ?>"
        alt="product-amethyst" height=330
      />
      <div class="card-body border-bottom">
        <h5 id="name-<?=$item["id"] ?>"><?= $item['name']?></h5>
        <div class="row">
          <div class="col">
            <span class="card-text"><?= $item["category"] ?></span>
          </div>
          <div class="col text-end">
            <span id="price-<?=$item["id"] ?>"class="card-text" class="card-text">$<?= $item['price']?></span>
          </div>
        </div>
      </div>
      <div class="card-body border-bottom" style="height: 100px; overflow-y: auto">
          <p class="card-text" id="description-<?=$item["id"] ?>">
          <?= $item['description']?>
          </p>
      </div>
      <div class="card-body d-flex justify-content-center">
        <button id="max-<?=$item["total_quantity"] ?>"type="button" class="btn btn-primary" onclick="addToCart(event)">Add to Cart</button>
      </div>
    </div>

