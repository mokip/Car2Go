<?php

session_start();

$OrderId = $_SESSION['OrderId'];
$CarModel = $_POST['carid'];
$UserId = $_SESSION['UserID']['UserId'];

$GPS = isset($_POST['GPS']) ? 1 : 0;
$Neon = isset($_POST['Neon']) ? 1 : 0;
$Spotify = isset($_POST['Spotify']) ? 1 : 0;
$Autopilot = isset($_POST['Autopilot']) ? 1 : 0;
$AutomatiParking = isset($_POST['AutomatiParking']) ? 1 : 0;
$SeatHeating = isset($_POST['SeatHeating']) ? 1 : 0;

require_once './conn.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC OrderCarChange @OrderId = ?, @CarModel = ?";
    $params = array($OrderId, $CarModel);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        if ($GPS === 1) {
            $tsql_GPSfeature = "EXEC GPSFeatureAddOnceOrderIsCreated @UserId = ?, @OrderId = ?";
            $params_GPSfeature = array($UserId, $OrderId);
            $stmt_GPSfeature = sqlsrv_query($conn, $tsql_GPSfeature, $params_GPSfeature);
            if ($stmt_GPSfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }
        if ($Neon === 1) {
            $tsql_Neonfeature = "EXEC NeonFeatureAddOnceOrderIsCreated @UserId = ?, @OrderId = ?";
            $params_Neonfeature = array($UserId, $OrderId);
            $stmt_Neonfeature = sqlsrv_query($conn, $tsql_Neonfeature, $params_Neonfeature);
            if ($stmt_Neonfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }  
        if ($Spotify === 1) {
            $tsql_Spotifyfeature = "EXEC SpotifyFeatureAddOnceOrderIsCreated @UserId = ?, @OrderId = ?";
            $params_Spotifyfeature = array($UserId, $OrderId);
            $stmt_Spotifyfeature = sqlsrv_query($conn, $tsql_Spotifyfeature, $params_Spotifyfeature);
            if ($stmt_Spotifyfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }  
        if ($Autopilot === 1) {
            $tsql_Autopilotfeature = "EXEC AutopilotFeatureAddOnceOrderIsCreated @UserId = ?, @OrderId = ?";
            $params_Autopilotfeature = array($UserId, $OrderId);
            $stmt_Autopilotfeature = sqlsrv_query($conn, $tsql_Autopilotfeature, $params_Autopilotfeature);
            if ($stmt_Autopilotfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }  
        if ($AutomatiParking === 1) {
            $tsql_AutomatiParkingfeature = "EXEC AutomatiParkingFeatureAddOnceOrderIsCreated @UserId = ?, @OrderId = ?";
            $params_AutomatiParkingfeature = array($UserId, $OrderId);
            $stmt_AutomatiParkingfeature = sqlsrv_query($conn, $tsql_AutomatiParkingfeature, $params_AutomatiParkingfeature);
            if ($stmt_AutomatiParkingfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }  
        if ($SeatHeating === 1) {
            $tsql_SeatHeatingfeature = "EXEC SeatHeatingFeatureAddOnceOrderIsCreated @UserId = ?, @OrderId = ?";
            $params_SeatHeatingfeature = array($UserId, $OrderId);
            $stmt_SeatHeatingfeature = sqlsrv_query($conn, $tsql_SeatHeatingfeature, $params_SeatHeatingfeature);
            if ($stmt_SeatHeatingfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }      
        header('Location: ../pages/CarSuccessfullyChanged.php');
        exit();
    }
}
sqlsrv_close($conn);  

?>