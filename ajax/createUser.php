<?php

/* 
 * Script for adding USERS through ajax
 */

use app\models;
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\app\models\UsersTable.php';

    $name = filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST,'lastName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_NUMBER_INT);
    $city = $_POST['city'];
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    
    if (app\models\UsersTable::addUser($name, $lastName, $email, $phone, $city)){
        echo "User added";
    }  else {
        echo "Failed adding user";
    }
