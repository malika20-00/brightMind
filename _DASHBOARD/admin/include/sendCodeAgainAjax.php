<?php

require_once 'autoloadAdmin.php';

    $email = htmlspecialchars(strip_tags(trim(mb_strtolower($_GET['email']))));
    $oubliePw = new OubliePw($email);
 
    $oubliePw->mainFunction();
   
    
    
  $errors=array();

    echo json_encode($errors);

