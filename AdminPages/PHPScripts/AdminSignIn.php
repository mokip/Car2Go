<?php

session_start();

$email = $_POST['useremail'];
$password = md5($_POST['password']);

require_once './conn.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {    
    $tsql = "SELECT * FROM [Employee] WHERE email='$email' AND password='$password' AND IsDeleted=0";

    $stmt = sqlsrv_query($conn, $tsql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if ($row) {
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['EmpId'] = $row['EmpId'];
            header('Location: ../pages/AdminMainAfterLogin.php');
            exit();
        }
        else {
            $_SESSION['message'] = 'Błedny email lub hasło!';
            header('Location: ../adminlogin.php');
            exit();
        }
    }
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>