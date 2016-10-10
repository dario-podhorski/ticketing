<?php
/**
 * 
 */

namespace app\models;
use database\DB;
use PDO;
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\database\DB.php';

class CityTable
{
    static function getAllCity(){

        $dbconn = DB::getConnection();
        $query = "SELECT * FROM ticketing.city";
        $result = $dbconn->query($query);
        return $result;
    }

    static function getCity($city){

        $dbconn = DB::getConnection();
        $query = "SELECT * FROM ticketing.city WHERE city = ?";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(1, $city);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    static function addCity($city, $region){

        $dbconn = DB::getConnection();
        $query = "INSERT INTO ticketing.city (city, region) 
                  VALUES (:city,:region)";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':region', $region);
        if ($stmt->execute()){
            return TRUE;
        }else {
            return FALSE;
        }
    }

    static function deleteCity($city){

        $dbconn = DB::getConnection();
        $query = "DELETE FROM ticketing.city WHERE city = ?";
        $stmt = $dbconn->prepare($query);
        $stmt ->bindParam(1, $city);
        $stmt ->execute();
    }
}
