<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\models\UsersTable;
require_once 'app/models/UsersTable.php';
require_once 'User.php';

$users=  UsersTable::getUser(1);
echo "<pre>";
print_r($users);
echo "</pre>";

$user = new User($users['id_user'], $users['name'], $users['lastname'], $users['email'], $users['phone'], $users['city']);


echo '<pre>';
var_dump($user);
echo '</pre>';