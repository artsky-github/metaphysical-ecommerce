<?php

if(!isset($_SESSION)){
    session_start();
} 
if($_SESSION["user"] == null){
    redirect('login');
}
?>