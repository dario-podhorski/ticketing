<?php 


/**
*Login script
*/

//use app\models;

require_once 'app/models/UsersTable.php';
require_once 'User.php';

session_start();

if (!isset($_SESSION['login'])) {
    $_SESSION['login']=FALSE;
} 


/**
* Database connection
*/
require_once 'database/DB.php';
$link = \database\DB::getConnection();


if ($link->connect_error) { //check database connection
    echo "Database connection failed:". $link->connect_errno;
}


/**
* Get and set variables
*/
$usrname = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_EMAIL);
$pass = filter_input(INPUT_POST, 'password');
//$passHash = password_hash($pass, PASSWORD_DEFAULT);
$resQuery = '';


/**
* Database Query
*/
$queryEmail = "SELECT ticketing.users.id_user FROM ticketing.users WHERE email = :email";
$queryPassword = "SELECT ticketing.password.password FROM ticketing.password WHERE id_user = :ID";

/**
*Perform query on database
*/
if ($stmt = $link->prepare($queryEmail)){
    $stmt->bindParam(':email', $usrname);
    $stmt->execute();
    $resQuery=$stmt->fetch();
    $ID = $resQuery['id_user'];
    }
    else {
        echo "Query failed";
    }


if (isset($ID)) {     
    
    $stmt=$link->prepare($queryPassword);
    $stmt->bindParam(':ID', $ID);
    $stmt->execute();
    $resPassword=$stmt->fetch();
    $hashedPassword = $resPassword['password'];
    
    if (password_verify($pass, $hashedPassword)) {
        
       $adminQuery = "SELECT * FROM admins
                    WHERE id_user = $ID";
        
      if($result = $link->query($adminQuery)){      //Check if user is ADMIN
            $row = $result->fetch();

            if(!empty($row)){    //if ADMIN
            $_SESSION['admin'] = 1;
            $_SESSION['login'] = TRUE;
            $loggedUser = app\models\UsersTable::getUser($ID);     //Get User from mysql
            $adminUser = new User($loggedUser['id_user'], $loggedUser['name'], $loggedUser['lastname'], $loggedUser['email'],
                                $loggedUser['phone'], $loggedUser['city'], $admin = TRUE);   //Create User object
        
            $_SESSION['loggeduser'] = serialize($adminUser);      //store user in session
            header('Location:index1.php');
        
            }
            else {             //if NORMAL user
                $_SESSION['user'] = 1;
                $_SESSION['login'] = TRUE;
                $loggedUser = app\models\UsersTable::getUser($ID);
                $user = new User($users['id_user'], $users['name'], $users['lastname'], $users['email'], $users['phone'], $users['city']);
                $_SESSION['loggeduser'] = serialize($user);
                header('Location:index1.php');
            }
        
    }
    }
    else {    //if login unsuccessful
    unset ($_SESSION['login']);
    header("Location: index1.php?error=1");
    exit;
}
}
 else {    //if login unsuccessful
    unset ($_SESSION['login']);
    header("Location: index1.php?error=1");
    exit;
}

