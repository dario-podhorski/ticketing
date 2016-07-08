<?php

session_start();

require 'User.php';

$adminUser = unserialize($_SESSION['loggeduser']);

$id = $adminUser->getID();
$name = $adminUser->getName();
$lastName = $adminUser->getLastName();

include 'view/admin_view.php';
