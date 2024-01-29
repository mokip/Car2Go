<?php
session_start();

$UserId = $_POST['UserId'];
$Licence = $_POST['LicenseNumber'];
$EmpId = $_SESSION['EmpId'];

require_once './conn.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC AdminLicenceNumberChange @UserId=?, @Licence=?, @EmpId=?";
    $params = array($UserId, $Licence, $EmpId);
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

