<?php

require_once 'autoloadAdmin.php';
if (!empty($_POST)) {
    $email = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['email']))));
    
    $oubliePw = new OubliePw($email);
 
    $oubliePw->mainFunction();
   
    
    
     $errors = $oubliePw->errors;
     $errors['email'] = $email;
    echo json_encode($errors);
}
