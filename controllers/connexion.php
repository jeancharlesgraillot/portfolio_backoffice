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

// We instance an object $vehicleManager with our PDO object
$formManager = new FormManager($db);
$message = "";

if (!empty($_POST['admin_name'])
&& !empty($_POST['admin_pass']))
{
    
        $admin_name = htmlspecialchars($_POST['admin_name']);
        $admin_pass = htmlspecialchars($_POST['admin_pass']);
        $checkIfExist = $formManager->checkIfExist($admin_name);
        
        $isPasswordCorrect = password_verify($admin_pass, $checkIfExist->getAdmin_pass());
        
        if ($isPasswordCorrect) 
        {
            
            $_SESSION['admin_name'] = $admin_name;

            header('Location: adminBack.php');

        }else{

            $message = 'Mauvais nom ou mot de passe !';
            
            // header('Location: index.php');
            header('Refresh: 1; url=index.php');
            
        }
}

include "../views/connexionView.php";