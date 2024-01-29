<?php
session_start();
require_once './conn.php';

$EmpId = $_SESSION['EmpId'];
$Description = isset($_POST['value']) ? $_POST['value'] : null;
$ObjectId = isset($_POST['ObjectId']) ? (int)$_POST['ObjectId'] : null;
$ObjectType = isset($_POST['type']) ? $_POST['type'] : null;

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $type = $_POST['type'];
        $value = $_POST['value'];
        updateDescription($type, $value, $ObjectId, $EmpId, $conn); // Dodano $conn jako argument
    }
}

function updateDescription($type, $value, $objectId, $EmpId, $conn) {
    switch ($type) {
        case 'MainDescription':
            $ObjectType = 'MainDescription';
            break;
        case 'MainContact':
            $ObjectType = 'MainContact';
            break;
        case 'ContactOrderIssuesPhone':
            $ObjectType = 'ContactOrderIssuesPhone';
            break;
        case 'ContactOrderIssuesEmail':
            $ObjectType = 'ContactOrderIssuesEmail';
            break;
        case 'ContactCarIssuesPhone':
            $ObjectType = 'ContactCarIssuesPhone';
            break;
        case 'ContactCarIssuesEmail':
            $ObjectType = 'ContactCarIssuesEmail';
            break;
        case 'ContactAddress':
            $ObjectType = 'ContactAddress';
            break;
        case 'ContactWorkingHours':
            $ObjectType = 'ContactWorkingHours';
            break;
        default:
            $ObjectType = 'description';
            break;
    }
    

    $tsqlUpdate = "EXEC DataUpdate @ObjectType = ?, @ObjectId = ?, @DescriptionNew = ?, @LastModifiedByEmpId = ?";
    $params = array(&$ObjectType, &$objectId, &$value, &$EmpId);
    $stmtUpdate = sqlsrv_query($conn, $tsqlUpdate, $params);

    if ($stmtUpdate === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Opis zaktualizowany pomyślnie!";
}

sqlsrv_close($conn);
?>
