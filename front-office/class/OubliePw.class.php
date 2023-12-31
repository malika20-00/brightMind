<?php
require_once '../../fichierCommun/db.class.php';
require_once '../../fichierCommun/Validation.class.php';
class oubliePw extends dbConnection
{

    private $code;
    private $email;

    public $errors = array();
    public $validation;
    public function __construct($email)
    {
        parent::PDOConnection();
        $this->email = $email;
        $this->validation =  new Validation();
        $this->validation->isEmptyEmail($this->email);
        $this->validation->isInvalidEmail($this->email);
        $this->errors = $this->validation->errors;
    }

    public function mainFunction()
    {  


        $resultat = $this->dbc->prepare("SELECT id FROM etudiant where email=:email");
        $resultat->execute([
            "email" => $this->email,

        ]);
        $verif = 0;
        while ($student = $resultat->fetch(PDO::FETCH_OBJ)) {
            if ($student) {
                $verif  = 1;
            }
        }

        if ($verif == 0) {
            $this->errors['emailNotExist'] = "<span style='color:red;'>you are not registered yet</span>";
        } else {
            $this->sendCode();
            $this->dureeCode();
        }
    }
    public function verifierCode($code)
    {
        $this->validation =  new Validation();
        $this->validation->isEmptyField($code);
        $this->errors = $this->validation->errors;
        if (empty($this->errors)) {

            $stmt = $this->dbc->prepare("select * from code where email = :email and code = :code");

            $stmt->execute([
                "email" => $this->email,
                "code" => $code,
            ]);

            $data = $stmt->fetchAll();
            if ($data == null) {

                $this->errors['codeInvalid'] = "<span style='color:red;'>your code is invalid, try again</span>";
            }
        }
    }
  

    public function updatePw($pw, $pwVerify)
    {
        $this->validation =  new Validation();
        $this->validation->isEmptyPw($pw);
        $this->validation->isInvalidPw($pw);
        $this->validation->isNotMatchPw($pw, $pwVerify);
        $this->validation->isEmptyPwConfirmation($pwVerify);
        $this->errors = $this->validation->errors;
        if (empty($this->errors)) {
            $stmt = $this->dbc->prepare("update etudiant set pw = :pw where email = :email");
            $stmt->execute([
                "pw" => password_hash($pw, PASSWORD_DEFAULT),
                "email" => $this->email,
            ]);
        }
    }
    private function sendCode()
    {
        $tableauCodes = array('$1£45', '?78*', '7#8[', '&78$', '+88@', '}7*7', 'yj%8', '%78*');
        $this->code = $tableauCodes[rand(0, count($tableauCodes) - 1)] . "" . $tableauCodes[rand(0, count($tableauCodes) - 1)];

        require_once '../../lib/mail.php';
        $message = "<div style='background-color:#eee;
        margin: 0 auto;
        padding: 20px 0px;
        
        border-radius: 40px;
        text-align:center;
        '><span style='font-size: 20px;
        font-weight: 700;'>Hello, here is your code: </span><br><span style='font-size: 30px;
        font-weight: 900;
        color:#3d3ba9;
        margin: 10px auto;'>" . $this->code . "</span><br><span style='font-size: 20px;
        font-weight: 800;'>Your code will be expired in 2 hours.</span><div>";
        $mail->setFrom('touriaa.abbou@gmail.com', mb_encode_mimeheader('Bright mind', 'UTF-8'));
        $mail->addAddress($this->email);
        $mail->Subject = mb_encode_mimeheader('Password change', 'UTF-8');
        $mail->Body    = $message;
        $mail->send();
    }
    private function dureeCode()
    {
        $sql="SET GLOBAL event_scheduler = ON";
        $this->dbc->query($sql);
        $sql = "create table IF NOT EXISTS code (
                email varchar(250),
                code varchar(10),
                event text(200)
                 )";
        $this->dbc->query($sql);


        $sql = "SELECT * FROM code where email='" . $this->email . "'";
        $res = parent::execQuery($sql);
       $res= $res->fetchAll();
        if ($res) {

            foreach ($res as $r) {

                $event = $r['event'];
            }
            $sql = "delete from code where email = '" . $this->email . "' ";
            $this->dbc->query($sql);
            $sql = "drop event test" . $event . "";
            $this->dbc->query($sql);
        }


        $event = uniqid();
        $sql = "insert into code values('" . $this->email . "','" . $this->code . "', '" . $event . "')";
        $this->dbc->query($sql);

        $sql = "CREATE EVENT test" . $event . "
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 2 HOUR
        
        DO
           delete from code where email = '" . $this->email . "'";
        $this->dbc->query($sql);
    }
    public function __destruct()
    {
        parent::close();
    }
}
