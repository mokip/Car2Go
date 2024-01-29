<?php
session_start();
$EmpId = $_SESSION['EmpId'];
$UserId = $_POST['UserId'];
$password = $_POST['password'];

require_once './conn.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $password = md5($password);

    $tsql = "EXEC PasswordChange @UserId=?, @EmpId=?, @Password=?";

    $params = array($UserId, $EmpId, $password);

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