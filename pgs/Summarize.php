<?php

session_start();
$UserId = $_SESSION['UserID']['UserId'];

require_once '../php/conn.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $tsql = "SELECT TOP 1 TotalPrice FROM Orders WHERE UserId = ? ORDER BY CreatedDate DESC";
    $params = array($UserId);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
		$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		$totalPrice = $row['TotalPrice'];
	} else {
		$totalPrice = "N/A";
	}

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="../style/Styles.css">
</head>
<body>
    <div class="container">
        <h2 class="msg2">Dziękujemy! Rezerwacja została utworzona!</h2>
        <h2 class="msg2">Łączna kwota: <br><?php echo $totalPrice; ?></h2>
        <a href="../pages/Orders.php"><button type="button">Sprawdź swoje zamówienia</button></a>
    </div>
    <footer>
        <p>&copy; 2023 Car2Go. All rights reserved.</p>
    </footer>
</body>
</html>