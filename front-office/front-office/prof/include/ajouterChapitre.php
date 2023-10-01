<?php
if (!empty($_POST)) {
    require_once '../class/Prof.class.php';
    $titre = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['titreChapitre']))));
    $idCours= htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['idCours']))));
    if (!empty($titre)) {
        $prof = new Prof();
        $prof->ajouterChapitre($idCours,$titre);
       
    }
}
header("Location: ../../teacher-courses-details.php?cours=".$idCours);
?>