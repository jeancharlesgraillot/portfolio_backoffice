<?php

// Register our autoload.
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



// Connect to the database
$db = Database::DB();

// Instance an object $vehicleManager with our PDO object
$formManager = new FormManager($db);
$message = "";

if (isset($_POST['user_name']) && !empty($_POST['user_name'])
&& isset($_POST['user_email']) && !empty($_POST['user_email']) && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['user_email'])
&& isset($_POST['user_message']) && !empty($_POST['user_message']) 
) 
{
    if (isset($_POST['contact'])) 
    {

        $user_name = htmlspecialchars($_POST['user_name']);
        $user_email = htmlspecialchars($_POST['user_email']);
        $user_telephone = htmlspecialchars($_POST['user_telephone']);
        $user_message = htmlspecialchars($_POST['user_message']);

        
            // Create a user with sent variables 
            $user = new User([
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_telephone' => $user_telephone,
            'user_message' => $user_message

            ]);

            //Add the user in database
            $formManager->addUser($user);

            $message = "Votre message a bien été envoyé !";

        
    }
}else{
    $message = "Veuillez remplir tous les champs requis !";
}

$users = $formManager->getUsers();


















require "../views/indexView.php";
 ?>
