<?php

session_start();

$ReservedFrom = $_POST['reservedfrom'];
$ReservedTo = $_POST['reservedto'];
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
    $tsql = "EXEC OrderCreation @UserId = ?, @CarModel = ?, @ReservedFrom = ?, @ReservedTo = ?";
    $params = array($UserId, $CarModel, $ReservedFrom, $ReservedTo);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        if ($GPS === 1) {
            $tsql_GPSfeature = "EXEC GPSFeatureAdd @UserId = ?";
            $params_GPSfeature = array($UserId);
            $stmt_GPSfeature = sqlsrv_query($conn, $tsql_GPSfeature, $params_GPSfeature);
            if ($stmt_GPSfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }
        if ($Neon === 1) {
            $tsql_Neonfeature = "EXEC NeonFeatureAdd @UserId = ?";
            $params_Neonfeature = array($UserId);
            $stmt_Neonfeature = sqlsrv_query($conn, $tsql_Neonfeature, $params_Neonfeature);
            if ($stmt_Neonfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }  
        if ($Spotify === 1) {
            $tsql_Spotifyfeature = "EXEC SpotifyFeatureAdd @UserId = ?";
            $params_Spotifyfeature = array($UserId);
            $stmt_Spotifyfeature = sqlsrv_query($conn, $tsql_Spotifyfeature, $params_Spotifyfeature);
            if ($stmt_Spotifyfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }  
        if ($Autopilot === 1) {
            $tsql_Autopilotfeature = "EXEC AutopilotFeatureAdd @UserId = ?";
            $params_Autopilotfeature = array($UserId);
            $stmt_Autopilotfeature = sqlsrv_query($conn, $tsql_Autopilotfeature, $params_Autopilotfeature);
            if ($stmt_Autopilotfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }  
        if ($AutomatiParking === 1) {
            $tsql_AutomatiParkingfeature = "EXEC AutomatiParkingFeatureAdd @UserId = ?";
            $params_AutomatiParkingfeature = array($UserId);
            $stmt_AutomatiParkingfeature = sqlsrv_query($conn, $tsql_AutomatiParkingfeature, $params_AutomatiParkingfeature);
            if ($stmt_AutomatiParkingfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }  
        if ($SeatHeating === 1) {
            $tsql_SeatHeatingfeature = "EXEC SeatHeatingFeatureAdd @UserId = ?";
            $params_SeatHeatingfeature = array($UserId);
            $stmt_SeatHeatingfeature = sqlsrv_query($conn, $tsql_SeatHeatingfeature, $params_SeatHeatingfeature);
            if ($stmt_SeatHeatingfeature === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }      
        header('Location: ../pages/Summarize.php');
        exit();
    }
}
sqlsrv_close($conn);  

?>