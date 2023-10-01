<?php
require_once '../../../fichierCommun/db.class.php';
class CRUDAdmin extends dbConnection
{

    private $email;
    private $pw;


  public function __construct(){
    parent::PDOConnection();
  }
public function setEmail($email){
    $this->email = $email;

}

public function setPw($pw){
    $this->pw = $pw;
    
}
public function readAdminById($id){
   
    $sql = "select * from admin where id = " . $id . "";
    $res = $this->dbc->query($sql);
    $res->setFetchMode(PDO::FETCH_ASSOC);


    foreach ($res as $r) {
        return $r;
    } 
}
    public function addAdmin($prenom, $nom, $cin, $telephone)
    {
        
        $statement = $this->dbc->prepare("INSERT INTO admin(prenom,nom,cin,telephone,email,pw)VALUES(:prenom,:nom,:cin,:telephone,:email,:pw)");
        $statement->execute([
            "email" => $this->email,
            "pw" => password_hash($this->pw, PASSWORD_DEFAULT),
            "prenom" => $prenom,
            "nom" => $nom,
            "cin" => $cin,
            "telephone" => $telephone,


        ]);
        
    }
    public function deleteAdmin($id)
    {
        
    }
    public function readAdmin()
    {
      
        $sql = "select * from admin where isSup = 0";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        return $res;
      
    }
    public function updatePrenomAdmin($prenom,$id)
    {
        $statement = $this->dbc->prepare("update admin set prenom = :prenom where id =:id");
        $statement->execute([
            
            "prenom" => $prenom,
            "id" => $id  
        ]);
        
    }

    public function updateEmailAdmin($email,$id)
    {
        $statement = $this->dbc->prepare("update admin set email = :email where id =:id");
         $statement->execute([
            "email" => $email,
            "id" => $id
        ]);
        
    }

    public function updatePwAdmin($pw,$id)
    {
        $statement = $this->dbc->prepare("update admin set pw = :pw where id =:id");
        $statement->execute([
            
            "pw" =>  password_hash($pw, PASSWORD_DEFAULT),
            "id" => $id  
        ]);
        
    }

    public function updateTelAdmin($tel,$id)
    {
        $statement = $this->dbc->prepare("update admin set telephone = :tel where id =:id");
        $statement->execute([
            
            "tel" => $tel,
            "id" => $id  
        ]);
        
    }

    public function updateCinAdmin($cin,$id)
    {
        $statement = $this->dbc->prepare("update admin set cin = :cin where id =:id");
        $statement->execute([
            
            "cin" => $cin,
            "id" => $id  
        ]);
        
    }

    public function updateNomAdmin($nom,$id)
    {
        $statement = $this->dbc->prepare("update admin set nom = :nom where id =:id");
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
