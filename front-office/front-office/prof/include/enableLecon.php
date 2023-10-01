<?php
require_once '../class/Prof.class.php';
if (!empty($_POST)) {
    $prof = new Prof();
 $id=$_POST['idLeconEnable'];

 $idCours=$prof->getCoursByLecon($id)[0];

$prof->enableLecon($id);
header("Location: ../../teacher-courses-details.php?cours=".$idCours); 

}
?>