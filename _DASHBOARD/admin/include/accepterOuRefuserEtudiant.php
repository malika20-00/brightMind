<?php
require 'autoloadAdmin.php';

    
    require_once '../class/CRUDStudent.class.php';
    $admin = new CRUDStudent();
    $admin->deleteStudent($_GET['id']);
    header('location:../../learnplus-v4.4.0/dist/listeEtudiant.php');

