<?php
if (!empty($_POST)) {
    session_start();
    require_once '../class/Prof.class.php';
 
        $prof = new Prof();
        
        $comment=$_POST['comment'];
    
        $idClass=$_POST['idClass'];
        $idCours=$_POST['idCours'];
        $datenow=new DateTime();
        $date=$datenow->format('Y-m-d H:i:s');
        if (!empty($comment)) {
      

        if (!empty($_POST['student'])) {
            $idEtudiant=$_SESSION['id'];
            $prof->addCommentStudent($comment,$idCours,$date,$idEtudiant);
            header("Location: ../../student-course.php?idClass=".$idClass."&idCours=".$idCours); 
          
        }
        else{
            $prof->addComment($comment,$idCours,$date);
            header("Location: ../../course-content.php?class=".$idClass."&cours=".$idCours); 
       
        }
      
}
else{
    if (!empty($_POST['student'])) {
      
        header("Location: ../../student-course.php?idClass=".$idClass."&idCours=".$idCours); 
      
    }
    else{
      
        header("Location: ../../course-content.php?class=".$idClass."&cours=".$idCours); 
   
    }

}
}


?>