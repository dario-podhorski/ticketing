<?php

session_start();

/**
 * Unserialize User from session
 */
require_once 'User.php';

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
    include_once 'view/addUser_view.php';
}


if (isset($_POST['sub_bttn'])){
    $name = filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST,'lastName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_NUMBER_INT);
    $city = $_POST['city'];
    $password = $_POST['password'];
    
    /*require_once 'app/models/UsersTable.php';
    if (app\models\UsersTable::addUser($name, $lastName, $email, $phone, $city)){
        echo 'User added succesfully';
    }  else {
        echo 'Failed adding user';
    }*/

 //print_r($_POST);
    
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