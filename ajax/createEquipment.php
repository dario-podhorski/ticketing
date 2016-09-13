<?php
/**
 * Created by PhpStorm.
 * User: Dario
 * Date: 13.9.2016.
 * Time: 14:04
 */

use app\models;
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\app\models\EquipmentTable.php';

$serial = filter_input(INPUT_POST, 'serialNum', FILTER_SANITIZE_STRING);
$partNum = filter_input(INPUT_POST,'partNum', FILTER_SANITIZE_STRING);
$eqName = filter_input(INPUT_POST,'equipName', FILTER_SANITIZE_STRING);
$warrStart = filter_input(INPUT_POST, 'warrStart', FILTER_SANITIZE_NUMBER_FLOAT);
$warrEnd = filter_input(INPUT_POST, 'warrEnd', FILTER_SANITIZE_NUMBER_FLOAT);


if (app\models\EquipmentTable::addEquipment($serial, $partNum, $eqName, $warrStart, $warrEnd)){
    echo "Equipment added";
}  else {
    echo "Failed adding equipment";
}