    <div class="card shadow" id=<?=$item['id']?> style="width: 300px">
      <div id="sku-<?=$item['id']?>" class="visually-hidden"> <?=$item['sku']?> </div>
      <img
        class="card-img-top border-bottom"
        src="https://i.picsum.photos/id/254/200/200.jpg?hmac=wM9u9N0tgdWKFIr8MxBLr8rLoV0JjUUKLk32XFV8agQ"
        alt="product-amethyst"
      />
      <div class="card-body border-bottom">
        <a
          data-bs-toggle="collapse"
          href="#collapsableContent-<?=$item["id"] ?>"
          style="text-decoration: none"
        >
          <h5 id="name-<?=$item["id"] ?>"><?= $item['name']?></h5>
        </a>
        <p id="price-<?=$item["id"] ?>"class="card-text">$<?= $item['price']?></p>
      </div>
      <div class="collapse" id="collapsableContent-<?=$item["id"] ?>">
        <div class="card-body border-bottom">
          <p class="card-text" id="description-<?=$item["id"] ?>">
          <?= $item['description']?>
          </p>
        </div>
      </div>
      <div class="card-body d-flex justify-content-center">
        <button type="button" class="btn btn-primary" onclick="addToCart(event)">Add to Cart</button>
      </div>
    </div>
