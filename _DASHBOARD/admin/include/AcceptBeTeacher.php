<?php
session_start();
require_once 'autoloadAdmin.php';
if(!empty($_POST['idInstructorAccept'])){
 $id=$_POST['idInstructorAccept'];
 $idAdmin=$_SESSION['id'];
$admin = new Admin();
$admin->accepterBeTeacher($id,$idAdmin);
header("Location: ../../learnplus-v4.4.0/dist/listInstructors.php"); 

}
?>