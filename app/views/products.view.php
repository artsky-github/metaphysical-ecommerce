<?php require 'partials/head.php' ?>
<?php require 'components/navbar.php' ?>
<div
        class="d-flex flex-wrap justify-content-center pt-5 gap-5 pb-5"
      >
<?php

foreach($products as $item){
    require('components/products.php');
}
?>
</div>
 <script src="public/js/cart.js"></script>
<?php require 'partials/closing.php' ?>