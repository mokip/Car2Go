<?php

$serverName = "HEI2ORS\CAR_RENTAL";
$connectionInfo = array("Database"=>"car-renting-shop-com_testing", "UID"=>"kyrylokyrylo", "PWD"=>"P@ssw0rd");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if(!$conn) {
    echo "Errors:";
    die(print_r(sqlsrv_errors(), true));
} 
?>
