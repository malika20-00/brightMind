<?php
require_once '../../fichierCommun/db.class.php';
require_once '../../fichierCommun/Validation.class.php';

class Profil extends dbConnection
{

    private $nom;
    private $prenom;
    private $email;
    private $niveauScolaire;
    private $cin;
    private $tel;
    private $pw;
    private $pwVerif;
    public $errors = array();
    public $validation;

    public function __construct($nom, $prenom, $email, $niveauScolaire,  $pw, $pwVerif)
    {
        parent::PDOConnection();
        session_start();
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pw = $pw;
        $this->pwVerif = $pwVerif;
        $this->niveauScolaire = $niveauScolaire;

        $this->validation =  new Validation();
        $this->validation->isEmptyNom($nom);
        $this->validation->isEmptyPrenom($prenom);
        $this->validation->isEmptyEmail($email);

        $this->validation->isEmptyNiveauScolaire($niveauScolaire);


        $this->validation->isInvalidNom($this->nom);
        $this->validation->isInvalidPrenom($this->prenom);
        $this->validation->isInvalidEmail($this->email);

        $this->validation->isInvalidNiveauScolaire($niveauScolaire);


        $this->errors = $this->validation->errors;
    }

    public function updateNom($nom)
    {
        $crudEtudiant = new CRUDStudent();
        $id = $_SESSION['id'];
        $res =  $crudEtudiant->readStudentById($id);
        if ($res['nom'] != $nom) {
            $crudEtudiant->updateNom($nom, $id);
        }
    }

    public function updatePrenom($prenom)
    {
        $crudEtudiant = new CRUDStudent();
        $id = $_SESSION['id'];
        $res =  $crudEtudiant->readStudentById($id);
        if ($res['prenom'] != $prenom) {
            $crudEtudiant->updatePrenom($prenom, $id);
        }
    }


    public function updateNiveauScolaire($prenom)
    {
        $crudEtudiant = new CRUDStudent();
        $id = $_SESSION['id'];
        $res =  $crudEtudiant->readStudentById($id);
        if ($res['niveauScolaire'] != $prenom) {
            $crudEtudiant->updateNiveauScolaire($prenom, $id);
        }
    }




    public function updateEmail($email)
    {
        $crudEtudiant = new CRUDStudent();
        $id = $_SESSION['id'];
        $res =  $crudEtudiant->readStudentById($id);
        if ($res['email'] != $email) {
            $sql = "select * from etudiant where email='" . $email . "'";
            $res = parent::execQuery($sql);

            $res = $res->fetchAll();
            
                if ($res) {

                    $this->errors["emailExist"] = "<span style='color:red;'>this email is already exist</span>";
                }
            
            if ($this->errors == null) {
                $crudEtudiant->updateEmailStudent($email, $id);
            }
        }
    }

    public function updatePw($pw, $verifyPw)
    {
        if ($pw != null) {
            $this->validation->isInvalidPw($pw);
            $this->validation->isEmptyPwConfirmation($verifyPw);
            $this->validation->isNotMatchPw($pw, $verifyPw);
            $this->errors = $this->validation->errors;
            if ($this->errors == null) {
                $crudEtudiant = new CRUDStudent();
                $id = $_SESSION['id'];
                $crudEtudiant->updatePw($pw, $id);
            }
        }
    }
    public function updateCin($cin)
    {
        if ($cin) {
            $this->validation->isInvalidCin($cin);
            $this->errors = $this->validation->errors;
            if ($this->errors == null) {

                $crudEtudiant = new CRUDStudent();
                $id = $_SESSION['id'];
                $res =  $crudEtudiant->readStudentById($id);
                if ($res['cin'] != $cin) {
                    $crudEtudiant->updateCin($cin, $id);
                }
            }
        }
    }

    public function updateTel($tel)
    {
        if ($tel) {
            $this->validation->isInvalidTel($tel);
            $this->errors = $this->validation->errors;
            if ($this->errors == null) {
                $crudEtudiant = new CRUDStudent();
                $id = $_SESSION['id'];
                $res =  $crudEtudiant->readStudentById($id);
               
                if ($res['telephone'] != $tel) {
                    
                    $crudEtudiant->updateTel($tel, $id);
                }
            }
        }
    }
    public function __destruct()
    {
        parent::close();
    }
}
