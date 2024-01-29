<?php
session_start();

$UserId = $_SESSION['UserID']['UserId'];
$Licence = $_POST['LicenseNumber'];
require_once './conn.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC LicenceNumberChange @UserId=?, @Licence=?";
    $params = array($UserId, $Licence);
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

