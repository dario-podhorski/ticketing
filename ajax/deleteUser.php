<?php
/**
 * Created by PhpStorm.
 * User: Dario
 * Date: 7.9.2016.
 * Time: 14:01
 */

use app\models;
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\app\models\UsersTable.php';

$ID = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);

app\models\UsersTable::deleteUser($ID);