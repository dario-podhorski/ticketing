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
    
    function __construct($id, $name, $surName, $email, $phone, $city) {
        $this->id=$id;
        $this->name=$name;
        $this->surName=$surName;
        $this->email=$email;
        $this->phone=$phone;
        $this->city=$city;
    }
    
    function getID(){
        return $this->id;
    }
    
    function getName(){
        return $this->name;
    }
    
    function getlastName(){
        return $this->lastName;
    }
    
    function getEmail(){
        return $this->email;
    }
    
    function getPhone() {
        return $this->phone;
    }
    
    function getCity() {
        return $this->city;
    }
}

