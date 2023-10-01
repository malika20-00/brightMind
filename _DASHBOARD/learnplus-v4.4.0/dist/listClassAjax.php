<?php if (!empty($_GET)) {
     require_once '../../admin/include/autoloadAdmin.php';
    session_start();
    $class = $_GET['classAjax'];
    $prof=new CRUDStudent();
   $res='';

	foreach( $prof->classOfStudent($class) as $student){
        $res=$res.' <tr>
            
        <td>
            '. $student['prenom'].'
        </td>
        <td>'.$student['nom'].'</td>
        <td>'.$student['niveauScolaire'].'
        </td>
        <td >
       '.$student['email'].'</td>
    </tr>';

} 
echo $res;
} ?>

