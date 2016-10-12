<?php

namespace app\models;
use database\DB;
use PDO;
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\database\DB.php';

/**
 * Description of UsersTable
 * Model for getting data from users table in database
 * 
 */

class UsersTable {
    
    static function getAllUsers(){
        
        $dbconn = DB::getConnection();
        $query = "SELECT * FROM ticketing.users";
        $result = $dbconn->query($query);
        return $result;
    }

    static function getUser($ID) {
        
        $dbconn = DB::getConnection();
        $query = "SELECT * FROM ticketing.users WHERE id_user = ?";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(1, $ID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    static function addUser($name, $lastname, $email, $phone, $city){
        
        $dbconn = DB::getConnection();
        $query = "INSERT INTO ticketing.users (name,lastname,email,phone,city) 
                  VALUES (:name,:lastname,:email,:phone,:city);";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':city', $city);
        if ($stmt->execute()){
            $lastInsert = $dbconn->lastInsertId();
        return $lastInsert;
        }else {
            return FALSE;
        }
    }

    static function deleteUser($ID){

        $dbconn = DB::getConnection();
        $query = "DELETE FROM ticketing.users WHERE id_user = ?";
        $stmt = $dbconn->prepare($query);
        $stmt ->bindParam(1, $ID);
        $stmt ->execute();
    }
}

