<?php
session_start();
require_once './conn.php';
$userId = $_SESSION['UserID']['UserId'];
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "SELECT * FROM Orders WHERE UserId='$userId' AND ReservedFrom > GETDATE()";
    $stmt = sqlsrv_query($conn, $tsql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        $rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        var_dump($rows);
    }
}
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>