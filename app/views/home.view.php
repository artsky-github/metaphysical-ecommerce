<?php require 'partials/session.php' ?>
<?php require 'partials/head.php' ?>
<?php require 'components/navbar.php' ?>

<span class="ps-4 store-font d-block text-center mt-4" style="font-size: 46pt;">Hello,<?= $_SESSION["user"]["fname"] ?></span>
<span class="ps-4 store-font d-block" style="font-size: 45pt;">
  Popular
</span>
<hr class="w-100 ms-4 me-4 border-black border-2">
<div
        class="d-flex flex-wrap justify-content-center pt-5 gap-5 pb-5"
      >
      <?php
foreach($products["popular"] as $item){
    require('components/products.php');
}
?>
    </div>

    
    <span class="ps-4 store-font" style="font-size: 45pt;">
  Recommended
</span>
<hr class="w-100 ms-4 me-4 border-black border-2">
<div
        class="d-flex flex-wrap justify-content-center pt-5 gap-5 pb-5"
      >
<?php
foreach($products["recommended"] as $item){
    require('components/products.php');
}
?>
    </div>

 <?php require 'components/flash.php' ?>

<script src="public/js/cart.js"></script>
<?php require 'partials/closing.php' ?>