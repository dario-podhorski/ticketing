<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//use \database\DB;
//include_once 'database/db_conn.php';

/*$dbconn=  DB::getConnection();

$query="SELECT * FROM ticketing.users WHERE id_user = '2'";

$stmt = $dbconn->query($query);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($result);
echo '</pre>';*/


use app\models\UsersTable;
require_once 'app/models/UsersTable.php';

$users=  UsersTable::getUser(1);
echo "<pre>";
print_r($users);
echo "</pre>";
