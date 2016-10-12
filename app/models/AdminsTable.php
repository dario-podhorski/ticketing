<?php

/* 
 * 
 */
namespace app\models;
use database\DB;
use PDO;
require_once 'database/DB.php';

class AdminsTable {
    
    static function getAllAdmins(){

        $dbconn = DB::getConnection();
        $query = "SELECT * FROM ticketing.admins";
        $result = $dbconn->query($query);
        return $result;
    }
    
    static function getAdmin($ID){

        $dbconn = DB::getConnection();
        $query = "SELECT * FROM ticketing.admins WHERE id_user = ?";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(1, $ID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    static function addAdmin($ID){
        
        $dbconn = DB::getConnection();
        $query= "INSERT INTO ticketing.admins (id_user) VALUES (:ID)";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(':ID', $ID);
        if ($stmt->execute()){
        return TRUE;
        }else {
            return FALSE;
        }
    }
    
    static function deleteAdmin($ID){
        
        $dbconn = DB::getConnection();
        $query= "DELETE FROM ticketing.admins WHERE id_user = ?";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(1, $ID);
        $stmt->execute();
        
         
    }
}