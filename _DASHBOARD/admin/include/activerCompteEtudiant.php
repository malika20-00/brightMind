<?php
require 'autoloadAdmin.php';
$admin  = new Admin();
if ($_GET['status'] == 0) {
   
    $admin->desactiverCompteEtudiant($_GET['id']);
} else {
    $admin->activerCompteEtudiant($_GET['id']);
}
header('location:../../learnplus-v4.4.0/dist/studentlist.php');
