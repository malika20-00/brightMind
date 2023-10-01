<?php


if (!empty($_POST)) {
    require_once '../class/Prof.class.php';
 
        $prof = new Prof();
        //????changer
      
       
        $errors = array();
        $titre = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['titre']))));
        $description = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['description']))));
        $contenu = $_POST['editor'];
        $idChapitre=htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['idChapitre']))));
        if (empty($titre)) {
            $errors['titreVide'] = "please fill the title field";
           
        }
        if (empty($description)) {
            $errors['descriptionVide'] = "please fill the description field";
          
        }

        else {

            for ($i = 1; $i < count($_FILES) + 1; $i++) {
                $nom = 'file' . $i;
                if (isset($_FILES[$nom]) and !empty($_FILES[$nom]['name'])) {
                   
                    $tailleMax = 1073741824 ;
                    $extensionsValides = array('pdf','mp4','m4v','mov','qt','avi','flv','wmv','asf','mpg','mpeg','dat');
                    if ($_FILES[$nom]['size'] > $tailleMax) {

                        $errors[$nom] = 'Your file must not exceed 20MB';
                       
                    }
                    else{
                        $extensionUpload = strtolower(substr(strrchr($_FILES[$nom]['name'], '.'), 1));
                        if(!in_array($extensionUpload, $extensionsValides)) {
                            $errors[$nom] = 'Your file must be in the format of a pdf or a video';
                    }
                }
            }
        }
    }
   
        $nomFiles = array();
        if (empty($errors)) {
            $dernierFile;
            if( $prof->lastFile()){
                       
                $lastElement= $prof->lastFile()[0];
                 $dernierFile=explode('.',$lastElement)[0];
                 
                
                 
             }
             else{
                $dernierFile=0;
             }
            for ($i = 1; $i < count($_FILES) + 1; $i++) {
                $nom = 'file' . $i;
                if (isset($_FILES[$nom]) and !empty($_FILES[$nom]['name'])) {
                    $extensionUpload = strtolower(substr(strrchr($_FILES[$nom]['name'], '.'), 1));
                    //chemin
                  
                    $fileActuele=$dernierFile+$i;
                    $chemin = "files/" .$fileActuele. '.' . $extensionUpload;
                    $nomFiles[$i]=$fileActuele. '.' . $extensionUpload;
                    $resultat = move_uploaded_file($_FILES[$nom]['tmp_name'], $chemin);
                    if (!$resultat) {
                        $errors[$nom] = "Error while importing your file";
                       
                    }
                }
            }
        }

        if (empty($errors)) {
         
         
           $prof->ajouterLesson($titre,$idChapitre,$description,$contenu);
           $prof->ajouterFilesByLecon($nomFiles);
       

           $errors=null;
        }
    
    //echo json_encode($errors);
}
$idCours=$prof->getCoursByChapitre($idChapitre)[0];
header("Location: ../../teacher-courses-details.php?cours=".$idCours); 
