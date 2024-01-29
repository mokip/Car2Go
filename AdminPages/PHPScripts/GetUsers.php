<?php

require_once '../php/conn.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC GetUserList";
    $stmt = sqlsrv_query($conn, $tsql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        $data = array(); 

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        echo json_encode($data);
    }
}

sqlsrv_close($conn);
?>
