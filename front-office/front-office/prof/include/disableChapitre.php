<?php
require_once '../class/Prof.class.php';
if (!empty($_POST)) {
    $prof = new Prof();
 $id=$_POST['idChapitreDisable'];
 echo $id;
 $idCours=$prof->getCoursByChapitre($id)[0];

$prof->disableChapitre($id);
header("Location: ../../teacher-courses-details.php?cours=".$idCours); 

}
?>