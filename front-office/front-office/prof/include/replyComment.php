<?php
session_start();
require_once '../class/Prof.class.php';

$id=$_POST['idCommentReply'];
$comment=$_POST['replyContenu'];
$idClass=$_POST['idClass'];
$idCours=$_POST['idCours'];
$datenow=new DateTime();
$date=$datenow->format('Y-m-d H:i:s');
$prof = new Prof();

$idEtudiant=$_SESSION['id'];

if (!empty($_POST['student'])) {
    $prof->replyCommentStudent($id,$comment,$idCours,$date,$idEtudiant);
    header("Location: ../../student-course.php?idClass=".$idClass."&idCours=".$idCours); 
}
else{
    $prof->replyComment($id,$comment,$idCours,$date);
header("Location: ../../course-content.php?class=".$idClass."&cours=".$idCours); 
}
?>