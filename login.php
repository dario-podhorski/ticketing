<?php 

/**
*Login script
*/
session_start();

if (!filter_has_var(INPUT_SESSION,'login')) {
    $_SESSION['login']=false;
} 


/**
* Database connection
*/
require_once 'database/db_conn.php';
$link = new PDO("mysql:host=$host;dbname=$database", $user, $password);


if ($link->connect_error) { //check database connection
    echo "Database connection failed:". $link->connect_errno;
}


/**
* Get and set variables
*/
$usrname = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_EMAIL);
$pass = filter_input(INPUT_POST, 'password');
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


    if($result = $link->query($admin_query)){
        $row = $result->fetch();

        if(!empty($row)){    //if ADMIN
        $_SESSION['admin'] = 1;
        header('Location:index1.php');
        }
        else {             //if NORMAL user
            $_SESSION['user'] = 1;
            header('Location:index1.php');
        }
        $result->close();
    }

}

 else {    //if login unsuccessful
    unset ($_SESSION['login']);
    header("Location: index1.php?error=1");
    exit;
}
?>
