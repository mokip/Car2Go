<?php
session_start();

$UserId = $_SESSION['UserID']['UserId'];
$LastName = $_POST['surname'];
require_once './conn.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC LastNameChange @UserId=?, @LastName=?";
    $params = array($UserId, $LastName);
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

