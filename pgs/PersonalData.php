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
	</head>
	<body>
		<nav>
			<ul>
		    	<li><a href="../pages/MainAfterLogin.php">Strona główna</a></li>
		    	<li><a href="../pages/ContactAfterLogin.html">Kontakt</a></li>
		    	<li class="Parent">
		    		<a href="#">Konto</a>
		    		<div class="Child">
		    			<a href="#">Twoje dane</a>
		    			<a href="../pages/Orders.php">Twoje rezerwacje</a>
		    			<a href="../php/exit.php">Wyloguj</a>
		    		</div>
		    	</li>
			</ul>
		</nav>
        <div class="col", style="height: 80vh; width: 80vh; margin: 140px auto;">
			<?php 
            $tsql = "EXEC ShowPersonalData @UserId=?";
            $params = array($UserId);
            $stmt = sqlsrv_query($conn, $tsql, $params);
            if ($stmt === false) {
                $errors = sqlsrv_errors();
                echo "<p>Nieznany błąd</p>";
            } else {
                $counter = 0; 
                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                    ?>
                    <div style="text-align: left;">
                        <h1 style="margin-bottom: 10px;">Dane personalne:<h1>
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div id="overlay"></div>
                            <h2>Imię: <?=$row['FirstName'] ?></h2>
                            <button id="button1" type="button" style="margin-right: 10px; width: 70px; text-align: center;">Zmień</button>
                            <div id="popup1" class="ordercancelationpopup" style="height:36%;">
                                <form method="post" action="../php/FirstNameChange.php">
                                    <label for="name">Wpisz Imię :</label>
                                    <input type="text" id="name" name="name" required
                                      oninvalid="this.setCustomValidity('Pole nie może być puste')"
                                      oninput="this.value=this.value.replace(/[^a-zA-Z]/g,''); this.setCustomValidity('')">        
                                    <button type="submit">Potwierdz</button>
                                </form>
                                <a href="../pages/PersonalData.php"><button id="button1" type="button">Cofnij</button></a>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <h2>Nazwisko: <?=$row['LastName'] ?></h2>
                            <button id="button2" type="button" style="margin-right: 10px; width: 70px; text-align: center;">Zmień</button>
                            <div id="popup2" class="ordercancelationpopup" style="height:36%;">
                                <form method="post" action="../php/LastNameChange.php">
                                    <label for="surname">Wpisz Nazwisko:</label>
                                    <input type="text" id="surname" name="surname" required
                                      oninvalid="this.setCustomValidity('Pole nie może być puste')"
                                      oninput="this.value=this.value.replace(/[^a-zA-Z]/g,''); this.setCustomValidity('')">
                                    <button type="submit">Potwierdz</button>
                                </form>
                                <a href="../pages/PersonalData.php"><button id="button1" type="button">Cofnij</button></a>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <h2>Data urodzenia: <?=$row['BirthDate']->format('Y-m-d') ?></h2> 
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">
                            <h2>Numer prawa jazdy: <?=$row['DrivingLicense'] ?></h2>
                            <button id="button3" type="button" style="margin-right: 10px; width: 70px; text-align: center;">Zmień</button>
                            <div id="popup3" class="ordercancelationpopup" style="height:36%;">
                                <form method="post" action="../php/LicenceNumberChange.php">
                                    <label for="LicenseNumber">Podaj numer prawa jazdy:</label>
					                <input type="text" id="LicenseNumber" name="LicenseNumber" required
                                    oninvalid="this.setCustomValidity('Pole nie może być puste'); this.setCustomValidity('')">
                                    <button type="submit">Potwierdz</button>
                                </form>
                                <a href="../pages/PersonalData.php"><button id="button1" type="button">Cofnij</button></a>
                            </div>
                        </div>
                        <h1 style="margin-bottom: 10px;">Dane kontaktowe:<h1>
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <h2>Adres email: <?=$row['Email'] ?></h2>
                            <button id="button4" type="button" style="margin-right: 10px; width: 70px; text-align: center;">Zmień</button>
                            <div id="popup4" class="ordercancelationpopup" style="height:37%;">
                                <form method="post" action="../php/EmailChange.php">
                                    <label for="email">Podaj adres email:</label>
					                <input type="text" id="email" name="email" placeholder="example@email.com" onblur="validateEmail(this)" oninput="this.setCustomValidity('')" >
                                    <script>
                                        function validateEmail(emailInput) {
                                            const email = emailInput.value;
                                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                            if (!emailRegex.test(email)) {
                                                emailInput.setCustomValidity("Proszę podać poprawny adres email, przykład: example@mail.com");
                                            } else {
                                                emailInput.setCustomValidity("");
                                            }
                                        }
                                    </script>
                                    <button type="submit">Potwierdz</button>
                                </form>
                                <a href="../pages/PersonalData.php"><button id="button1" type="button">Cofnij</button></a>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <h2>Numer telefonu: <?=$row['Phone'] ?></h2>
                            <button id="button5" type="button" style="margin-right: 10px; width: 70px; text-align: center;">Zmień</button>
                            <div id="popup5" class="ordercancelationpopup" style="height:36%;">
                                <form method="post" action="../php/PhoneNumberChange.php">
                                    <label for="phone">Podaj numer telefonu:</label>
					                <input type="text" id="phone" name="phone" required minlength="9" maxlength="9" 
                                        pattern="[0-9]{9}" 
                                        oninvalid="this.setCustomValidity('Proszę wprowadzić numer telefonu składający się z 9 cyfr')"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');this.setCustomValidity('')">
                                    <button type="submit">Potwierdz</button>
                                </form>
                                <a href="../pages/PersonalData.php"><button id="button1" type="button">Cofnij</button></a>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: center;">
                            <button id="button6" type="button" style="width: 100px; text-align: center;">Usuń konto</button>
                            <div id="popup6" class="ordercancelationpopup" style="height:29%;">
                                <form method="post" action="../php/AccountDeletion.php">
                                    <h2>Na pewno chcesz usunąć swoje konto?</h2>
                                    <button type="submit">Potwierdz</button>
                                </form>
                                <a href="../pages/PersonalData.php"><button id="button1" type="button">Cofnij</button></a>
                            </div>
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
        <footer>
			<p>&copy; 2023 Car2Go. All rights reserved.</p>
		</footer>
        <script src="../scr/personaldatapopup.js"></script>
	</body>
</html>