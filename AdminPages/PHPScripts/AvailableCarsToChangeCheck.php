<?php

session_start();

$WantToReserveFrom = $_POST['wanttoreservefrom'];
$WantToReserveTo = $_POST['wanttoreserveto'];

$_SESSION['wanttoreservefrom'] = $WantToReserveFrom;
$_SESSION['wanttoreserveto'] = $WantToReserveTo;

$Car = $_POST['Car'];
$OrderId = $_POST['OrderId'];

$_SESSION['Car'] = $Car;
$_SESSION['OrderId'] = $OrderId;

require_once './conn.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC ShowAvailableCarsBeforeOrder @WantToReserveFrom = ?, @WantToReserveTo = ?";
    $params = array($WantToReserveFrom, $WantToReserveTo);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        $carIds = array();

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $carId = $row['Model'];
            $carIds[] = $carId;
        }

        if (empty($carIds)) {
            header('Location: ../pages/LackOfAvailableCars.html');
            exit();
        } else {
            $redirectURL = '../pages/AvailableCarsToChange.php#' . implode(',', $carIds);
            header('Location: ' . $redirectURL);
            exit();
        }
    }
}

sqlsrv_close($conn);  

?>