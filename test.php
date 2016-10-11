<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\models;
require_once 'app/models/CityTable.php';


$gotCity = \app\models\CityTable::getAllCity();

while ($row = $gotCity->fetch(PDO::FETCH_ASSOC)){
echo $row['city'];
}
/*while ($row = $gotCity->fetch(PDO::FETCH_ASSOC)){
                                foreach ($row as $key => $value) {
                                    print_r($row);
                                }
                                }