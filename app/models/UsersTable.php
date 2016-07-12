<?php

namespace app\models;
use database\DB;
use PDO;
require_once 'database/DB.php';

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
    
    
}
