<?php

declare(strict_types = 1);

class Admin
{

    // Properties and methods
    
    protected $id;
    protected $admin_name;
    protected $admin_pass;

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
     * Get the value of admin_name
     */ 
    public function getAdmin_name()
    {
        return $this->admin_name;
    }

    /**
     * Set the value of admin_name
     *
     * @return  self
     */ 
    public function setAdmin_name($admin_name)
    {
        $this->admin_name = $admin_name;

        return $this;
    }

    /**
     * Get the value of admin_pass
     */ 
    public function getAdmin_pass()
    {
        return $this->admin_pass;
    }

    /**
     * Set the value of admin_pass
     *
     * @return  self
     */ 
    public function setAdmin_pass($admin_pass)
    {
        $this->admin_pass = $admin_pass;

        return $this;
    }
}