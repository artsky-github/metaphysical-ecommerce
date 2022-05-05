<?php require 'partials/head.php' ?>
<?php require 'components/navbar.php' ?>
<?php
foreach($products as $item){
    require('components/products.php');
}
?>
 <script src="public/js/cart.js"></script>
<?php require 'partials/closing.php' ?>