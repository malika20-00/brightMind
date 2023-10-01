<?php
require_once '../class/Prof.class.php';

$id=$_POST['idCommentModifier'];
echo $id;
$comment=$_POST['commentContenu'];
$idClass=$_POST['idClass'];
$idCours=$_POST['idCours'];
$prof = new Prof();
$prof->modifierComment($id,$comment);

if (!empty($_POST['student'])) {
    header("Location: ../../student-course.php?idClass=".$idClass."&idCours=".$idCours); 
}
else{
header("Location: ../../course-content.php?class=".$idClass."&cours=".$idCours); 
}
?>