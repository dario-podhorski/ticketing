<?php

/**
 * Description of user
 *
 * @author Dario
 */
class User {
    
    protected $id;
    protected $name;
    protected $lastName;
    protected $email;
    protected $phone;
    protected $city;
    protected $admin=FALSE;
    
    function __construct($id, $name, $surName, $email, $phone, $city) {
        $this->id=$id;
        $this->name=$name;
        $this->surName=$surName;
        $this->email=$email;
        $this->phone=$phone;
        $this->city=$city;
        
    }
    
    public function getID(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getlastName(){
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

