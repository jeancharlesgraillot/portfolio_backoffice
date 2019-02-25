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

// We instance $formManager and $projectManager objects with our PDO object
$formManager = new FormManager($db);
$projectManager = new ProjectManager($db);
$message = "";

if (!isset($_SESSION['admin_name'])) {

    header('Location: index.php');
}



//Add project 

if (isset($_POST['addProject'])) 
{
    if (isset($_POST['title']) && !empty($_POST['title'])
    && isset($_POST['description']) && !empty($_POST['description'])
    && isset($_POST['link']) && !empty($_POST['link'])
    && isset($_POST['category']) && !empty($_POST['category'])
    && isset($_POST['alt']) && !empty($_POST['alt'])
    && isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
    
    {
        
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $link = htmlspecialchars($_POST['link']);
        $category = htmlspecialchars($_POST['category']);
        $alt = htmlspecialchars($_POST['alt']);

        // Testons si le fichier n'est pas trop gros
        if ($_FILES['image']['size'] <= 1000000)
        {
            // Testons si l'extension est autorisée
            $datafile = pathinfo($_FILES['image']['name']);
            $extension_upload = $datafile['extension'];
            $allowed_extensions = array('jpg', 'jpeg', 'png');
            if (in_array($extension_upload, $allowed_extensions))
            {
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/realisations/' . basename($_FILES['image']['name']));

                    $project = new Project([
                        'title' => $title,
                        'description' => $description,
                        'link' => $link,
                        'category' => $category,
                        'alt' => $alt,
                        'image' => '../assets/img/realisations/' . basename($_FILES['image']['name'])

                    ]);
                    
                    $projectManager->addProject($project);
                    $message = "L'envoi a bien été effectué !";
            }
        }
    }
}

// Delete contact
if (isset($_POST['idContact']) && isset($_POST['deleteContact']))
{
    $delete = intval($_POST['idContact']);        
    $formManager->deleteUser($delete);
}

//Delete project
if (isset($_POST['idProjectDelete']) && isset($_POST['deleteProject']))
{
    $delete = intval($_POST['idProjectDelete']);        
    $projectManager->deleteProject($delete);
}


// Get data in Db
$users = $formManager->getUsers();
$projects = $projectManager->getProjects();
// $projectToUpdate = $projectManager->getProjectById($_POST['idProjectUpdate']);

include "../views/adminBackView.php";

 ?>