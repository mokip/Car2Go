<?php
session_start();
require_once './conn.php';

$response = array();

if ($conn === false) {
    $response['error'] = sqlsrv_errors();
} else {
    $categories = array(
        'orderphone' => 'ContactOrderIssuesPhone',
        'ordermail' => 'ContactOrderIssuesEmail',
        'carphone' => 'ContactCarIssuesPhone',
        'caremail' => 'ContactCarIssuesEmail',
        'contactaddress' => 'ContactAddress',
        'wrkghours' => 'ContactWorkingHours'
    );

    foreach ($categories as $key => $category) {
        $tsql = "SELECT [Description] FROM ObjectData WHERE ObjectType=?";
        $stmt = sqlsrv_query($conn, $tsql, array($category));

        if ($stmt === false) {
            $response['error'] = sqlsrv_errors();
            break;
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        $_SESSION[$key] = $row['Description'];
        $response[$key] = $row['Description'];
    }
}

sqlsrv_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
