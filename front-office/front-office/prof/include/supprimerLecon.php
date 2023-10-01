<?php
require_once '../class/Prof.class.php';
 $id=$_POST['idLeconSupprime'];


$prof = new Prof();
 $idCours=$prof->getCoursByLecon($id)[0];
$prof->supprimerLecon($id);

header("Location: ../../teacher-courses-details.php?cours=".$idCours); 


?>