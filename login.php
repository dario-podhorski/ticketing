<?php

require_once 'data/db_conn.php';
$link = new mysqli($host, $user, $password, $database); //DB connection


if ($link->connect_error) { //check database connection
    echo "Database connection failed:". $link->connect_errno;
}
else {
    echo "Database connection successful";
}

//variables
$username = $_POST['username'];
$password = $_POST['password'];
$res_query = '';

//echo $username."<br>";
//echo $password."<br>";

$query = "SELECT korisnici.id_korisnik FROM korisnici
JOIN password on korisnici.id_korisnik = password.id_korisnik
WHERE email =? AND password= ?";

//echo $query."<br>";

if ($stmt = $link->prepare($query)){
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($ID);
    $stmt->fetch();
    $res_query = $ID; //sets query result into variable
    $stmt->close();
    }
    else {
        echo "neuspjeli upit";
    }

//check if user is logges in and if is administrator
if (isset($res_query)) {
    //echo "Login succesfull"; //višak
    //echo "<hr>"; //višak
    $admin_query = "SELECT * FROM administratori
                    WHERE id_korisnik = $res_query";
    //echo $admin_query."<br>"; //višak

    if($result = $link->query($admin_query)){
        $row = $result->fetch_array();
        //echo $row[0]."<br>"; //višak
        if(!empty($row)){
        header("Location: admin_page.php");
        exit;
        }
        else {
            header("Location: user_page.php");
            exit;
        }
        $result->close();
    }

}

else {
    header("Location: index1.php?error=1");
    exit;
}
?>
