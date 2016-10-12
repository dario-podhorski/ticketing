<?php
/**
 * 
 */

use app\models;
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\app\models\UsersTable.php';
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\app\models\EquipmentTable.php';
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\app\models\PasswordTable.php';

if (isset($_POST['id'])){
    $ID = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);

    app\models\UsersTable::deleteUser($ID);
    app\models\PasswordTable::deletePassword($ID);
}

if (isset($_POST['serial'])){
    $serial = filter_input(INPUT_POST,'serial', FILTER_SANITIZE_STRING);

    app\models\EquipmentTable::deleteEquipment($serial);
}