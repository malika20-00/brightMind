<?php
require_once '../class/Prof.class.php';
 $id=$_POST['idCoursSupprime'];
 $idClass=$_POST['idClass'];
 echo $_POST['idCoursSupprime'];
$prof = new Prof();
$prof->supprimerCours($id);
header("Location: ../../teacher-courses.php?class=".$idClass); 


?>