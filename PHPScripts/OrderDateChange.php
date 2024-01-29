<?php

session_start();

$NewReserveFrom = $_POST['newreservefrom'];
$NewReserveTo = $_POST['newreserveto'];
$OrderId = $_POST['orderId'];

require_once './conn.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC OrderDateChangeCheck @NewReserveFrom = ?, @NewReserveTo = ?, @OrderId = ?";
    $params = array($NewReserveFrom, $NewReserveTo, $OrderId);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    
    $result = sqlsrv_fetch_array($stmt);
    
        if ($result[0] < 3) {
            $tsql = "EXEC OrderDateChange @NewReserveFrom = ?, @NewReserveTo = ?, @OrderId = ?";
            $params = array($NewReserveFrom, $NewReserveTo, $OrderId);
            $stmt = sqlsrv_query($conn, $tsql, $params);
            header('Location: ../pages/Orders.php');
            exit();

        } else {
            header('Location: ../pages/LackOfAvailableCars.html');
            exit();
        }
    }

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>