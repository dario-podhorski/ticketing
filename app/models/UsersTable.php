<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use database\DB;
use PDO;
require_once 'database/db_conn.php';
/**
 * Description of UsersTable
 *
 * @author Dario
 */
class UsersTable {
    
    
    static function getUser($ID) {
        
        $dbconn = DB::getConnection();
        $query = "SELECT * FROM ticketing.users WHERE id_user = $ID";
        $stmt = $dbconn->query($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
