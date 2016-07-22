<?php

namespace app\models;
use database\DB;
use PDO;
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\database\DB.php';

/**
 * Description of UsersTable
 * Model for getting data from users table in database
 * @author Dario
 */

class UsersTable {
    
    
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
        if (!$dbconn){    
        return FALSE;
        }else {
        $query = "INSERT INTO ticketing.users (name,lastname,email,phone,city) VALUES (:name,:lastname,:email,:phone,:city);
                  ";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':city', $city);
        if ($stmt->execute()){
        return TRUE;
        }else {
            return FALSE;
        }
    }    
}
}
