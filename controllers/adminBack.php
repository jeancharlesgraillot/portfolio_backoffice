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



//Update project
if (isset($_POST['idProjectUpdate']) && isset($_POST['updateProject'])) 
{   
    $id = intval($_POST['idProjectUpdate']);
    var_dump($id);

    if (isset($_POST['updateProjectSend'])) 
    {echo 'test2';
        
        if (isset($_POST['titleUpdate']) && !empty($_POST['titleUpdate'])
        && isset($_POST['descriptionUpdate']) && !empty($_POST['descriptionUpdate'])
        && isset($_POST['linkUpdate']) && !empty($_POST['linkUpdate'])
        && isset($_POST['categoryUpdate']) && !empty($_POST['categoryUpdate'])
        && isset($_POST['altUpdate']) && !empty($_POST['altUpdate'])
        && isset($_FILES['imageUpdate']) AND $_FILES['imageUpdate']['error'] == 0)
        {echo 'test3';

            $title = htmlspecialchars($_POST['titleUpdate']);
            $description = htmlspecialchars($_POST['descriptionUpdate']);
            $link = htmlspecialchars($_POST['linkUpdate']);
            $category = htmlspecialchars($_POST['categoryUpdate']);
            $alt = htmlspecialchars($_POST['altUpdate']);

            // Testons si le fichier n'est pas trop gros
            if ($_FILES['imageUpdate']['size'] <= 1000000)
            {echo 'test4';
                // Testons si l'extension est autorisée
                $datafile = pathinfo($_FILES['imageUpdate']['name']);
                $extension_upload = $datafile['extension'];
                $allowed_extensions = array('jpg', 'jpeg', 'png');
                if (in_array($extension_upload, $allowed_extensions))
                {echo 'test5';
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['imageUpdate']['tmp_name'], '../assets/img/realisations/' . basename($_FILES['imageUpdate']['name']));

                        $project = new Project([
                            'id' => $id,
                            'title' => $title,
                            'description' => $description,
                            'link' => $link,
                            'category' => $category,
                            'alt' => $alt,
                            'image' => '../assets/img/realisations/' . basename($_FILES['imageUpdate']['name'])

                        ]);
                        
                        $projectManager->updateProject($project);
                        $message = "L'envoi a bien été effectué !";
                }
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