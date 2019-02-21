<?php

declare(strict_types = 1);

class ProjectManager{

    private $_db;


    /**
     * constructor
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of _db
     */ 
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @param PDO $db
     * @return  self
     */ 
    public function setDb(PDO $db)
    {
        $this->_db = $db;

        return $this;
    }

        /**
     * Get all projects of _db
     *
     * @return  array
     */ 
    public function getProjects()
    {
        // Array declaration
        $arrayOfProjects = [];

        $query = $this->getDb()->prepare('SELECT * FROM projects');
        $query->execute();
        $dataProjects = $query->fetchAll(PDO::FETCH_ASSOC);

        // At each loop, we create a new project object wich is stocked in our array $arrayOfProjects
        foreach ($dataProjects as $dataProject) {
            $arrayOfProjects[] = new Project($dataProject);
            
        }

        // Return of the array on which we could loop to list all users
        return $arrayOfProjects;
    }


    public function getProjectsByCategory(Project $project)
    {
        $arrayOfProjects;
        $query = $this->getDb()->prepare('SELECT * FROM projects WHERE category = :category');
        $query->bindValue(':category', $project->getCategory(), PDO::PARAM_STR);
        $query->execute();
        $projects = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($projects as $project) {
            $arrayOfProjects = new Project($project);
        }
        return $arrayOfProjects;
    }

    /**
     * Add a project in database
     * 
     * @param Project $project
     * @return void
     */
    public function addProject(Project $project)
    {
        $query = $this->getDb()->prepare('INSERT INTO projects(title, description, link, image, alt, category) VALUES(:title, :description, :link, :image, :alt, :category)');
        $query->bindValue(':title', $project->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':description', $project->getDescription(), PDO::PARAM_STR);
        $query->bindValue(':link', $project->getLink(), PDO::PARAM_STR);
        $query->bindValue(':image', $project->getImage(), PDO::PARAM_STR);
        $query->bindValue(':alt', $project->getAlt(), PDO::PARAM_STR);
        $query->bindValue(':category', $project->getCategory(), PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Update a project in database
     *
     * @param Project $project
     * @return void
     */
    public function updateProject(Project $project)
    {
        $query = $this->getDb()->prepare('UPDATE projects SET title = :title, description = :description, link = :link, image = :image, alt = :alt, category = :category WHERE id = :id');
        $query->bindValue(':id', $project->getId(), PDO::PARAM_INT);
        $query->bindValue(':title', $project->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':description', $project->getDescription(), PDO::PARAM_STR);
        $query->bindValue(':link', $project->getLink(), PDO::PARAM_STR);
        $query->bindValue(':image', $project->getImage(), PDO::PARAM_STR);
        $query->bindValue(':alt', $project->getAlt(), PDO::PARAM_STR);
        $query->bindValue(':category', $project->getCategory(), PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Delete project from DB
     *
     * @param $id
     */
    public function deleteProject($id)
    {
        $id = (int)$id;
        $query = $this->getDb()->prepare('DELETE FROM projects WHERE id = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
    }

}

?>