<?php

session_start();
if($_SESSION["user"] == null){
    redirect('login');
}
?>