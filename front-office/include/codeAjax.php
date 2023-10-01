<?php

require_once 'autoloadEtudiant.php';
if (!empty($_POST)) {
    $email = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['email']))));
    $code = $_POST['code'];
    $oubliePw = new OubliePw($email);

    $oubliePw->verifierCode($code);



    $errors = $oubliePw->errors;
    $errors['email'] = $email;
    echo json_encode($errors);
}
