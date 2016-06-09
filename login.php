<?php

/**
*Login script
*/
session_start();

if (!isset($_SESSION['login'])) {
    $_SESSION['login']=false;
}


/**
* Database connection
*/
require_once 'data/db_conn.php';
$link = new mysqli($host, $user, $password, $database);


if ($link->connect_error) { //check database connection
    echo "Database connection failed:". $link->connect_errno;
}



/**
* Get and set variables
<<<<<<< HEAD
**********************/
$username = $_SESSION['username'];
$password = $_SESSION['password'];
=======
*/
$username = $_POST['username'];
$password = $_POST['password'];
>>>>>>> refs/remotes/origin/master
$res_query = '';



/**
* Database Query
*/
$query = "SELECT korisnici.id_korisnik FROM korisnici
JOIN password on korisnici.id_korisnik = password.id_korisnik
WHERE email =? AND password= ?";


<<<<<<< HEAD
=======

>>>>>>> refs/remotes/origin/master
/**
*Perform query on database
*/
if ($stmt = $link->prepare($query)){
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($ID);
    $stmt->fetch();
    $res_query = $ID; //sets query result into variable
    $stmt->close();
    }
    else {
        echo "Query failed";
    }

echo $res_query;

/**
* Check if loggin successful and is user ADMIN
*/
if (isset($res_query)) {     //If login successful

    $admin_query = "SELECT * FROM administratori
                    WHERE id_korisnik = $res_query";


    if($result = $link->query($admin_query)){
        $row = $result->fetch_array();

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
