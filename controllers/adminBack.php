<?php

function loadClass($classname)
{
    if(file_exists('../models/'. $classname.'.php'))
    {
        require '../models/'. $classname.'.php';
    }
    else 
    {
        require '../entities/' . $classname . '.php';
    }
}

spl_autoload_register('loadClass');
session_start();

// We connect to the database
$db = Database::DB();

// We instance an object $formManager with our PDO object
$formManager = new FormManager($db);


// Delete account
if (isset($_POST['id']) && isset($_POST['delete']))
{
    $delete = intval($_POST['id']);        
    $formManager->deleteUser($delete);
}

$users = $formManager->getUsers();

include "../views/adminBackView.php";

 ?>