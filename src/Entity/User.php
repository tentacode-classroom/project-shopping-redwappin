<?php

// src/Entity/User.php
namespace App\Entity;

class User
{
    private $id;
    private $email;
    private $password;
    private $firstname;
    private $lastname;


    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email = $email;  
    }

    public function setPassword(string $password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

}

