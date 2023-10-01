<?php
require_once '../../../fichierCommun/db.class.php';
class CRUDProf extends dbConnection
{

    private $email;
    private $pw;


    public function __construct()
    {
        parent::PDOConnection();
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPw($pw)
    {
        $this->pw = $pw;
    }
    public function addProf($prenom, $nom, $cin, $telephone, $idAdmin)
    {

        $statement = $this->dbc->prepare("INSERT INTO professeur(prenom,nom,cin,telephone,email,pw,idAdmin)VALUES(:prenom,:nom,:cin,:telephone,:email,:pw,:idAdmin)");
        $statement->execute([
            "email" => $this->email,
            "pw" => password_hash($this->pw, PASSWORD_DEFAULT),
            "prenom" => $prenom,
            "nom" => $nom,
            "cin" => $cin,
            "telephone" => $telephone,
            "idAdmin" => $idAdmin


        ]);
    }

    public function readProf()
    {

        $sql = "select * from professeur";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res;
    }
    public function readProfById($id)
    {

        $sql = "select * from professeur where id = " . $id . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);


        foreach ($res as $r) {
            return $r;
        }
    }
    public function updateEmailProf($id, $email)
    {
        $statement = $this->dbc->prepare("update professeur set email = :email where id =:id");
        $statement->execute([
            "email" => $email,
            "id" => $id
        ]);
    }
    public function updateIdAdminProf($id)
    {
        $statement = $this->dbc->prepare("update professeur set idAdmin = :idAdmin where id =:id");
        if (!isset($_SESSION)) {
            session_start();
        }
        $idAdmin = $_SESSION['id'];
        $statement->execute([
            "idAdmin" => $idAdmin,
            "id" => $id
        ]);
    }
  
    public function __destruct()
    {
        parent::close();
    }
}
