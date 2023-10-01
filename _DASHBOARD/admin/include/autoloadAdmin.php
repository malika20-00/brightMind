<?php
spl_autoload_register(function($className){

    require '../../admin/class/'.$className.'.class.php';
});