<?php
session_start();
require_once '../php/conn.php';
$UserId = $_SESSION['UserID']['UserId'];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Car2Go</title>
		<link rel="stylesheet" href="../style/Styles.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
		<script src="../scr/datepicker.js"></script>
	</head>
	<body>
		<nav>
			<ul>
		    	<li><a href="../pages/MainAfterLogin.php">Strona główna</a></li>
		    	<li><a href="../pages/ContactAfterLogin.php">Kontakt</a></li>
		    	<li class="Parent">
		    		<a href="#">Konto</a>
		    		<div class="Child">
		    			<a href="../pages/PersonalData.php">Twoje dane</a>
		    			<a href="#">Twoje rezerwacje</a>
		    			<a href="../php/exit.php">Wyloguj</a>
		    		</div>
		    	</li>
			</ul>
		</nav>
        <div class="container3">
            <div class="col", style="height: 72vh; overflow-y: auto;">
                <h2>Anulowane rezerwacje:</h2>
				<?php 
                $tsql = "EXEC ShowCanceled @UserId=?";
                $params = array($UserId);
                $stmt = sqlsrv_query($conn, $tsql, $params);
                if ($stmt === false) {
                    $errors = sqlsrv_errors();
                    echo "<p>Nie masz anulowanych rezerwacji</p>";
                } else {
                    if (sqlsrv_has_rows($stmt)) {
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            ?>
                            <div style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">
                                <h2 style="background-color: #b13131; display: inline-block;">Numer zamówienia: <?=$row['OrderId'] ?></h2>
                                <h2 style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">Od: <?=$row['ReservedFrom']->format('Y-m-d H:i:s') ?></h2>
                                <h2>Do: <?=$row['ReservedTo']->format('Y-m-d H:i:s') ?></h2>
                                <h2>Samochoód: <?=$row['Car'] ?></h2>
                                <h2>Łączna kwota: <?=$row['TotalPrice'] ?></h2>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <p>You do not have past orders yet</p>
                        <?php
                    }
                }
            ?>
            </div>
            <div class="col", style="height: 72vh; overflow-y: auto;">
                <h2>Wcześniejsze rezerwacje:</h2>
				<?php 
                $tsql = "EXEC ShowPast @UserId=?";
                $params = array($UserId);
                $stmt = sqlsrv_query($conn, $tsql, $params);
                if ($stmt === false) {
                    $errors = sqlsrv_errors();
                    echo "<p>Nie masz jeszcze przeszłych rezerwacji</p>";
                } else {
                    if (sqlsrv_has_rows($stmt)) {
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            ?>
                            <div style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">
                                <h2 style="background-color: #d7ae2a; display: inline-block;">Numer zamówienia: <?=$row['OrderId'] ?></h2>
                                <h2 style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">Od: <?=$row['ReservedFrom']->format('Y-m-d H:i:s') ?></h2>
                                <h2>Do: <?=$row['ReservedTo']->format('Y-m-d H:i:s') ?></h2>
                                <h2>Samochód: <?=$row['Car'] ?></h2>
                                <h2>Łączna kwota: <?=$row['TotalPrice'] ?></h2>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <p>You do not have past orders yet</p>
                        <?php
                    }
                }
            ?>
            </div>
            <div class="col", style="height: 72vh; overflow-y: auto;">
                <h2>Aktywne rezerwacje:</h2>
				<?php 
                $tsql = "EXEC ShowActive @UserId=?";
                $params = array($UserId);
                $stmt = sqlsrv_query($conn, $tsql, $params);
                if ($stmt === false) {
                    $errors = sqlsrv_errors();
                    echo "<p>Nie masz aktywnych rezerwacji</p>";
                } else {
                    $counter = 0; 
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <div style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">
                            <h2 style="background-color: #5aa84b; display: inline-block;">Numer zamówienia: <?=$row['OrderId'] ?></h2>
                            <h2 style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">Od: <?=$row['ReservedFrom']->format('Y-m-d H:i:s') ?></h2>
                            <h2>Do: <?=$row['ReservedTo']->format('Y-m-d H:i:s') ?></h2>
                            <h2>Samochód: <?=$row['Car'] ?></h2>
                            <h2>Łączna kwota: <?=$row['TotalPrice'] ?></h2>
                        </div>
                        <?php
                        $counter++; 
                    }
                    if ($counter == 0) { 
                        ?>
                        <p>You do not have past orders yet</p>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="col", style="height: 72vh; overflow-y: auto;">
                <h2>Nadchodzące rezerwacje:</h2>
                <?php 
                    $tsql = "EXEC ShowFuture @UserId=?";
                    $params = array($UserId);
                    $stmt = sqlsrv_query($conn, $tsql, $params);
                    if ($stmt === false) {
                        $errors = sqlsrv_errors();
                        echo "<p>Nie masz jeszcze przyszłych rezerwacji</p>";
                    } else {
                        $counter = 1;
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            $orderId = $row['OrderId'];
                            ?>
                            <div style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">
                                <h2 style="background-color: #228a8c; display: inline-block;">Numer zamówienia: <?=$orderId ?></h2>    
                                <h2 style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">Od: <?=$row['ReservedFrom']->format('Y-m-d H:i:s') ?></h2>
                                <h2>Do: <?=$row['ReservedTo']->format('Y-m-d H:i:s') ?></h2>
                                <h2>Samochód: <?=$row['Car'] ?></h2>
                                <h2>Łączna kwota: <?=$row['TotalPrice'] ?></h2>

                                <form method="post" action="../php/AvailableCarsToChangeCheck.php">
                                    <button id="button1" type="submit">Zmień samochód</button>
                                    <input type="hidden" id="ReservedFrom" name="wanttoreservefrom" value="<?=$row['ReservedFrom']->format('Y-m-d H:i:s') ?>">
                                    <input type="hidden" id="ReservedTo" name="wanttoreserveto" value="<?=$row['ReservedTo']->format('Y-m-d H:i:s') ?>">
                                    <input type="hidden" id="Car" name="Car" value="<?=$row['Car'] ?>">
                                    <input type="hidden" id="OrderId" name="OrderId" value="<?=$orderId ?>">
                                </form>

                                <button id="button2" type="button" onclick="showPopup('popup<?=$orderId ?>_2')">Zmień datę</button>
                                <div id="popup<?=$orderId ?>_2" class="ordercancelationpopup" style="height: 75%; width: 60%; margin: -100px auto; left: 20%;">
                                    <form method="post" action="../php/OrderDateChange.php">
                                        <input type="hidden" name="orderId" value="<?=$orderId?>">
                                        <h1>Zmień datę rezerwacji o numerze <?=$orderId ?></h1>
                                        <h2 style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">Od: <?=$row['ReservedFrom']->format('Y-m-d H:i:s') ?></h2>
                                        <h2>Do: <?=$row['ReservedTo']->format('Y-m-d H:i:s') ?></h2>
                                        <label for="date1" style="text-align: left; font-weight: bold;"><h2 style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">Wybierz nową datę od:</h2></label>
                                        <input type="text" id="ReservedFrom<?=$counter?>" name="newreservefrom" style="width: 70px; height:30px;" required
                                            oninvalid="this.setCustomValidity('Pole nie może być puste')"
                                            oninput="this.setCustomValidity('')"
                                            onblur="this.setCustomValidity('')"
                                            onvalid="this.setCustomValidity('')">
                                        <label for="date2" style="text-align: left; margin-top: 10px; font-weight: bold;"><h2 style="text-align: left; border-top: 2px solid black; border-color: #000000; padding-top: 10px;">Wybierz nową datę do:</h2></label>
                                        <input type="text" id="ReservedTo<?=$counter?>" name="newreserveto" style="width: 70px; height:30px;" required
                                            oninvalid="this.setCustomValidity('Pole nie może być puste')"
                                            oninput="this.setCustomValidity('')"
                                            onblur="this.setCustomValidity('')"
                                            onvalid="this.setCustomValidity('')">
                                        <button type="submit">Potwierdź</button>
                                    </form>
                                    <a href="../pages/Orders.php"><button id="button2" type="button">Cofnij</button></a>
                                </div>

                                <button id="button3" type="button" onclick="document.getElementById('popup<?=$orderId ?>').style.display='block'">Anuluj</button>
                                <div id="popup<?=$orderId ?>" class="ordercancelationpopup" id="popup3">
                                <form method="post" action="../php/OrderCancelation.php">
                                    <input type="hidden" name="orderId" value="<?=$orderId?>">
                                    <h1>Na pewno chcesz anulować swoją rezerwację o numerze <?=$orderId ?> ?</h1>
                                    <button id="button" type="submit">Potwierdz</button>
                                </form>
                                    <a href="./Orders.php"><button id="button3" type="button">Cofnij</button></a>
                                </div>
                            </div>
                            <?php
                            $counter++;
                        }
                        if ($counter == 0) { 
                            ?>
                            <p>You do not have past orders yet</p>
                            <?php
                        }
                    }
                    ?>
            </div>
        </div>
		<footer>
			<p>&copy; 2023 Car2Go. All rights reserved.</p>
		</footer>
        <script>
            function showPopup(popupId) {
                var popup = document.getElementById(popupId);
                if (popup.style.display === 'block') {
                    popup.style.display = 'none';
                } else {
                    popup.style.display = 'block';
                }
            }
        </script>
	</body>
</html>
