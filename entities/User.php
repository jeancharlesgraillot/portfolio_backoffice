<?php

declare(strict_types = 1);

class User
{

    // Properties and methods
    
    protected $id;
    protected $user_name;
    protected $user_email;
    protected $user_telephone;
    protected $user_message;

    /**
     * Constructor
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    /**
     * Hydratation
     *
     * @param array $data
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            // We get the setter name linked to the attribute
            $method = 'set'.ucfirst($key);
                
            // If corresponding setter exists
            if (method_exists($this, $method))
            {
                // We call the setter.
                $this->$method($value);
            }
        }
    }

    /**
     * Get the value of id
    */ 
    public function getId()
    {
    return $this->id;
    }

    /**
     * Set the value of id
    *
    * @return  self
    */ 
    public function setId($id)
    {
    $id = (int)$id;
    $this->id = $id;

    return $this;
    }

        /**
     * Get the value of user_name
     */ 
    public function getUser_name()
    {
        return $this->user_name;
    }

    /**
     * Set the value of user_name
     *
     * @return  self
     */ 
    public function setUser_name($user_name)
    {
        $this->user_name = $user_name;

        return $this;
    }

    /**
     * Get the value of user_email
     */ 
    public function getUser_email()
    {
        return $this->user_email;
    }

    /**
     * Set the value of user_email
     *
     * @return  self
     */ 
    public function setUser_email($user_email)
    {
        $this->user_email = $user_email;

        return $this;
    }

    /**
     * Get the value of user_telephone
     */ 
    public function getUser_telephone()
    {
        return $this->user_telephone;
    }

    /**
     * Set the value of user_telephone
     *
     * @return  self
     */ 
    public function setUser_telephone($user_telephone)
    {
        $this->user_telephone = $user_telephone;

        return $this;
    }

    /**
     * Get the value of user_message
     */ 
    public function getUser_message()
    {
        return $this->user_message;
    }

    /**
     * Set the value of user_message
     *
     * @return  self
     */ 
    public function setUser_message($user_message)
    {
        $this->user_message = $user_message;

        return $this;
    }
}