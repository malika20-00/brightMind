<?php 
require_once '../../fichierCommun/db.class.php';
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





public function signUpStudent($prenom,$nom,$niveauScolaire,$tel){
       
    $statement = $this->dbc->prepare("INSERT INTO etudiant(nom,prenom,email,niveauScolaire,pw,telephone,inscriptionDate)VALUES(:nom,:prenom,:email,:niveauScolaire,:pw,:tel,:date)");
    $statement->execute([

        "nom" => $nom,
        "prenom" => $prenom,
        "email" => $this->email,
        "niveauScolaire" => $niveauScolaire,
        "pw" => password_hash($this->pw, PASSWORD_DEFAULT),
        "tel"=>$tel,
        "date"=> date("y-m-d")


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
    public function updatePrenom($prenom,$id)
    {
        $statement = $this->dbc->prepare("update etudiant set prenom = :prenom where id =:id");
        $statement->execute([
            
            "prenom" => $prenom,
            "id" => $id  
        ]);
        
    }

 

    public function updatePw($pw,$id)
    {
        $statement = $this->dbc->prepare("update etudiant set pw = :pw where id =:id");
        $statement->execute([
            
            "pw" =>  password_hash($pw, PASSWORD_DEFAULT),
            "id" => $id  
        ]);
        
    }

    public function updateTel($tel,$id)
    {
        $statement = $this->dbc->prepare("update etudiant set telephone = :tel where id =:id");
        $statement->execute([
            
            "tel" => $tel,
            "id" => $id  
        ]);
        
    }

    public function updateCin($cin,$id)
    {
        $statement = $this->dbc->prepare("update etudiant set cin = :cin where id =:id");
        $statement->execute([
            
            "cin" => $cin,
            "id" => $id  
        ]);
        
    }

    public function updateNom($nom,$id)
    {
        $statement = $this->dbc->prepare("update etudiant set nom = :nom where id =:id");
        $statement->execute([
            
            "nom" => $nom,
            "id" => $id  
        ]);
        
    }
    public function updateNiveauScolaire($nom,$id)
    {
        $statement = $this->dbc->prepare("update etudiant set niveauScolaire = :nom where id =:id");
        $statement->execute([
            
            "nom" => $nom,
            "id" => $id  
        ]);
        
    }
    public function __destruct()
    {
        parent::close();
    }
}