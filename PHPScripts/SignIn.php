<?php

session_start();

$phone = $_POST['userphone'];
$password = md5($_POST['password']);

require_once './conn.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {    
    $tsql = "SELECT * FROM [User] WHERE phone='$phone' AND password='$password' AND IsDeleted=0";

    $stmt = sqlsrv_query($conn, $tsql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if ($row) {
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['UserID'] = ["UserId" => $row['UserId']];
            header('Location: ../pages/MainAfterLogin.php');
            exit();
        }
        else {
            $_SESSION['message'] = 'Błedny numer lub hasło!';
            header('Location: ../pages/Login.php');
            exit();
        }
    }
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>