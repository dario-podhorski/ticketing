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
$passHash = password_hash($pass, PASSWORD_DEFAULT);
$res_query = '';


/**
* Database Query
*/
$query = "SELECT users.id_user FROM users
JOIN password on users.id_user = password.id_user
WHERE email =? AND password=?";


/**
*Perform query on database
*/
if ($stmt = $link->prepare($query)){
    $stmt->bindParam(1, $usrname);
    $stmt->bindParam(2, $pass);
    $stmt->execute();
    $res_query=$stmt->fetch();
    $ID = $res_query['id_user'];
    }
    else {
        echo "Query failed";
    }

/**
* Check if loggin successful and is user ADMIN
*/
if (isset($ID)) {     //If login successful

    $admin_query = "SELECT * FROM admins
                    WHERE id_user = $ID";


    if($result = $link->query($admin_query)){      //Check if user is ADMIN
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

