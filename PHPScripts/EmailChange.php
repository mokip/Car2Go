<?php
session_start();

$UserId = $_SESSION['UserID']['UserId'];
$Email = $_POST['email'];
require_once './conn.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC EmailChange @UserId=?, @Email=?";
    $params = array($UserId, $Email);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header('Location: ../pages/PersonalData.php');
        exit();
    }
}
sqlsrv_close($conn);
?>

