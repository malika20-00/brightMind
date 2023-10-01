<?php
require_once '../../fichierCommun/db.class.php';
class Etudiant extends dbConnection
{


    public function __construct()
    {
        parent::PDOConnection();
    }
    public function getClassByIdStudent($idStudent)
    {
        $sql = "select * from affectation where idEtudiant =" . $idStudent . "";
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
        $idEtudiant = $_SESSION['id'];
        $sql = "select * from affectation where idEtudiant=" . $idEtudiant . " and idClass = " . $idClass . "";
        $class = parent::execQuery($sql);
        $class = $class->fetchAll();

        if ($class) {
            return true;
        } else {
            return false;
        }
    }
    public function upCommingMeets()
    {
        $now =  date("Y-m-d H:m:s");
        $sql = "delete from meet where datedebut < '" . $now . "'";
        parent::execQuery($sql);

        if (!isset($_SESSION)) {
            session_start();
        }
        $idEtudiant = $_SESSION['id'];
        $sql = "select * from meet where idClass in (select idClass from affectation where idEtudiant = " . $idEtudiant . ") order by datedebut DESC ";
        $class = parent::execQuery($sql);
        $class->setFetchMode(PDO::FETCH_ASSOC);
        return $class;
    }
    public function readMeets($idClass)
    {
        $now =  date("Y-m-d H:m:s");
        $sql = "delete from meet where datedebut < '" . $now . "'";
        parent::execQuery($sql);


        $sql = "select * from meet where idClass =" . $idClass . " order by datedebut DESC ";
        $meet = parent::execQuery($sql);
        $meet->setFetchMode(PDO::FETCH_ASSOC);
        return $meet;
    }
    public function readProfById($idProf)
    {
        $sql = "select * from professeur  where id = " . $idProf . "";
        $prof = parent::execQuery($sql);
        $prof->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($prof as $p) {
            return $p;
        }
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
    public function classHasMeets($idClass)
    {
        $sql = "select * from meet  where idClass = " . $idClass . "";
        $prof = parent::execQuery($sql);
        $meet =    $prof->fetchAll();
        if ($meet) {
            return true;
        }
    }
    public function readStudentsByIdClass($idClass)
    {
        $sql = "select * from affectation  where idClass = " . $idClass . "";
        $class = parent::execQuery($sql);
        $class->setFetchMode(PDO::FETCH_ASSOC);
        return $class;
    }
    public function compteEstActiver($id) 
    {
        $sql = "select * from etudiant where id = " . $id . "";
        $etudiant = parent::execQuery($sql);
        $etudiant->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($etudiant as $e) {
            if ($e['status'] == 0) {
                return true;
            }
            else {
                return false;
            }
        }
    }
    public function __destruct()
    {
        parent::close();
    }
}
