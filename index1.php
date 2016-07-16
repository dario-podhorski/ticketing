<?php

/**
*Main login
*/

session_start();

if (empty($_SESSION['loggeduser'])) {
    include "view/login_view.php";
}
else {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
        header('Location: admin_page.php');
        exit;
    }
    else if (isset($_SESSION['user']) && $_SESSION['user'] == 1){
        header('Location: user_page.php');
        exit;
    }
    
}
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title></title>
     </head>
     <body>
     <a href="logout.php">Logout</a>
     </body>
 </html>
