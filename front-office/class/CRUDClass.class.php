<?php
require_once '../../fichierCommun/db.class.php';
class CRUDClass extends dbConnection
{


    public function __construct()
    {
        parent::PDOConnection();
    }
    public function getClassById($id)
    {
        $sql = "select * from class where id =" . $id . "";
        $res = parent::execQuery($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($res as $r) {
            return $r;
        }
    }

    public function __destruct()
    {
        parent::close();
    }
}
