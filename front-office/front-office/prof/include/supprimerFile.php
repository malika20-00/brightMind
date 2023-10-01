<?php
require_once '../class/Prof.class.php';
 $id=$_POST['idFileSupprime'];
$prof = new Prof();
$prof->supprimerFile($id);
echo json_encode($id);

?>