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

$id = intval($_POST['idProjectUpdate']);

//Update project
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

                    $image = htmlspecialchars('../assets/img/realisations/' . basename($_FILES['imageUpdate']['name']));

                    $project = new Project([
                        'id' => $id,
                        'title' => $title,
                        'description' => $description,
                        'link' => $link,
                        'category' => $category,
                        'alt' => $alt,
                        'image' => $image

                    ]);
                    
                    $projectManager->updateProject($project);
                    $message = "L'envoi a bien été effectué !";
            }
        }
    }
}


// Get data in Db
$users = $formManager->getUsers();
$projects = $projectManager->getProjects();
$projectToUpdate = $projectManager->getProjectById($id);

include "../views/updateProjectView.php";

 ?>