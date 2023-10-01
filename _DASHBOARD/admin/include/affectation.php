<?php
if (!empty($_POST['subject'])) {
    require_once '../include/autoloadAdmin.php';
    $admin = new Admin();

    // $size = $admin->afficherNombreMatieres();
    foreach($_POST['subject'] as $selected){
        $admin->affecterEtudiant($_POST['idEtudiant'],$selected);
    }
    $admin->accepterEtudiant($_POST['idEtudiant']);
    header('location:../../learnplus-v4.4.0/dist/listeEtudiant.php');

}