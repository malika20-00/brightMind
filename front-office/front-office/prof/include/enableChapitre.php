<?php
require_once '../class/Prof.class.php';
if (!empty($_POST)) {
    $prof = new Prof();
 $id=$_POST['idChapitreEnable'];
 echo $id;
 $idCours=$prof->getCoursByChapitre($id)[0];

echo $prof->enableChapitre($id);
header("Location: ../../teacher-courses-details.php?cours=".$idCours); 

}
?>