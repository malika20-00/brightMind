<?php
require_once 'autoloadAdmin.php';
if (!empty($_POST)) {

    $email = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['email']))));
    $id = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['id']))));


    $admin = new Admin();

  
   
    $errors = $admin->modifierAdmin($id,$email);
    
    
    echo json_encode($errors);
}
