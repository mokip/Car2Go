<?php
session_start();

require_once './conn.php';

$response = array();

if ($conn === false) {
    $response['error'] = sqlsrv_errors();
} else {
    $tsqlDescription = "SELECT [Description] FROM ObjectData WHERE ObjectType='MainDescription'";
    $stmtDescription = sqlsrv_query($conn, $tsqlDescription);

    if ($stmtDescription === false) {
        $response['error'] = sqlsrv_errors();
    } else {
        $rowDescription = sqlsrv_fetch_array($stmtDescription, SQLSRV_FETCH_ASSOC);
        $description = $rowDescription['Description'];

        $tsqlContact = "SELECT [Description] FROM ObjectData WHERE ObjectType='MainContact'";
        $stmtContact = sqlsrv_query($conn, $tsqlContact);

        if ($stmtContact === false) {
            $response['error'] = sqlsrv_errors();
        } else {
            $rowContact = sqlsrv_fetch_array($stmtContact, SQLSRV_FETCH_ASSOC);
            $contact = $rowContact['Description'];

            $_SESSION['description'] = $description;
            $_SESSION['contact'] = $contact;

            $response['description'] = $description;
            $response['contact'] = $contact;
        }
    }
}

sqlsrv_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
