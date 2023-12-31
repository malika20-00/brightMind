<?php
require_once '../../../fichierCommun/db.class.php';
require_once '../../../fichierCommun/Validation.class.php';

class SignIn extends dbConnection
{
    private $email;
    private $pw;
    private $cookie;
    public $errors = array();
    public $validation;
    public function __construct($email, $pw, $cookie)
    {
        parent::PDOConnection();
        $this->email = $email;
        $this->pw = $pw;
        $this->cookie = $cookie;
        $this->validation =  new Validation();
        $this->validation->isEmptyEmail($this->email);
        $this->validation->isInvalidEmail($this->email);
        $this->validation->isEmptyPw($pw);
        $this->errors = $this->validation->errors;
    }




    public function checkUser()
    {
        if ($this->errors == null) {
            $statement = $this->dbc->prepare("select * from admin where email=:email and status=false");
            $statement->execute([
                "email" => $this->email,

            ]);
            $i = 0;
            while ($admin =  $statement->fetch(PDO::FETCH_OBJ)) {
                if (password_verify($this->pw, $admin->pw)) {
                    session_start();
                    $_SESSION['email'] = $admin->email;
                    $_SESSION['id'] = $admin->id;
                    $_SESSION['admin'] = 1;


                    if ($this->cookie == true) {
                        setCookie('emailBrightAdmin', $this->email, time() + 365 * 24 * 3600, "/");
                        setCookie('passwordBrightAdmin', $this->pw, time() + 365 * 24 * 3600, "/");
                    }
                    $i = 1;
                    $this->errors['admin'] = "1";
                    return;
                }
            }

            $statement = $this->dbc->prepare("select * from professeur where email=:email and status=false");
            $statement->execute([
                "email" => $this->email,
            ]);
            while ($admin =  $statement->fetch(PDO::FETCH_OBJ)) {
                if (password_verify($this->pw, $admin->pw)) {
                    session_start();
                    $_SESSION['email'] = $admin->email;
                    $_SESSION['id'] = $admin->id;



                    if ($this->cookie == true) {
                        setCookie('emailBrightAdmin', $this->email, time() + 365 * 24 * 3600, "/");
                        setCookie('passwordBrightAdmin', $this->pw, time() + 365 * 24 * 3600, "/");
                    }

                    $this->errors['prof'] = "1";
                    return;
                }
            }


            $this->errors['compteNonExist'] = "<span style='color:red;'>the email or password is wrong</span>";
        }
    }
    public function __destruct()
    {
        parent::close();
    }
}
