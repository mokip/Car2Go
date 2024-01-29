<?php

$BirthDate = $_POST['birthdate'];
$firstName = $_POST['username'];
$lastName = $_POST['usersurname'];
$email = $_POST['useremail'];
$phone = $_POST['userphone'];
$drivingLicense = $_POST['userdoc'];
$password = $_POST['password'];

require_once './conn.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $password = md5($password);

    $tsql = "EXEC UserAdd @BirthDate=?, @FirstName=?, @LastName=?, @Email=?, @Phone=?, @DrivingLicense=?, @Password=?";

    $params = array($BirthDate, $firstName, $lastName, $email, $phone, $drivingLicense, $password);

    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header('Location: ../pages/Login.php');
        exit();
    }
}
sqlsrv_close($conn);  
?>