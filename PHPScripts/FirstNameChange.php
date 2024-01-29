<?php
session_start();

$UserId = $_SESSION['UserID']['UserId'];
$FirstName = $_POST['name'];
$EmpId = isset($EmpId) ? $EmpId : null; 

require_once './conn.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC FirstNameChange @UserId=?, @FirstName=?, @EmpId=?";
    $params = array($UserId, $FirstName,$EmpId);
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

