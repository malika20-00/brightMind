<?php
require_once '../class/Prof.class.php';
if (!empty($_POST)) {
 $id=$_POST['idCoursEnable'];
 $idClass=$_POST['idClass'];
$prof = new Prof();
echo $prof->enableCours($id);
header("Location: ../../teacher-courses.php?class=".$idClass); 

}
?>