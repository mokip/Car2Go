<?php
session_start();

$UserId = $_POST['UserId'];
$LastName = $_POST['surname'];
$EmpId = $_SESSION['EmpId'];


require_once './conn.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC AdminLastNameChange @UserId=?, @LastName=?, @EmpId=?";
    $params = array($UserId, $LastName, $EmpId);
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

