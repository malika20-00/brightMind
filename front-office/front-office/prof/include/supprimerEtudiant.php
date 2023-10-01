<?php
require_once '../class/Prof.class.php';
 $id=$_POST['idEtudiantSupprime'];
 $idClass=$_POST['idClass'];
 echo $_POST['idEtudiantSupprime'];
$prof = new Prof();
$prof->supprimerEtudiant($id,$idClass);
header("Location: ../../studentlist.php?class=".$idClass); 


?>