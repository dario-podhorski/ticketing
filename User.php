<?php

/**
 * Description of user
 *
 * @author Dario
 */
class User {
    
    private $id;
    private $name;
    private $lastName;
    private $email;
    private $phone;
    private $city;
    private $admin;
    
    function __construct($id, $name, $lastName, $email, $phone, $city, $admin=FALSE) {
        $this->id=$id;
        $this->name=$name;
        $this->lastName=$lastName;
        $this->email=$email;
        $this->phone=$phone;
        $this->city=$city;
        $this->admin=$admin;
        
    }
    
    public function getID(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getLastName(){
        return $this->lastName;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getPhone() {
        return $this->phone;
    }
    
    public function getCity() {
        return $this->city;
    }
}

