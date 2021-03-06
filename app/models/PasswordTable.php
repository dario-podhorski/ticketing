<?php

/**
 * Description of passwordTable
 * Model table in database
 * @author Dario
 */

namespace app\models;
use database\DB;
use PDO;
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\database\DB.php';

class PasswordTable {
    
    static function getPassword($ID){
        
        $dbconn = DB::getConnection();
        $query = "SELECT * FROM ticketing.password WHERE id_user=?";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(1, $ID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    static function addPassword($ID, $password){
        
        $dbconn = DB::getConnection();
        $query= "INSERT INTO ticketing.password (id_user, password) VALUES (:ID, :password)";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(':ID', $ID);
        $stmt->bindParam(':password', $password);
        if ($stmt->execute()){
        return TRUE;
        }else {
            return FALSE;
        }
        
        
    }
}



