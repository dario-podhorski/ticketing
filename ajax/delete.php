<?php
/**
 * Created by PhpStorm.
 * User: Dario
 * Date: 7.9.2016.
 * Time: 14:01
 */

use app\models;
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\app\models\UsersTable.php';
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\app\models\EquipmentTable.php';

if (isset($_POST['id'])){
$ID = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);

app\models\UsersTable::deleteUser($ID);
}

if (isset($_POST['serial'])){
$serial = filter_input(INPUT_POST,'serial', FILTER_SANITIZE_STRING);

app\models\EquipmentTable::deleteEquipment($serial);
}