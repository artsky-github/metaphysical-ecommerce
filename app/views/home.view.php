<?php require 'partials/session.php' ?>
<?php require 'partials/head.php' ?>
<?php require 'components/navbar.php' ?>
  
<h1>Hello,<?= $_SESSION["user"]["fname"] ?></h1>
<h1>
  Popular
</h1>
<?php
foreach($products["popular"] as $item){
    require('components/products.php');
}
?>
<h1>Recommended</h1>
<?php
foreach($products["recommended"] as $item){
    require('components/products.php');
}
?>
 <?php require 'components/flash.php' ?>

<script src="public/js/cart.js"></script>
<?php require 'partials/closing.php' ?>