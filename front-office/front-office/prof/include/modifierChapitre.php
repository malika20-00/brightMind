<?php
require_once '../class/Prof.class.php';
 $id=$_POST['idChapitreModdifier'];
$titre=$_POST['titre'];

$prof = new Prof();
$idCours=$prof->getCoursByChapitre($id)[0];
 $prof->modifierChapitre($id,$titre);
 header("Location: ../../teacher-courses-details.php?cours=".$idCours); 


?>