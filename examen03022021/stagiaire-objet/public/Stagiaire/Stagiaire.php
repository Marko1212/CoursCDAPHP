<?php

namespace Stagiaire;

class Stagiaire
{
    private $id;
    private $created_at;
    private $name;
    private $phone;
    private $birthday;

    
    public function __construct($id, $created_at, $name, $phone, $birthday)
    {
        $this->id = $id;
        $this->created_at = $created_at;
        $this->name = $name;
        $this->phone = $phone;
        $this->birthday = $birthday;
    }
   
    public function getId()
    {
        return $this->id;
    }

  
    public function setId($id)
    {
        $this->id = $id;
    }

    
    public function getCreatedAt()
    {
        return $this->created_at;
    }

   
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

   
    public function getName()
    {
        return $this->name;
    }

   
    public function setName($name)
    {
        $this->name = $name;
    }

    
    public function getPhone()
    {
        return $this->phone;
    }

   
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    
    public function getBirthday()
    {
        return $this->birthday;
    }

 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }
}