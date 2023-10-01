<?php
require_once 'autoloadAdmin.php';
if (!empty($_POST)) {
    $nom = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['name']))));
    $subject = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['subject']))));
    $teacher = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['prof']))));
    $id = $_POST['id'];
    

    $class = new CreerClass($nom, $subject, $teacher);
    $errors = $class->errors;
    if (empty($errors)) {
        $class->updateClass($id, $nom, $subject, $teacher);
    }
    $errors = $class->errors;
    echo json_encode($errors);
}
