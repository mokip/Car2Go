<?php

session_start();
require_once '../php/conn.php';
$EmpId = isset($_SESSION['EmpId']['EmpId']) ? (int)$_SESSION['EmpId']['EmpId'] : null;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Car2Go</title>
		<link rel="stylesheet" href="../style/Styles.css">
		<link rel="stylesheet" href="../scr/lightbox.min.css">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <script>
            function loadCarDetails() {
            $.ajax({
                url: "../php/GetCarDetails.php",
                type: "GET",
                success: function(response) {
                    localStorage.setItem("carDetails", response);
                
                    window.location.href = "./Cars.php";
                },
                error: function(error) {
                    console.log("Wystąpił błąd: " + error);
                }
            });
            }
        </script>
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="./AdminMainAfterLogin.php">Strona główna</a></li>
                <li><a href="#">Użytkownicy</a></li>
                <li><a href="javascript:void(0);" onclick="loadCarDetails()">Samochody</a></li>
                <li><a href="../pages/ContactPage.php">Kontakt</a></li>
                <li><a href="../php/AdminExit.php">Wyloguj</a></li>
			</ul>
		</nav> 
        <div id="userDataContainer" class="container5"></div>
        <table>
            <tr>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Email</th>
                <th>Data Urodzenia</th>
                <th>Anonimizacja danych</th>
                <th></th>
            </tr>
            <?php 
                $tsql = "EXEC GetUserList";
                $stmt = sqlsrv_query($conn, $tsql);
                if ($stmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                } else {
                    $counter = 0; 
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            ?>
                        <tr>
                            <td class='col3'> <?=$row ['FirstName'] ?> </td>
                            <td class='col3'> <?=$row ['LastName'] ?> </td>
                            <td class='col3'> <?=$row ['Email'] ?> </td>
                            <td class='col3'> <?=$row ['BirthDate'] ?> </td>
                            <td class='col3'><?=$row ['Anonimizowany'] ?> </td>
                            <td class='col3'><a href='../php/UserData.php?userid=<?=$row ['UserId'] ?>'>Zobacz profil</a></td>
                        </tr>
            <?php
                        $counter++; 
                    }
                    if ($counter == 0) { 
            ?>
            <?php
                    }
                }
            ?>
        </table>

		<footer>
			<p>&copy; 2023 Car2Go. All rights reserved.</p>
		</footer>
		<script src="../scr/lightbox-plus-jquery.min.js"></script>
		<script src="../scr/moreinfo.js"></script>
		<script src="../scr/datepicker.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
				
	</body>
</html>
