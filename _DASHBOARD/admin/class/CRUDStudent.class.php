<?php 
require_once '../../../fichierCommun/db.class.php';
class CRUDStudent extends dbConnection{
	
    private $email;
    private $pw;
   
public function __construct()
{
    parent::PDOConnection();
}
    

public  function setEmail($email){
    $this->email = $email;
}
public  function setPw($pw){
    $this->pw = $pw;
}





public function signUpStudent($prenom,$nom,$niveauScolaire){
       
    $statement = $this->dbc->prepare("INSERT INTO etudiant(nom,prenom,email,niveauScolaire,pw)VALUES(:nom,:prenom,:email,:niveauScolaire,:pw)");
    $statement->execute([

        "nom" => $nom,
        "prenom" => $prenom,
        "email" => $this->email,
        "niveauScolaire" => $niveauScolaire,
        "pw" => password_hash($this->pw, PASSWORD_DEFAULT),


    ]);
    
}


    public function addStudent($prenom,$nom,$cin,$telephone,$niveauScolaire,$ajouterPar){
       
        $statement = $this->dbc->prepare("INSERT INTO etudiant(nom,prenom,email,niveauScolaire,cin,telephone,pw,ajouterPar)VALUES(:nom,:prenom,:email,:niveauScolaire,:cin,:telephone,:pw,:ajouterPar)");
        $statement->execute([

            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $this->email,
            "niveauScolaire" => $niveauScolaire,
            "cin"=>$cin,
            "telephone" => $telephone,
            "pw" => password_hash($this->pw, PASSWORD_DEFAULT),
            "ajouterPar" => $ajouterPar,


        ]);
        
    }
    public function deleteStudent($id){
        $statement = $this->dbc->prepare("delete from etudiant where id = :id");
        $statement->execute([
            
           
            "id" => $id  
        ]);
        
    }
    public function readStudentById($idStudent)
    {
        $sql = "select * from etudiant where id =" . $idStudent. "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);        
        foreach ($res as $r) {
            return $r;
        }
    }
    public function readStudentByEmail($email)
    {
        $sql = "select * from etudiant where email ='" . $email. "'";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);        
        foreach ($res as $r) {
            return $r;
        }
    }
    public function readStudentByLevelSchool($level){
        $sql = "select * from etudiant where niveauScolaire = '".$level."' and (acceptePar IS NOT NULL or ajouterPar IS not NULL)";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        return $res;
    }
    public function readStudentByLevelSchoolR($level){
        $sql = "select * from etudiant where niveauScolaire = '".$level."' and acceptePar IS NULL and ajouterPar IS NULL ";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        return $res;
    }
    public function readStudentByLevelSchoolTeacher($level,$idTeacher){
        $sql = "select * from etudiant where niveauScolaire = '".$level."' and id in (select idEtudiant from affectation where idClass in (select id from class where idProf = ".$idTeacher."))";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        return $res;
    }
    public function readStudent(){
        $sql = "select * from etudiant";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        return $res;
    }
    public function updateEmailStudent($id,$email){
       
        $statement = $this->dbc->prepare("update etudiant set email = :email where id =:id");
        $statement->execute([
            "email" =>$email,
            "id" => $id
        ]);
    }
    public function __destruct()
    {
        parent::close();
    }

    public function classOfStudent($idClass)
    {
        $sql = "select * from etudiant where id in ( select idEtudiant from affectation where idClass=" . $idClass . ")";
        $res = $this->dbc->query($sql);
        return $res;
    }
}