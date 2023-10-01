<?php 
$titre=$_GET['name'];
$name='../../../front-office/front-office/profResume/'.$titre.'';
header('Content-Type: application/pdf') ;
header('Content-Disposition: inline') ;

readfile($name) ;