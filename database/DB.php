<?php

namespace database;

class DB {
    
    const host = 'localhost';
    const database= 'ticketing';
    const user = 'root';
    const password = 'mysql';
    private static $_connection;
            
    public static function getConnection(){
        $_connection = new \PDO('mysql:host='.self::host.';dbname='.self::database, self::user, self::password);
        return $_connection;
    }
}

 
