<?php



    require_once '../class/Prof.class.php';
    if (!empty($_POST)) {
        //????changer
      
       
        $errors = array();
        $titre = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['titre']))));
        $description = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['description']))));
        $contenu = $_POST['editor'];
        $idCours=htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['idCours']))));
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
                    $tailleMax =  1709000178;
                   
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
            for ($i = 1; $i < count($_FILES) + 1; $i++) {
                $nom = 'file' . $i;
                if (isset($_FILES[$nom]) and !empty($_FILES[$nom]['name'])) {
                    $extensionUpload = strtolower(substr(strrchr($_FILES[$nom]['name'], '.'), 1));
                    //chemin
                    $files = glob("files/*");
                    if($files){
                        $lastElement  = $files[array_key_last($files)];
                        $dernierFile=explode('.',explode('/',$lastElement)[1])[0];
                        $fileActuele=$dernierFile+1;
                        $chemin = "files/" .$fileActuele. '.' . $extensionUpload;
                        $nomFiles[$i]=$fileActuele. '.' . $extensionUpload;
                    }
                    else{
                        $chemin = "files/1." . $extensionUpload;
                        $nomFiles[$i]='1.'. $extensionUpload;
                    }
                   

                  
                    $resultat = move_uploaded_file($_FILES[$nom]['tmp_name'], $chemin);
                    if (!$resultat) {
                        $errors[$nom] = "Error while importing your file";
                       
                    }
                }
            }
        }

        if (empty($errors)) {
         
            $prof = new Prof();
           $prof->modifierCours($titre,$idCours,$description,$contenu);
           $prof->modifierFilesByCours($nomFiles,$idCours);
       

           $errors=null;
        }
        echo json_encode($errors);
    }
    $idClass=$prof->getClassNameByCours($idCours)[0];
    header("Location: ../../teacher-courses.php?class=".$idClass); 
   
