<?php
session_start();
require_once './conn.php';

$EmpId = $_SESSION['EmpId'];
$newPrice = isset($_POST['value']) ? $_POST['value'] : null;
$ObjectId = isset($_POST['ObjectId']) ? (int)$_POST['ObjectId'] : null;

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $type = $_POST['type'];
        $newPrice = $_POST['value'];
        updateDescription( $newPrice, $ObjectId, $EmpId, $conn);
    }
}

function updateDescription($newPrice, $objectId, $EmpId, $conn) {
    $tsqlUpdate = "EXEC CarPriceChanges @NewPricePerDay = ?, @CarModel = ?, @LastModifiedByEmpId = ?";
    $params = array(&$newPrice, &$objectId, &$EmpId);
    $stmtUpdate = sqlsrv_query($conn, $tsqlUpdate, $params);

    if ($stmtUpdate === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Cena zaktualizowana pomyślnie!";
}

sqlsrv_close($conn);
?>
