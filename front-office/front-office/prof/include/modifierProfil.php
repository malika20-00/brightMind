<?php
require_once '../class/Prof.class.php';

// $id=$_POST['idCommentModifier'];
// echo $id;
// $comment=$_POST['commentContenu'];
// $idClass=$_POST['idClass'];
// $idCours=$_POST['idCours'];
// echo $idCours;

// $prof = new Prof();
// $prof->modifierComment($id,$comment);

// header("Location: ../../course-content.php?class=".$idClass."&cours=".$idCours); 

if (!empty($_POST)) {


    session_start();
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $oldPassword=$_POST['oldPassword'];
    $newPassword=$_POST['newPassword'];

    $errors = array();
    $prof=new Prof();
    $id=$_SESSION['id'];
    $profActuel=$prof->getProf($id);
  

    if (empty($prenom)) {
        $errors['prenomVide'] = "please fill the first name field";
      
    }
    if (empty($nom)) {
        $errors['nomVide'] = "please fill the last name field";
      
    }
    if (empty($email)) {
        $errors['emailVide'] = "please fill the email name field";
      
    }
    $password=$profActuel['pw'];
    if(!empty($oldPassword)){
      
        if(!password_verify($oldPassword,$password) ){
            $errors['oldPasswordIncorrect'] = "old password incorrect";
           
        }
    }
    if (!empty($newPassword)) {
        if (empty($oldPassword)) {
            $errors['oldPasswordVide'] = "please fill the old password field";
          
        }
      
    }
    if (empty($errors)) {
        if (empty($newPassword)) {
            $prof->modifierProfilSansPw($id,$nom,$prenom,$email);
        }

        else{
            $prof->modifierProfil($id,$nom,$prenom,$email,$newPassword);
        }
    
     
     

       $errors=null;
    }
    echo json_encode($errors);
    //header("Location: ../../classes.php");
   

   

}

?>