<?php

use app\models;
require_once 'D:\Dropbox\__programiranje\HTML\_PROJEKT\ticketing\app\models\CityTable.php';


    $city = filter_input(INPUT_POST,'city', FILTER_SANITIZE_STRING);
    $region = filter_input(INPUT_POST,'region', FILTER_SANITIZE_STRING);
    
    
    
    if (app\models\CityTable::addCity($city, $region)){
        echo "City added";
    }  else {
        echo "Failed adding city";
    }

