<?php
require_once '../class/Prof.class.php';
 $id=$_POST['idChapitreSupprime'];


$prof = new Prof();
$idCours=$prof->getCoursByChapitre($id)[0];
$prof->supprimerChapitre($id);

header("Location: ../../teacher-courses-details.php?cours=".$idCours); 


?>