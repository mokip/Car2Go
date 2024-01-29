<?php
session_start();
require_once './conn.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC GetCarDetails";
    $stmt = sqlsrv_query($conn, $tsql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        $data = array(); 

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        $_SESSION['carDetails'] = $data;

    }
}

sqlsrv_close($conn);
?>
