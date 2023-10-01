<?php
 require_once 'autoloadEtudiant.php';

if (!empty($_POST)) {
  
    
    $nom = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['nom']))));
    $prenom = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['prenom']))));
    $niveauScolaire = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['niveauScolaire']))));
    $email = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['email']))));
    $tel = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['tel']))));
    $password = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['pw']))));
    $passwordConf = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['pwVerif']))));


    $signUpClass = new SignUp($nom,$prenom,$email,  $niveauScolaire,$tel ,$password , $passwordConf);
   
    $signUpClass->isEmailExist();
    $signUpClass->sendEmailToAdmin();
    $signUpClass->createUser();
  
    $errors = $signUpClass->errors;

    



    echo json_encode($errors);

}