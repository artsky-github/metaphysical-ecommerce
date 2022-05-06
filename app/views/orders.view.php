<?php require 'partials/session.php' ?>
<?php require 'partials/head.php' ?>

<?php require 'components/mini.php' ?>

<?php 

foreach($all_orders as $order){
    require 'components/orders_card.php';
}
?>

<?php require 'partials/closing.php' ?>