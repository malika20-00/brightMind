<?php 
if(!isset($_SESSION)){
    session_start();
}
session_destroy();
header('location:../../learnplus-v4.4.0/dist/guest-login.php');