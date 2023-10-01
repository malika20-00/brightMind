<?php

require_once '../class/Prof.class.php';

if (!empty($_POST)) {

    $nom = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['nom']))));
    $email = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['email']))));
    $message = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['message']))));
  $phone=htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['phone']))));
    $errors = array();
    if (empty($nom)) {
        $errors['nomVide'] = "please fill the name field";
    }
   

    if (empty($email)) {
        $errors['emailVide'] = "please fill the email field";
    }
    if (empty($message)) {
        $errors['messageVide'] = "please fill the message field";
    }
 
    if (empty($errors)) {
        if (empty($phone)) {
            $phone='';
        }
      
        $prof = new Prof();
        $prof->Contact($nom, $email, $message, $phone);
        $errors = null;
    }

     echo json_encode($errors);
 }
