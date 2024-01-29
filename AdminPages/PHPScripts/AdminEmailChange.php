<?php
session_start();
$UserId = $_POST['UserId'];
$Email = $_POST['email'];
$EmpId = $_SESSION['EmpId'];
require_once './conn.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC AdminEmailChange @UserId=?, @Email=?, @EmpId=?";
    $params = array($UserId, $Email, $EmpId);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header("Location: ../pages/users/userdata.php?UserId=" . $UserId);
        exit();
    }
}
sqlsrv_close($conn);
?>

