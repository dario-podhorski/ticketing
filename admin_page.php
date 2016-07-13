<?php

session_start();


require 'User.php';

$adminUser = unserialize($_SESSION['loggeduser']);

$userID = $adminUser->getID();
$userName = $adminUser->getName();
$userLastName = $adminUser->getLastName();

include 'view/admin_view.php';

if (isset($_GET['addUser'])){
    include 'view/addUser_view.php';
}


    print_r($_POST);


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