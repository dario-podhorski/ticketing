<?php

session_start();

/**
 * Unserialize User from session
 */
require_once 'User.php';
require_once 'database/DB.php';

$adminUser = unserialize($_SESSION['loggeduser']);

$userID = $adminUser->getID();
$userName = $adminUser->getName();
$userLastName = $adminUser->getLastName();


/**
 * Include View for admin pages
 */
include_once 'view/admin_view.php';


/**
 * If Add User include add user form view
 */
if (isset($_GET['addUser'])){
    require_once 'app/models/CityTable.php';
    $gotCity = \app\models\CityTable::getAllCity();
    include_once 'view/addUser_view.php';
}

if (isset ($_GET['deleteUser'])) {
    require_once 'app/models/UsersTable.php';
    $gotUsers =  \app\models\UsersTable::getAllUsers();
    if (isset($_GET["ID"])){
        $ID = $_GET["ID"];
    
    $getUser = \app\models\UsersTable::getUser($ID);
    
    }
    include_once 'view/deleteUser_view.php';
    
}

if (isset($_GET['addEquipment'])){
    include_once 'view/addEquipment_view.php';
}

if (isset($_GET['deleteEquipment'])){
    
    require_once 'app/models/EquipmentTable.php';
    $gotEquip = \app\models\EquipmentTable::getAllEquipment();
    $serial = $_GET["Serial"];
    $getEquip = \app\models\EquipmentTable::getEquipment($serial);
    include_once 'view/deleteEquipment_view.php';
}

if (isset($_GET['addCity'])){
    require_once 'app/models/CityTable.php';
    $gotCity = \app\models\CityTable::getAllCity();
    include_once 'view/addCity_view.php';
}

?>

<!-- <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title></title>
     </head>
     <body>
     <a href="logout.php">Logout</a>
     </body>
 </html> !-->