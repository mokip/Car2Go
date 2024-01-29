<?php
session_start();

$UserId = $_POST['UserId'];
$FirstName = $_POST['newname'];
$EmpId = $_SESSION['EmpId'];


require_once './conn.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC AdminFirstNameChange @UserId=?, @FirstName=?, @EmpId=?";
    $params = array($UserId, $FirstName, $EmpId);
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

