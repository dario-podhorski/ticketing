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
}elseif (isset ($_GET['deleteUser'])) {
    require_once 'app/models/UsersTable.php';
    $gotUsers =  \app\models\UsersTable::getAllUsers();
    include_once 'view/deleteUser_view.php';
    while ($row = $gotUsers->fetch(PDO::FETCH_ASSOC)){
    foreach ($row as $key => $value) {
        echo '<pre>';
        echo $row['id_user'];
        echo '</pre>';
    }};
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