<?php
if(!empty($_GET)){
require_once 'autoloadAdmin.php';
$crudClass = new CRUDClass();

$crudClass->deleteClass($_GET['id']);
header('location: ../../learnplus-v4.4.0/dist/listClass.php');

}