<?php

declare(strict_types = 1);

class FormManager{

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
     * Get all users of _db
     *
     * @return  array
     */ 
    public function getUsers()
    {
        // Array declaration
        $arrayOfUsers = [];

        $query = $this->getDB()->prepare('SELECT * FROM users');
        $query->execute();
        $dataUsers = $query->fetchAll(PDO::FETCH_ASSOC);

        // At each loop, we create a new user object wich is stocked in our array $arrayOfUsers
        foreach ($dataUsers as $dataUser) {
            $arrayOfUsers[] = new User($dataUser);
            
        }

        // Return of the array on which we could loop to list all users
        return $arrayOfUsers;
    }

    /**
     * Get user by id
     *
     * @param $id
     * @return instance of new User object
     */ 
    public function getUser($id)
    {
        $user;
        $query = $this->getDB()->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        

        // $dataCharacter is an associative array which contains informations of a user
        $dataUser = $query->fetch(PDO::FETCH_ASSOC);

        // We create a new User object with the associative array $dataCharacter and we return it
        $user = new User($dataUser);
        return $user;
        
    }

        /**
     * Get admin by id
     *
     * @param $id
     * @return instance of new Admin object
     */ 
    public function getAdmin($id)
    {
        $admin;
        $query = $this->getDB()->prepare('SELECT * FROM administrators WHERE id = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        

        // $dataAdmin is an associative array which contains informations of an admin
        $dataAdmin = $query->fetch(PDO::FETCH_ASSOC);

        // We create a new Admin object with the associative array $dataAdmin and we return it
        $admin = new Admin($dataAdmin);
        return $admin;
        
    }

        /**
     * Add user into DB
     *
     * @param User $user
     */
    public function addUser(User $user)
    {
        $query = $this->getDb()->prepare('INSERT INTO users(user_name, user_email, user_telephone, user_message) VALUES (:user_name, :user_email, :user_telephone, :user_message)');
        $query->bindValue(':user_name', $user->getUser_name(), PDO::PARAM_STR);
        $query->bindValue(':user_email', $user->getUser_email(), PDO::PARAM_STR);
        $query->bindValue(':user_telephone', $user->getUser_telephone(), PDO::PARAM_STR);
        $query->bindValue(':user_message', $user->getUser_message(), PDO::PARAM_STR);
        $query->execute();
    }

        /**
     * Add admin into DB
     *
     * @param Admin $admin
     */
    public function addAdmin(Admin $admin)
    {
        $query = $this->getDb()->prepare('INSERT INTO administrators(admin_name, admin_pass) VALUES (:admin_name, :admin_pass)');
        $query->bindValue(':admin_name', $admin->getAdmin_name(), PDO::PARAM_STR);
        $query->bindValue(':admin_pass', $admin->getAdmin_pass(), PDO::PARAM_STR);
        $query->execute();
    }


        /**
     * Check if admin exists or not and return a admin object
     *
     * @param string $admin_name
     * @return Admin 
     */
    public function checkIfExist(string $admin_name)
    {
        $query = $this->getDb()->prepare('SELECT * FROM administrators WHERE admin_name = :admin_name');
        $query->bindValue('admin_name', $admin_name, PDO::PARAM_STR);
        
        $query->execute();

        // We return a new User for each entry in database with the choosen name
        $admins = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($admins as $admin) {
            return new Admin($admin);
        }
    }

        /**
     * Update user's data 
     *
     * @param User $user
     */
    public function updateUser(User $user)
    {   
  
        $query = $this->getDb()->prepare('UPDATE users SET user_name = :user_name, user_email = :user_email, user_telephone = :user_telephone, user_message = :user_message WHERE id = :id');
        $query->bindValue(':user_name', $user->getUser_name(), PDO::PARAM_STR);
        $query->bindValue(':user_email', $user->getUser_email(), PDO::PARAM_STR);
        $query->bindValue(':user_telephone', $user->getUser_telephone(), PDO::PARAM_STR);
        $query->bindValue(':user_message', $user->getUser_message(), PDO::PARAM_STR);
        $query->execute();
    }


        /**
     * Delete user from DB
     *
     * @param $id
     */
    public function deleteUser($id)
    {
        $id = (int)$id;
        $query = $this->getDb()->prepare('DELETE FROM users WHERE id = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
    }

}

?>