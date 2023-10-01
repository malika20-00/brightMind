<?php

require_once 'autoloadEtudiant.php';
if (!empty($_POST)) {
    $email = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['email']))));
    $pw = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['pw']))));
    $pwVerif = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['pwVerif']))));

    $oubliePw = new OubliePw($email);

    $oubliePw->updatePw($pw, $pwVerif);



    $errors = $oubliePw->errors;

    echo json_encode($errors);
}
