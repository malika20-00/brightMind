<?php
require_once '../../../../fichierCommun/db.class.php';

class Prof extends dbConnection
{
    public function __construct()
    {
        parent::PDOConnection();
    }

    public function yourClass($idProf)
    {
        $sql = "select * from class where idProf =" . $idProf . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function supprimerCours($id)
    {
        $idChapitres = array();
        $idLecons = array();
        $i = $j = 0;
        $sql  = "select * from chapitre where idCours=" . $id . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($res as $chapitre) {
            $idChapitres[$i] = $chapitre['id'];
            $i++;
        }
        foreach ($idChapitres as $chapitre) {
            $sql  = "select * from lecon where idChapitre=" . $chapitre . "";
            $res = $this->dbc->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($res as $lecon) {
                $idLecons[$j] = $lecon['id'];
                $j++;
            }
        }
        //file
        foreach ($idLecons as $lecon) {
            $sql  = "delete from file where idLecon=" . $lecon . "";
            $this->dbc->query($sql);
        }
        foreach ($idChapitres as $chapitre) {
            $sql  = "delete from file where idChapitre=" . $chapitre . "";
            $this->dbc->query($sql);
        }
        $sql  = "delete from file where idCours=" . $id . "";
        $this->dbc->query($sql);
        //commentaire
        $sql  = "delete from commentaire where idCours=" . $id . "";
        $this->dbc->query($sql);
        //lecon
        foreach ($idLecons as $lecon) {
            $sql  = "delete from lecon where id=" . $lecon . "";
            $this->dbc->query($sql);
        }
        //chapitre


        $sql  = "delete from chapitre where idCours=" . $id . "";
        $this->dbc->query($sql);
        $sql  = "delete from cours where id=" . $id . "";
        $this->dbc->query($sql);
    }

    public function supprimerChapitre($id){
        $sql  = "delete from file where idChapitre=" . $id . "";
        $this->dbc->query($sql);
            $sql  = "delete from lecon where idChapitre=" . $id . "";
            $this->dbc->query($sql);
            $sql  = "delete from chapitre where id=" . $id . "";
            $this->dbc->query($sql);

    }

    public function nombreEtudiants($idClass)
    {
        $sql = "select * from affectation where idClass=" . $idClass . "";
        $res = $this->dbc->query($sql);
        return $res->rowCount();
    }

    public function GetCoursByClass($idClass)
    {
        $sql = "select * from cours where idClass =" . $idClass . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }
   

    public function GetClass($id)
    {
        $sql = "select * from class where id =" . $id . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }
    public function GetChapitre($id)
    {
        $sql = "select * from chapitre where id =" . $id . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function GetChapitreByCours($idCours)
    {
        $sql = "select * from chapitre where idCours =" . $idCours . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res;
    }

    public function getChapitreByLecon($idLecon){
        $sql = "select idChapitre from lecon where id=".$idLecon."";
        $res = $this->dbc->query($sql);
        foreach($res as $cours)
        {
            return $cours;
        }
    }

    public function GetLeconByChapitre($idChapitre)
    {
        $sql = "select * from lecon where idChapitre =" . $idChapitre . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res;
    }

    public function getCours()
    {
        $sql = "select * from cours ";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }
    public function getCoursById($id)
    {
        $sql = "select * from cours where id =" . $id . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($res as $cours) {
            return $cours;
        }
    }

    public function getLecon($id)
    {
        $sql = "select * from lecon where id =" . $id . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($res as $lecon) {
            return $lecon;
        }
    }

    public function disableCours($id)
    {
        $statement = $this->dbc->prepare("update cours set enable = :enable where id =:id");
        $statement->execute([

            "enable" => false,
            "id" => $id,
        ]);
    }
    public function enableCours($id)
    {
        $statement = $this->dbc->prepare("update cours set enable = :enable where id =:id");
        return    $statement->execute([

            "enable" => true,
            "id" => $id,
        ]);
    }
    // public function getChapitre()
    // {
    // $sql = "select * from chapitre ";
    //     $res = $this->dbc->query($sql);
    //     $res->setFetchMode(PDO::FETCH_ASSOC);

    //     return $res;
    // }
    // public function getLeçon()
    // {
    //     $sql = "select * from lecon ";
    //     $res = $this->dbc->query($sql);
    //     $res->setFetchMode(PDO::FETCH_ASSOC);

    //     return $res;  
    // }

    public function ajouterMeet($datedebut, $description, $lien, $idClass)
    {
        $statement = $this->dbc->prepare("INSERT INTO meet(datedebut,description,lien,idClass)VALUES(:datedebut,:description,:lien,:idClass)");
        $statement->execute([
            "datedebut" => $datedebut,
            "description" => $description,
            "lien" => $lien,
            "idClass" => $idClass,
        ]);
    }

    public function ajouterCommentaire($contenu, $date, $idCommentParent, $idCours, $idEtudiant)
    {
        $statement = $this->dbc->prepare("INSERT INTO commentaire(contenu,idCommentParent,idEtudiant,idCours,date)VALUES(:contenu,:idCommentParent,:idEtudiant,:idCours,:date)");
        $statement->execute([
            "contenu" => $contenu,
            "idCommentParent" => $idCommentParent,
            "idEtudiant" => $idEtudiant,
            "idCours" => $idCours,
            "date" => $date,
        ]);
    }

    public function replyComment($id,$comment,$idCours,$date){
        $statement = $this->dbc->prepare("INSERT INTO commentaire(contenu,idCommentParent,idCours,date)VALUES(:contenu,:idCommentParent,:idCours,:date)");
        $statement->execute([
            "contenu" => $comment,
            "idCommentParent" => $id,
            "idCours" => $idCours,
            "date" => $date,
        ]);
    }

    public function replyCommentStudent($id,$comment,$idCours,$date,$idEtudiant){
        $statement = $this->dbc->prepare("INSERT INTO commentaire(contenu,idCommentParent,idCours,date,idEtudiant)VALUES(:contenu,:idCommentParent,:idCours,:date,:idEtudiant)");
        $statement->execute([
            "contenu" => $comment,
            "idCommentParent" => $id,
            "idCours" => $idCours,
            "date" => $date,
            "idEtudiant" => $idEtudiant,
        ]);
    }

    public function ajouterCommentaireProf($contenu, $date, $idCommentParent, $idCours)
    {
        $statement = $this->dbc->prepare("INSERT INTO commentaire(contenu,idCommentParent,idCours,date)VALUES(:contenu,:idCommentParent,:idCours,:date)");
        $statement->execute([
            "contenu" => $contenu,
            "idCommentParent" => $idCommentParent,
            "idCours" => $idCours,
            "date" => $date,
        ]);
    }
    public function comment_child($idComment)
    {
        $sql = "select * from commentaire where idCommentParent=" . $idComment . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function commentaires_sans_parent($idCours)
    {
        $sql = "select * from commentaire where idCommentParent IS NULL and idCours=".$idCours."";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function comment_has_child($idComment)
    {
        $sql = "select * from commentaire where idCommentParent=" . $idComment . "";
        $res = $this->dbc->query($sql);
        return $res->rowCount();
    }

    public function supprimerComment($idComment)
    {
        $nbrChild = $this->comment_has_child($idComment);
        if ($nbrChild == 0) {
            $sql  = "delete from commentaire where id=" . $idComment . "";
            $this->dbc->query($sql);
            return 0;
        } else {
            $statement = $this->dbc->prepare("update commentaire set contenu = :contenu where id =:id");
            $statement->execute([

                "contenu" => 'this message has been deleted',
                "id" => $idComment,
            ]);
            return 1;
        }
    }

    public function modifierComment($idComment, $contenu)
    {
        $statement = $this->dbc->prepare("update commentaire set contenu = :contenu where id =:id");
        $statement->execute([

            "contenu" => $contenu,
            "id" => $idComment,
        ]);
    }

    public function supprimerCommentSansFils()
    {
        $sql = "select * from commentaire where contenu ='this message has been deleted'";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($res as $comment) {
            $id = $comment['id'];
            if ($this->comment_has_child($id) == 0) {
                $sql  = "delete from commentaire where id=" . $id . "";
                $this->dbc->query($sql);
            }
        }
    }

    public function ajouterFilesByCours($files)
    {
        $idCours = $this->dbc->lastInsertId();
        foreach ($files as $file) {
            $statement = $this->dbc->prepare("INSERT INTO file(nom,idCours)VALUES(:nom,:idCours)");
            $statement->execute([
                "nom" => $file,
                "idCours" => $idCours,
            ]);
        }
    }

    public function modifierFilesByCours($nomFiles,$idCours){
        foreach ($nomFiles as $file) {
            $statement = $this->dbc->prepare("INSERT INTO file(nom,idCours)VALUES(:nom,:idCours)");
            $statement->execute([
                "nom" => $file,
                "idCours" => $idCours,
            ]);
        }
    }

    public function modifierFilesByLecon($nomFiles,$idLecon){
        foreach ($nomFiles as $file) {
            $statement = $this->dbc->prepare("INSERT INTO file(nom,idLecon)VALUES(:nom,:idLecon)");
            $statement->execute([
                "nom" => $file,
                "idLecon" => $idLecon,
            ]);
        }
    }

    public function ajouterFilesByLecon($files)
    {
        $idLecon = $this->dbc->lastInsertId();
        foreach ($files as $file) {
            $statement = $this->dbc->prepare("INSERT INTO file(nom,idLecon)VALUES(:nom,:idLecon)");
            $statement->execute([
                "nom" => $file,
                "idLecon" => $idLecon,
            ]);
        }
    }

   

    public function ajouterCours($titre, $idClass, $description, $contenu)
    {
        $statement = $this->dbc->prepare("INSERT INTO Cours(titre,idClass,description,contenu)VALUES(:titre,:idClass,:description,:contenu)");
        $statement->execute([
            "titre" => $titre,
            "idClass" => $idClass,
            "description" => $description,
            "contenu" => $contenu,
        ]);
    }

    public function ajouterLesson($titre,$idChapitre,$description,$contenu){
        $statement = $this->dbc->prepare("INSERT INTO Lecon(titre,idChapitre,description,contenu)VALUES(:titre,:idChapitre,:description,:contenu)");
        $statement->execute([
            "titre" => $titre,
            "idChapitre" => $idChapitre,
            "description" => $description,
            "contenu" => $contenu,
        ]);
    }

    public function modifierCours($titre,$idCours,$description,$contenu){
        $statement = $this->dbc->prepare("update cours set titre = :titre,description = :description,contenu = :contenu where id =:id");
        $statement->execute([

            "titre" => $titre,
            "id" => $idCours,
            "description" => $description,
            "contenu" => $contenu,
        ]);
    }

    public function modifierLecon($titre,$idLecon,$description,$contenu){
        $statement = $this->dbc->prepare("update lecon set titre = :titre,description = :description,contenu = :contenu where id =:id");
        $statement->execute([

            "titre" => $titre,
            "id" => $idLecon,
            "description" => $description,
            "contenu" => $contenu,
        ]);   
    }


    function convert_number_to_words($number)
    {

        $hyphen      = '-';
        $conjunction = '  ';
        $separator   = ' ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'Zero',
            1                   => 'One',
            2                   => 'Two',
            3                   => 'Three',
            4                   => 'Four',
            5                   => 'Five',
            6                   => 'Six',
            7                   => 'Seven',
            8                   => 'Eight',
            9                   => 'Nine',
            10                  => 'Ten',
            11                  => 'Eleven',
            12                  => 'Twelve',
            13                  => 'Thirteen',
            14                  => 'Fourteen',
            15                  => 'Fifteen',
            16                  => 'Sixteen',
            17                  => 'Seventeen',
            18                  => 'Eighteen',
            19                  => 'Nineteen',
            20                  => 'Twenty',
            30                  => 'Thirty',
            40                  => 'Fourty',
            50                  => 'Fifty',
            60                  => 'Sixty',
            70                  => 'Seventy',
            80                  => 'Eighty',
            90                  => 'Ninety',
            100                 => 'Hundred',
            1000                => 'Thousand',
            1000000             => 'Million',
            1000000000          => 'Billion',
            1000000000000       => 'Trillion',
            1000000000000000    => 'Quadrillion',
            1000000000000000000 => 'Quintillion'
        );




        if ($number < 0) {
            return $negative . $this->convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . $this->convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= $this->convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }

    public function upCommingMeets($idClass)
    {

      
        $sql = "select * from meet where idClass=" . $idClass . " order by datedebut DESC ";
        $class = parent::execQuery($sql);
        $class->setFetchMode(PDO::FETCH_ASSOC);
        return $class;
    }

    public function readFilesByIdCours($idCours)
    {
        $sql = "select * from file where idCours=" . $idCours . "";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function readFilesByIdLecon($idLecon)
    {
        $sql = "select * from file where idLecon=" . $idLecon . "";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function typeOfFile($nomFile)
    {
        $nomFileArray =   explode('.', $nomFile);

        if ($nomFileArray[1] == "pdf") {
            return "pdf";
        } else if ($nomFileArray[1] == "jpg" || $nomFileArray[1] == "jpeg" || $nomFileArray[1] == "png") {
            return "img";
        } else {
            return "video";
        }
    }

    public function supprimerFile($id)
    {
        //delete file from project
        $sql = "select * from file where id=" . $id . "";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($res as $nom) {
            $file = $nom['nom'];

         break;
        }
        $fichier = 'files/' . $file;
        if (file_exists($fichier)) {
            unlink($fichier);
        }
       
        $sql  = "delete from file where id=" . $id. "";
        $this->dbc->query($sql);
    }

    public function upCommingMeet()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
      
        $idProf = $_SESSION['id'];
        $sql = "select * from meet where idClass in (select idClass from class where idProf = " . $idProf . ") order by datedebut DESC ";
        $class = parent::execQuery($sql);
        $class->setFetchMode(PDO::FETCH_ASSOC);
        return $class;
    }

    public function getClassById($id){
        $sql="select * from class where id =".$id."";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        foreach($res as $r){
            return $r;
        }
    }

    public function dernierCommentaires()
    {
        $className = array();
        $i = 0;
        $sql = "select distinct idCours  from commentaire order by id DESC  limit 3";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($res as $r) {
            $sql = "select distinct idClass from cours where id=" . $r['idCours'] . "";
            $cours = parent::execQuery($sql);
            $cours->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($cours as $c) {
                $sql = "select * from class where id =" . $c['idClass'] . "";
                $class = parent::execQuery($sql);
                $class->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($class as $cl) {
                    if ($this->isClassOfStudent($cl['id']))
                        $className[$i] = $cl['nom'];
                    $i++;
                }
            }
        }
        return $className;
    }

    public function isClassOfStudent($idClass)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $idProf = $_SESSION['id'];
     
        $sql = "select * from class where idProf=" . $idProf . " and id= " . $idClass . "";
        $class = parent::execQuery($sql);
        $class = $class->fetchAll();

        if ($class) {

            return true;
        } else {
            return false;
        }
    }

    public function classOfStudent($idClass)
    {
        $sql = "select * from etudiant where id in ( select idEtudiant from affectation where idClass=" . $idClass . ")";
        $res = $this->dbc->query($sql);
        return $res;
    }

    public function supprimerEtudiant($idEtudiant,$idClass){
        $sql  = "delete from affectation where idEtudiant=" . $idEtudiant . " and idClass= " . $idClass . "";
        $this->dbc->query($sql);
    }

    public function getClassNameByCours($idCours){
        $sql = "select idClass from cours where id=".$idCours."";
        $res = $this->dbc->query($sql);
        foreach($res as $class)
        {
            return $class;
        }

    }

    public function getCoursByChapitre($idChapitre){
        $sql = "select idCours from chapitre where id=".$idChapitre."";
        $res = $this->dbc->query($sql);
        foreach($res as $cours)
        {
            return $cours;
        }

    }
   
    public function getCoursByLecon($idLecon){
        $sql="select idCours from chapitre where id in (select idChapitre from lecon where id=".$idLecon.")";
        $res = $this->dbc->query($sql);
        foreach($res as $cours)
        {
            return $cours;
        }
    }

    public function enableChapitre($id)
    {
        $statement = $this->dbc->prepare("update chapitre set enable = :enable where id =:id");
        return    $statement->execute([

            "enable" => true,
            "id" => $id,
        ]);
    }

    public function disableChapitre($id)
    {
        $statement = $this->dbc->prepare("update chapitre set enable = :enable where id =:id");
        $statement->execute([

            "enable" => false,
            "id" => $id,
        ]);
    }
    public function modifierChapitre($id,$titre){
        $statement = $this->dbc->prepare("update chapitre set titre = :titre where id =:id");
        $statement->execute([

            "titre" => $titre,
            "id" => $id,
        ]);
    }

    public function supprimerLecon($id){
        $sql  = "delete from file where idLecon=" . $id . "";
        $this->dbc->query($sql);
            $sql  = "delete from lecon where id=" . $id . "";
            $this->dbc->query($sql);
    }

    public function enableLecon($id)
    {
        $statement = $this->dbc->prepare("update lecon set enable = :enable where id =:id");
        return    $statement->execute([

            "enable" => true,
            "id" => $id,
        ]);
    }

    public function disableLecon($id)
    {
        $statement = $this->dbc->prepare("update lecon set enable = :enable where id =:id");
        $statement->execute([

            "enable" => false,
            "id" => $id,
        ]);
    }

    public function ajouterChapitre($idCours, $titre)
    {
        $statement = $this->dbc->prepare("INSERT INTO chapitre(idCours,titre)VALUES(:idCours,:titre)");
        $statement->execute([
           
            "idCours" => $idCours,
            "titre" => $titre,
        ]);
    }
    public function ecrivainComment($id){
        $sql = "select * from etudiant where id in(select idEtudiant from commentaire where id=".$id.")";
        $res = $this->dbc->query($sql);
        foreach($res as $etudiant)
        {
            return $etudiant;
        }
    }

    public function lastFile(){
        $sql = "select nom from file where id=(SELECT MAX(id) FROM file)";
        $res = $this->dbc->query($sql);
        foreach($res as $file)
        {
            return $file;
        }
        return null;
    }

    public function getProf($id){
        $sql = "select * from professeur where id=".$id."";
        $res = $this->dbc->query($sql);
        foreach($res as $prof)
        {
            return $prof;
        }
    }
 

    public function modifierProfil($id,$nom,$prenom,$email,$newPassword){
        $statement = $this->dbc->prepare("update professeur set nom = :nom,prenom= :prenom,email=:email,pw=:newPassword where id =:id");
        $statement->execute([

            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "newPassword" => password_hash($newPassword, PASSWORD_DEFAULT),
            "id"=>$id,

        ]);
    }

    public function modifierProfilSansPw($id,$nom,$prenom,$email){
        $statement = $this->dbc->prepare("update professeur set nom = :nom,prenom= :prenom,email=:email where id =:id");
        $statement->execute([

            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
         
            "id"=>$id,

        ]);
    }

    public function addComment($comment,$idCours,$date){
        $statement = $this->dbc->prepare("INSERT INTO commentaire(contenu,idCours,date)VALUES(:contenu,:idCours,:date)");
        $statement->execute([
            "contenu" => $comment,
            "idCours" => $idCours,
            "date" => $date,
        ]);
    }
    public function addCommentStudent($comment,$idCours,$date,$idEtudiant){
        $statement = $this->dbc->prepare("INSERT INTO commentaire(contenu,idCours,date,idEtudiant)VALUES(:contenu,:idCours,:date,:idEtudiant)");
        $statement->execute([
            "contenu" => $comment,
            "idCours" => $idCours,
            "date" => $date,
            "idEtudiant"=>$idEtudiant,
        ]);
    }
  
  public function Contact($nom, $email, $message, $phone){

    require_once '../../../../lib/mail.php';
    
    $mail->setFrom('touriaa.abbou@gmail.com',mb_encode_mimeheader( 'site de  bright mind', 'UTF-8'));
    $mail->addAddress('touriaa.abbou@gmail.com');
    $mail->Subject = mb_encode_mimeheader('Message envoyé par le site de bright mind', 'UTF-8');
    $message = "Ce message vous a été envoyé via le site de bright mind par : <br>
                  
                    <b>Nom : </b>" . $nom . "<br>
                    <b>Message : </b>" . $message;
    $mail->Body    = $message;
    $mail->addReplyTo($email, $nom);
    try {
        
      $resulate=   $mail->send();

    $statement = $this->dbc->prepare("INSERT INTO contact(nom,email,message,phone)VALUES(:nom,:email,:message,:phone)");
    $statement->execute([
        "nom" => $nom,
        "email" => $email,
        "message" => $message,
        "phone"=>$phone,
    ]);
} catch (Exception $e) {
    $errors['echou'] = "Une erreur a été servenu";
}
  }
  
}
