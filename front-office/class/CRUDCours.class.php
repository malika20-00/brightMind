<?php
require_once '../../fichierCommun/db.class.php';
class CRUDCours extends dbConnection
{
   public function __construct()
   {
      parent::PDOConnection();
   }
   public function readCoursById($idCours)
   {
      $sql = "select * from cours where id=" . $idCours . "";
      $res = parent::execQuery($sql);
      $res->setFetchMode(PDO::FETCH_ASSOC);
      foreach ($res as $r) {
         return $r;
      }
   }
   public function readCoursByIdClass($idClass)
   {
      $sql = "select * from cours where idClass=" . $idClass . " and enable = true";
      $res = parent::execQuery($sql);
      $res->setFetchMode(PDO::FETCH_ASSOC);
      return $res;
   }
   public function readChapterByIdCours($idCours)
   {
      $sql = "select * from chapitre where idCours=" . $idCours . "";
      $res = parent::execQuery($sql);
      $res->setFetchMode(PDO::FETCH_ASSOC);
      return $res;
   }
   public function fetchAllChapitreByIdCours($idCours)
   {
      $sql = "select * from chapitre where idCours=" . $idCours . "";
      $res = parent::execQuery($sql);
      $res =   $res->fetchAll();
      return $res;
   }
   public function readLeconByIdChapitre($idChapitre){
      $sql="select * from lecon where idChapitre=".$idChapitre."";
      $res = parent::execQuery($sql);
      $res->setFetchMode(PDO::FETCH_ASSOC);
      return $res;
   }
   public function readChapitreById($idChapitre){
      $sql="select * from chapitre where id=".$idChapitre."";
      $res = parent::execQuery($sql);
      $res->setFetchMode(PDO::FETCH_ASSOC);
      foreach($res as $r){
         return $r;
      }
   }
   public function readFilesByIdCours($idCours){
      $sql="select * from file where idCours=".$idCours."";
      $res = parent::execQuery($sql);
      $res->setFetchMode(PDO::FETCH_ASSOC);
      return $res;
   }

   public function readFilesByIdChapitre($idChapitre){
      $sql="select * from file where idCours=".$idChapitre."";
      $res = parent::execQuery($sql);
      $res->setFetchMode(PDO::FETCH_ASSOC);
      return $res;
   }

   public function readFilesByIdLecon($idLecon){
      $sql="select * from file where idLecon=".$idLecon."";
      $res = parent::execQuery($sql);
      $res->setFetchMode(PDO::FETCH_ASSOC);
      return $res;
   }
   public function __destruct()
   {
       parent::close();
   }

   //commentaire
   public function commentaires_sans_parent($idCours)
   {
       $sql = "select * from commentaire where idCommentParent IS NULL and idCours=".$idCours."";
       $res = $this->dbc->query($sql);
       $res->setFetchMode(PDO::FETCH_ASSOC);
       return $res;
   }

   public function ecrivainComment($id){
      $sql = "select * from etudiant where id in(select idEtudiant from commentaire where id=".$id.")";
      $res = $this->dbc->query($sql);
      foreach($res as $etudiant)
      {
          return $etudiant;
      }
  }

  public function comment_child($idComment)
    {
        $sql = "select * from commentaire where idCommentParent=" . $idComment . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getProfByClass($idClass){
      $sql = "select * from professeur where id in(select idProf from class where id=" . $idClass. ")";
      $res = $this->dbc->query($sql);
      foreach($res as $prof)
      {
          return $prof;
      }
    }
}
