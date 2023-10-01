<?php 
$titre=$_GET['name'];
$name='../front-office/prof/include/files/'.$titre.'';
header('Content-Type: application/pdf') ;
header('Content-Disposition: inline') ;

readfile($name) ;