<?php
require_once 'autoloadAdmin.php';
if(!empty($_POST['idInstructorSupprime'])){
 $id=$_POST['idInstructorSupprime'];
 echo $id;
$admin = new Admin();
$admin->supprimerBeTeacher($id);
header("Location: ../../learnplus-v4.4.0/dist/listInstructors.php"); 

}
?>