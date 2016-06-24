<?php

/**
 * Description of user
 *
 * @author Dario
 */
class user {
    
    protected $id;
    protected $name;
    protected $surName;
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
}
