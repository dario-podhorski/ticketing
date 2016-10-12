<?php
/**
 * 
 */

namespace app\models;
use database\DB;
use PDO;
require_once 'database/DB.php';

class EquipmentTable
{
    static function getAllEquipment(){

        $dbconn = DB::getConnection();
        $query = "SELECT * FROM ticketing.equipment";
        $result = $dbconn->query($query);
        return $result;
    }

    static function getEquipment($serial){

        $dbconn = DB::getConnection();
        $query = "SELECT * FROM ticketing.equipment WHERE serial_num = ?";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(1, $serial);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    static function addEquipment($serial, $part, $name, $warrStart, $warrEnd){

        $dbconn = DB::getConnection();
        $query = "INSERT INTO ticketing.equipment (serial_num,part_num,equip_name,warr_start_date,warr_end_date) 
                  VALUES (:serial_num,:part_num,:equip_name,:warr_start_date,:warr_end_date);";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(':serial_num', $serial);
        $stmt->bindParam(':part_num', $part);
        $stmt->bindParam(':equip_name', $name);
        $stmt->bindParam(':warr_start_date', $warrStart);
        $stmt->bindParam(':warr_end_date', $warrEnd);
        if ($stmt->execute()){
            return TRUE;
        }else {
            return FALSE;
        }
    }

    static function deleteEquipment($serial){

        $dbconn = DB::getConnection();
        $query = "DELETE FROM ticketing.equipment WHERE serial_num = ?";
        $stmt = $dbconn->prepare($query);
        $stmt ->bindParam(1, $serial);
        $stmt ->execute();
    }
}