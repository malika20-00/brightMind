<?php
require_once '../../../fichierCommun/db.class.php';
require_once '../../../fichierCommun/Validation.class.php';

class Admin extends dbConnection
{
    public function __construct()
    {
        parent::PDOConnection();
    }
    public function desactiverCompte($id)
    {
        $statement = $this->dbc->prepare("update admin set status = true where id = :id");

        $statement->execute([
            "id" => $id
        ]);
    }

    public function activerCompte($id)
    {
        $statement = $this->dbc->prepare("update admin set status = false where id = :id");

        $statement->execute([
            "id" => $id
        ]);
    }

    public function getAdmin($id)
    {
        $sql = "select * from admin where id =" . $id . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);


        foreach ($res as $r) {
            return $r;
        }
    }
    public function isSuperviseur()
    {
        $sql = "select * from admin where isSup =1";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);


        foreach ($res as $r) {
            return $r['id'];
        }
    }

    public function desactiverComptePorf($id)
    {
        $statement = $this->dbc->prepare("update professeur set status = true where id = :id");

        $statement->execute([
            "id" => $id
        ]);
    }

    public function activerCompteProf($id)
    {
        $statement = $this->dbc->prepare("update professeur set status = false where id = :id");

        $statement->execute([
            "id" => $id
        ]);
    }
    public function demandeEtudiant()
    {
        $sql = "select * from etudiant where acceptePar is null and ajouterPar is null";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res;
    }
    public function accepterEtudiant($idEtudiant)
    {
        session_start();
        $idAdmin = $_SESSION['id'];
        $statement = $this->dbc->prepare("update etudiant set acceptePar = :idAdmin where id = :id");

        $statement->execute([
            "idAdmin" => $idAdmin,
            "id" => $idEtudiant
        ]);
    }

    public function getStudentById($id)
    {
        $sql = "select * from etudiant where id =" . $id . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);


        foreach ($res as $r) {
            return $r;
        }
    }
    public function afficherMatieres()
    {

        $sql = "select DISTINCT matiere from class ORDER BY matiere";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res;
    }
    public function afficherNombreMatieres()
    {

        $sql = "select count( DISTINCT matiere) from class";
        $res = $this->dbc->query($sql);
        $count = $res->fetchColumn();

        return $count;
    }
    public function afficherclassParMatiere($matiere)
    {

        $sql = "select * from class where matiere ='" . $matiere . "'";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res;
    }
    private function afficherMatiereParClass($idClass)
    {

        $sql = "select * from class where id ='" . $idClass . "'";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($res as $r) {
            return $r['matiere'];
        }
    }

    public function verifierAffectation($idEtudiant, $idClass)
    {

        $sql = "select count(*) from affectation where idClass=" . $idClass . "  and idEtudiant =" . $idEtudiant . "";
        $res = $this->dbc->query($sql);
        $res =  $res->fetchColumn();

        return $res;
    }
    public function getOldClass($idEtudiant, $matiere)
    {
        $sql = "SELECT * FROM affectation
        INNER JOIN class ON affectation.idClass = class.id
        WHERE class.matiere ='" .  $matiere . "' and affectation.idEtudiant = " . $idEtudiant . "";
        $res =  parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $table = null;
        foreach ($res as $r) {
            $table = $r;
        }

        if ($table != null) {
            $oldIdClass = $table['idClass'];

            $sql = "           delete from affectation           
            WHERE idClass = " . $oldIdClass . " and idEtudiant = " . $idEtudiant . "";

            parent::execQuery($sql);
        }
    }
    public function supprimerAffectation($idEtudiant){
        $sql = "delete from affectation where idEtudiant = ".$idEtudiant."";
        parent::execQuery($sql);  
    }
    public function modifierAffectation($idEtudiant, $idClass)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $idAdmin = $_SESSION['id'];
       
    
            $statement = $this->dbc->prepare("INSERT INTO affectation(idClass,idEtudiant,idAdmin)VALUES(:idClass,:idEtudiant,:idAdmin)");
            $statement->execute([
    
                "idEtudiant" => $idEtudiant,
                "idClass" => $idClass,
                "idAdmin" => $idAdmin
    
    
            ]);
        
        
     
    

        
        
    }
    public function affecterEtudiant($idEtudiant, $idClass)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $idAdmin = $_SESSION['id'];
        if ($this->verifierAffectation($idEtudiant, $idClass) == 0) {


            $statement = $this->dbc->prepare("INSERT INTO affectation(idClass,idEtudiant,idAdmin)VALUES(:idClass,:idEtudiant,:idAdmin)");
            if ($statement->execute([

                "idEtudiant" => $idEtudiant,
                "idClass" => $idClass,
                "idAdmin" => $idAdmin


            ]) == true) {
                return "1";
            } else {
                return 0;
            }
        }
    }
    public function readStudentByClass($idClass)
    {

        $sql = "SELECT * FROM etudiant WHERE id in( SELECT idEtudiant FROM affectation where idClass=" . $idClass . " )";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }
    public function desactiverCompteEtudiant($id)
    {
        $statement = $this->dbc->prepare("update etudiant set status = true where id = :id");

        $statement->execute([
            "id" => $id
        ]);
    }

    public function activerCompteEtudiant($id)
    {
        $statement = $this->dbc->prepare("update etudiant set status = false where id = :id");

        $statement->execute([
            "id" => $id
        ]);
    }

    public function modifierEtudiant($id, $email)
    {
        require_once 'CRUDStudent.class.php';
        $validation = new Validation();
        $validation->isEmptyEmail($email);
        $validation->isInvalidEmail($email);
        $errors = $validation->errors;
        $crudStudent = new CRUDStudent();


        $res =  $crudStudent->readStudentById($id);

        if ($res['email'] != $email) {
            $sql = "select * from etudiant where email='" . $email . "'";
            $res = $this->dbc->query($sql);


            while ($etudiant = $res->fetch(PDO::FETCH_OBJ)) {
                if ($etudiant) {

                    $errors["emailExist"] = "<span style='color:red;'>this email is already exist</span>";
                }
            }
            if ($errors == null) {
                $crudStudent = new CRUDStudent();

                $crudStudent->updateEmailStudent($id, $email);
            }
        }
        return $errors;
    }
    public function getEtudiantBySubject($idEtudiant, $matiere)
    {
        $sql = "SELECT * FROM affectation
        INNER JOIN class ON affectation.idClass = class.id
        WHERE class.matiere ='" . $matiere . "' and affectation.idEtudiant = " . $idEtudiant . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($res as $r) {
            return $r;
        }
    }

    public function modifierProf($id, $email)
    {
        require_once 'CRUDProf.class.php';
        $validation = new Validation();
        $validation->isEmptyEmail($email);
        $validation->isInvalidEmail($email);
        $errors = $validation->errors;
        $crudProf = new CRUDProf();


        $res =  $crudProf->readProfById($id);

        if ($res['email'] != $email) {
            $sql = "select * from professeur where email='" . $email . "'";
            $res = parent::execQuery($sql);


            while ($prof = $res->fetch(PDO::FETCH_OBJ)) {
                if ($prof) {

                    $errors["emailExist"] = "<span style='color:red;'>this email is already exist</span>";
                }
            }
            if ($errors == null) {


                $crudProf->updateEmailProf($id, $email);
                $crudProf->updateIdAdminProf($id);
            }
        }
        return $errors;
    }
    public function modifierAdmin($id, $email)
    {
        require_once 'CRUDAdmin.class.php';
        $validation = new Validation();
        $validation->isEmptyEmail($email);
        $validation->isInvalidEmail($email);
        $errors = $validation->errors;
        $crudAdmin = new CRUDAdmin();


        $res =  $crudAdmin->readAdminById($id);

        if ($res['email'] != $email) {
            $sql = "select * from admin where email='" . $email . "'";
            $res = parent::execQuery($sql);


            while ($admin = $res->fetch(PDO::FETCH_OBJ)) {
                if ($admin) {

                    $errors["emailExist"] = "<span style='color:red;'>this email is already exist</span>";
                }
            }
            if ($errors == null) {

                $crudAdmin->updateEmailAdmin($email, $id);
            }
        }
        return $errors;
    }
    public function readClassByProf($idProf)
    {
        $sql = "select * from class where idProf=" . $idProf . "";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }
    public function __destruct()
    {
        parent::close();
    }

    public function getLevelSchoolStudentRequest()
    {
        $sql = "select distinct niveauScolaire from etudiant where acceptePar is null and ajouterPar is null ";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }
    public function getLevelSchoolStudentofTeacher($idTeacher)
    {
        $sql = "select distinct niveauScolaire from etudiant where id in (select idEtudiant from affectation where idClass in (select id from class where idProf = ".$idTeacher.")) ";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
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
    public function getLevelSchoolStudent()
    {
        $sql = "select distinct niveauScolaire from etudiant where acceptePar is not null or ajouterPar is not null ";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }
    public function getIdClassByIdStudent($idEtudiant)
    {
        $sql = "select * from affectation where idEtudiant = " . $idEtudiant;
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }
    public function countStudentOfTeacher($idTeacher)
    {
        $sql = "select count(*) from affectation where idClass in (select id from class where idProf = " . $idTeacher . ")";
        $res = parent::execQuery($sql);
        $count = $res->fetchColumn();

        return $count;
    }
    public function countClassesOfTeacher($idTeacher)
    {
        $sql = "select count(*) from class where idProf = " . $idTeacher . "";
        $res = parent::execQuery($sql);
        $count = $res->fetchColumn();

        return $count;
    }
    public function countCoursesOfTeacher($idTeacher)
    {
        $sql = "select count(*) from cours where idClass in (select id from class where idProf = " . $idTeacher . ")";
        $res = parent::execQuery($sql);
        $count = $res->fetchColumn();

        return $count;
    }

    public function countAccountDisabled($idTeacher)
    {
        $sql = "select count(*) from etudiant where id in  (select idEtudiant from affectation where idClass in (select id from class where idProf = " . $idTeacher . ")) and status = true";
        $res = parent::execQuery($sql);
        $count = $res->fetchColumn();

        return $count;
    }
    public function countCoursesDisabled($idTeacher)
    {
        $sql = "select count(*) from cours where idClass in (select id from class where idProf = " . $idTeacher . ") and enable = false";
        $res = parent::execQuery($sql);
        $count = $res->fetchColumn();

        return $count;
    }
    public function getNumberOfFiles($idTeacher)
    {
        $sql = "select count(*) from file where idCours in (select id from cours where idClass
 in (select id from class where idProf = " . $idTeacher . ")) or idChapitre in
 (select id from chapitre where idCours in (select id from cours where idClass in
  (select id from class where idProf = " . $idTeacher . "))) or idLecon
   in (select id from lecon where idChapitre in (select id from chapitre where idCours in 
  (select id from cours where idClass in (select id from class where idProf = " . $idTeacher . "))))";
        $res = parent::execQuery($sql);
        $count = $res->fetchColumn();

        return $count;
    }

    public function getNumberOfStudentOfClass($idClass)
    {
        $sql = "select count(*) from affectation where idClass = " . $idClass . "";
        $res = parent::execQuery($sql);
        $count = $res->fetchColumn();

        return $count;
    }
    public function getCoursesOfTeacher($idTeacher){
        $sql="select * from cours where idClass in (select id from class where idProf = ".$idTeacher.")";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    } 
    public function getNumberOfChapters($idCours){
        $sql = "select count(*) from chapitre where idCours =".$idCours."";
        $res = parent::execQuery($sql);
        $count = $res->fetchColumn();

        return $count;
    }
    public function getNumberOfLessons($idCours){
        $sql = "select count(*) from lecon where idChapitre in (select id from chapitre where idCours = ".$idCours.")";
        $res = parent::execQuery($sql);
        $count = $res->fetchColumn();

        return $count;
    }

    public function GetBeTeacher(){
        $sql="select * from profreq ";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }
    public function supprimerBeTeacher($id){
        $sql = "delete from profreq WHERE id=".$id . "";

        parent::execQuery($sql);
    }

  public function accepterBeTeacher($id,$idAdmin){
  $sql="select * from profreq where id=".$id."";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
      foreach($res as $teacher){
        $teacherActuel=$teacher;
        break;
      }
      $statement = $this->dbc->prepare("INSERT INTO professeur(nom,prenom,email,pw,telephone,idAdmin)VALUES(:nom,:prenom,:email,:pw,:telephone,:idAdmin)");
      $statement->execute([

         "nom"=>$teacherActuel['nom'],
         "prenom"=>$teacherActuel['prenom'],
         "email"=>$teacherActuel['email'],
         "pw"=>password_hash($teacherActuel['password'], PASSWORD_DEFAULT),
         "telephone"=>$teacherActuel['phone'],
         "idAdmin"=>$idAdmin,



      ]);

      $this->supprimerBeTeacher($id);

  }
  public function readCoursByIdClass($idClass){
    $sql = "select * from cours where idClass = ".$idClass."";
    $res= parent::execQuery($sql);
    $res->setFetchMode(PDO::FETCH_ASSOC);
    return $res;
  }
}
