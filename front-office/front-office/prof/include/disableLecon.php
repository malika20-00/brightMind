<?php
require_once '../class/Prof.class.php';
if (!empty($_POST)) {
    $prof = new Prof();
 $id=$_POST['idLeconDisable'];

 $idCours=$prof->getCoursByLecon($id)[0];

$prof->disableLecon($id);
header("Location: ../../teacher-courses-details.php?cours=".$idCours); 

}
?>