<?php
require_once 'autoloadEtudiant.php';

if (!empty($_POST)) {


    $nom = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['nom']))));
    $prenom = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['prenom']))));
    $email = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['email']))));
    $cin = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['cin']))));
    $tel = htmlspecialchars($_POST['tel']);
    
    $niveauScolaire = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['niveauScolaire']))));
    $password = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['pw']))));
    $passwordConf = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['pwVerif']))));

    $profil = new Profil($nom, $prenom, $email, $niveauScolaire,  $password, $passwordConf);




    if ($profil->errors == null) {
        $profil->updateNom($nom);
        $profil->updatePrenom($prenom);
        $profil->updateCin($cin);
        $profil->updateNiveauScolaire($niveauScolaire);
        $profil->updateTel($tel);
        $profil->updatePw($password, $passwordConf);
        $profil->updateEmail($email);
    }
    $errors = $profil->errors;

    echo json_encode($errors);
}
