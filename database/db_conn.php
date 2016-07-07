<?php

namespace database;

class DB {
    
    private $host = 'localhost';
    private $database= 'ticketing';
    private static $user = 'root';
    private static $password = 'mysql';
    private static $_connection;
            
    //function __construct() {
        //$this->_connection = new \PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
        
    //}

    public static function getConnection(){
        self::$_connection = new \PDO("mysql:host=localhost;dbname=ticketing", self::$user, self::$password);
        return self::$_connection;
    }
}

 
