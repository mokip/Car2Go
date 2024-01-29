<?php

require_once '../../php/conn.php';

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

$userId = isset($_GET['userid']) ? $_GET['userid'] : null;

if ($userId) {
    $userId = intval($userId);

    $tsql1 = "SELECT * FROM [User] WHERE UserId = ?";
    $tsql2 = "EXEC ShowActive @UserId = ?";
    $tsql3 = "EXEC ShowPast @UserId = ?";
    $tsql4 = "EXEC ShowFuture @UserId = ?";
    $tsql5 = "EXEC ShowCanceled @UserId = ?";

    $params = array($userId);

    $stmt1 = sqlsrv_query($conn, $tsql1, $params);

    if ($stmt1 === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $userData = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC);

    $stmt2 = sqlsrv_query($conn, $tsql2, $params);
    if ($stmt2 === false) {
        $errors = sqlsrv_errors();
        $activeOrders = 'Nie masz anulowanych rezerwacji'; // Brak aktywnych zamówień
    } else {
        $activeOrders = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);
    }

    $stmt3 = sqlsrv_query($conn, $tsql3, $params);
    if ($stmt3 === false) {
        $errors = sqlsrv_errors();
        if ($errors[0]['SQLSTATE'] !== '01000') {
            die(print_r($errors, true));
        }
        $pastOrders = null;
    } else {
        $pastOrders = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC);
    }

    $stmt4 = sqlsrv_query($conn, $tsql4, $params);
    if ($stmt4 === false) {
        $errors = sqlsrv_errors();
        if ($errors[0]['SQLSTATE'] !== '01000') {
            die(print_r($errors, true));
        }
        $futureOrders = null;
    } else {
        $futureOrders = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC);
    }

    $stmt5 = sqlsrv_query($conn, $tsql5, $params);
    if ($stmt5 === false) {
        $errors = sqlsrv_errors();
        if ($errors[0]['SQLSTATE'] !== '01000') {
            die(print_r($errors, true));
        }
        $canceledOrders = null;
    } else {
        $canceledOrders = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC);
    }

    session_start();
    $_SESSION['userData'] = $userData;
    $_SESSION['activeOrders'] = $activeOrders;
    $_SESSION['pastOrders'] = $pastOrders;
    $_SESSION['futureOrders'] = $futureOrders;
    $_SESSION['canceledOrders'] = $canceledOrders;

    header("Location: ../pages/users/userdata.php?UserId=$userId");
    exit();
} else {
    echo "Brak identyfikatora użytkownika.";
}

sqlsrv_close($conn);
?>
