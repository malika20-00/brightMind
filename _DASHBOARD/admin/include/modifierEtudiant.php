<?php
require_once 'autoloadAdmin.php';
if (!empty($_POST)) {

    $email = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['email']))));
    $id = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['id']))));


    $admin = new Admin();
    print_r( $_POST['subject']);
    if(!empty($_POST['subject'])){
        $admin->supprimerAffectation($id);
        foreach($_POST['subject'] as $selected){
            echo $selected;
            $admin->modifierAffectation($id, $selected);
            
        }
    }
    // $subject = implode(',',$_POST['subject']);
    // $admin->modifierAffectation($id, $subject);

    // $size = $admin->afficherNombreMatieres();
   
    // // for ($i = 0; $i < $size; $i++) {

        
        
    // //       $admin->modifierAffectation($id, $_POST['subject' . $i]);
        
    // // }
   
    // $errors = $admin->modifierEtudiant($id,$email);
    
    
    // echo json_encode($errors);
}
