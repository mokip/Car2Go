<?php
session_start();

$UserId = $_SESSION['UserID']['UserId'];
$orderId = $_POST['orderId'];
require_once './conn.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "EXEC OrderCancelation @UserId=?, @Orderid=?";
    $params = array($UserId, $orderId);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header('Location: ../pages/Orders.php');
        exit();
    }
}
sqlsrv_close($conn);
?>

<pre><?php print_r($OrderId); print_r($CarId);?></pre>
