<?php
require_once '../class/Prof.class.php';
if (!empty($_POST)) {
 $id=$_POST['idCoursDisable'];
 $idClass=$_POST['idClass'];
$prof = new Prof();
$prof->disableCours($id);
header("Location: ../../teacher-courses.php?class=".$idClass); 

}
?>