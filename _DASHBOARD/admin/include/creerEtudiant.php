<?php
session_start();
require_once 'autoloadAdmin.php';

if (!empty($_POST)) {


    $nom = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['nom']))));
    $prenom = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['prenom']))));
    $email = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['email']))));
    $password = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['pw']))));
    $passwordConf = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['pwVerif']))));
    $cin = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['cin']))));
    $tel = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['tel']))));
    $niveauScolaire = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['niveauScolaire']))));




    $createEtudiant = new creerEtudiant($nom, $prenom, $email, $password, $passwordConf, $cin, $tel, $niveauScolaire);

    $createEtudiant->isEmailExist();
    $createEtudiant->sendEmailToEtudiant();
    $createEtudiant->createEtudiant();

    $errors = $createEtudiant->errors;

    if (empty($errors)) {
        $admin = new Admin();
        $CRUDStudent = new CRUDStudent();
        $Etudiant = $CRUDStudent->readStudentByEmail($email);
        $idEtudiant = $Etudiant['id'];
        $size = $admin->afficherNombreMatieres();

        for ($i = 0; $i < $size; $i++) {

            if ($_POST['subject' . $i] != "") {
                 
                $admin->affecterEtudiant($idEtudiant, $_POST['subject' . $i]);
            }
        }
    }



    echo json_encode($errors);
}
