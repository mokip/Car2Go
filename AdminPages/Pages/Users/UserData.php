<?php

session_start();
require_once '../../php/conn.php';

$UserId = isset($_GET['UserId']) ? $_GET['UserId'] : null;
$EmpId = isset($_SESSION['EmpId']['EmpId']) ? (int)$_SESSION['EmpId']['EmpId'] : null;


if ($UserId) {
    $tsql = "EXEC ShowPersonalData @UserId = ?";
    $params = array($UserId);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $userData = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
}
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Car2Go</title>
		<link rel="stylesheet" href="../../style/Styles.css">
		<link rel="stylesheet" href="../../scr/lightbox.min.css">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <script>
            function loadCarDetails() {
            $.ajax({
                url: "../../php/GetCarDetails.php",
                type: "GET",
                success: function(response) {
                    localStorage.setItem("carDetails", response);
                
                    window.location.href = "../Cars.php";
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
				<li><a href="../AdminMainAfterLogin.php">Strona główna</a></li>
                <li><a href="../Users.php">Użytkownicy</a></li>
                <li><a href="javascript:void(0);" onclick="loadCarDetails()">Samochody</a></li>
                <li><a href="../ContactPage.php">Kontakt</a></li>
                <li><a href="../../php/AdminExit.php">Wyloguj</a></li>
			</ul>
		</nav> 
        <a href="../Users.php"><button type="button" style="width: 30%; margin-left: 35%; margin-top:2%;">Powrót do listy użytkowników</button></a>
        <div class="blockUsers">
            <?php if ($userData) { ?>
            <p>Imię: <?php echo $userData['FirstName']; ?></p>
            <button id="button1" type="edit">Zmień</button>
            <div id="popup1" class="ordercancelationpopup" style="height:36%;">
                <form method="post" action="../../php/AdminFirstNameChange.php">
                    <label for="newname">Wpisz Imię :</label>
                    <input type="hidden" name="UserId" value="<?php echo $UserId; ?>">
                    <input type="text" id="newname" name="newname" required
                           oninvalid="this.setCustomValidity('Pole nie może być puste')"
                           oninput="this.value=this.value.replace(/[^a-zA-Z]/g,''); this.setCustomValidity('')">
                    <button type="submit">Potwierdź</button>
                </form>
                <a href="./userdata.php?UserId=<?php echo $UserId; ?>"><button id="button1" type="button">Cofnij</button></a>
            </div>
            <?php } else { ?>
                <p>Brak danych użytkownika o podanym identyfikatorze.</p>
            <?php } ?>
        </div>
        <div class="blockUsers">
            <p>Nazwisko: <?php echo $userData['LastName']; ?></p>
            <button id="button2" type="edit">Zmień</button>
            <div id="popup2" class="ordercancelationpopup" style="height:36%;">
                <form method="post" action="../../php/AdminLastNameChange.php">
                    <label for="surname">Wpisz Nazwisko:</label>
                    <input type="hidden" name="UserId" value="<?php echo $UserId; ?>">
                    <input type="text" id="surname" name="surname" required
                      oninvalid="this.setCustomValidity('Pole nie może być puste')"
                      oninput="this.value=this.value.replace(/[^a-zA-Z]/g,''); this.setCustomValidity('')">
                    <button type="submit">Potwierdz</button>
                </form>
                <a href="./userdata.php?UserId=<?php echo isset($_GET['UserId']) ? $_GET['UserId'] : ''; ?>"><button id="button1" type="button">Cofnij</button></a>
            </div>
        </div>
        <div class="blockUsers">
            <p>E-mail: <?php echo $userData['Email']; ?></p>
            <button id="button4" type="edit">Zmień</button>
            <div id="popup4" class="ordercancelationpopup" style="height:36%;">
                <form method="post" action="../../php/AdminEmailChange.php">
                    <label for="email">Podaj adres email:</label>
                    <input type="hidden" name="UserId" value="<?php echo $UserId; ?>">
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
                <a href="./userdata.php?UserId=<?php echo isset($_GET['UserId']) ? $_GET['UserId'] : ''; ?>"><button id="button1" type="button">Cofnij</button></a>
            </div>
        </div>
        <div class="blockUsers">
            <p>Telefon: <?php echo $userData['Phone']; ?></p>
            <button id="button5" type="edit">Zmień</button>
            <div id="popup5" class="ordercancelationpopup" style="height:36%;">
                <form method="post" action="../../php/AdminPhoneNumberChange.php">
                    <label for="phone">Podaj numer telefonu:</label>
                    <input type="hidden" name="UserId" value="<?php echo $UserId; ?>">
			        <input type="text" id="phone" name="phone" required minlength="9" maxlength="9" 
                        pattern="[0-9]{9}" 
                        oninvalid="this.setCustomValidity('Proszę wprowadzić numer telefonu składający się z 9 cyfr')"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'');this.setCustomValidity('')">
                    <button type="submit">Potwierdz</button>
                </form>
                <a href="./userdata.php?UserId=<?php echo isset($_GET['UserId']) ? $_GET['UserId'] : ''; ?>"><button id="button1" type="button">Cofnij</button></a>
            </div>
        </div>
        <div class="blockUsers">
            <p>Prawo jazdy: <?php echo $userData['DrivingLicense']; ?></p>
            <button id="button3" type="edit">Zmień</button>
            <div id="popup3" class="ordercancelationpopup" style="height:36%;">
                <form method="post" action="../../php/AdminLicenceNumberChange.php">
                    <label for="LicenseNumber">Podaj numer prawa jazdy:</label>
                    <input type="hidden" name="UserId" value="<?php echo $UserId; ?>">
			        <input type="text" id="LicenseNumber" name="LicenseNumber" required
                    oninvalid="this.setCustomValidity('Pole nie może być puste'); this.setCustomValidity('')">
                    <button type="submit">Potwierdz</button>
                </form>
                <a href="./userdata.php?UserId=<?php echo isset($_GET['UserId']) ? $_GET['UserId'] : ''; ?>"><button id="button1" type="button">Cofnij</button></a>
            </div>
        </div>

        <div class="blockUsers">
            <button id="button7" type="edit4">Zmień hasło</button>
            <div id="popup7" class="ordercancelationpopup" style="height:36%;">
                <form method="post" action="../../php/PasswordChange.php">
                    <label for="LicenseNumber">Podaj nowe hasło:</label>
                    <input type="hidden" name="UserId" value="<?php echo $UserId; ?>">
                    <input type="password" id="password" name="password" required minlength="8"
                    oninvalid="this.setCustomValidity('Proszę utworzyć hasło składające się z co najmniej 8 znaków')"
                    oninput="this.setCustomValidity('')" >
                    <button type="submit">Potwierdz</button>
                </form>
                <a href="./userdata.php?UserId=<?php echo isset($_GET['UserId']) ? $_GET['UserId'] : ''; ?>"><button id="button1" type="button">Cofnij</button></a>
            </div>
            <button id="button6" type="edit3">Usuń konto</button>
            <div id="popup6" class="ordercancelationpopup" style="height:33%;">
                <form method="post" action="../php/AccountDeletion.php">
                    <input type="hidden" name="UserId" value="<?php echo $UserId; ?>">
                    <h2>Na pewno chcesz usunąć konto użytkownika <?php echo $UserId; ?>?</h2>
                    <button type="submit">Potwierdz</button>
                </form>
                <a href="./userdata.php?UserId=<?php echo isset($_GET['UserId']) ? $_GET['UserId'] : ''; ?>"><button id="button1" type="button">Cofnij</button></a>
            </div>
        </div>



		<footer>
			<p>&copy; 2023 Car2Go. All rights reserved.</p>
		</footer>
		<script src="../scr/lightbox-plus-jquery.min.js"></script>
		<script src="../scr/moreinfo.js"></script>
		<script src="../scr/datepicker.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
        <script src="../../scr/personaldatapopup.js"></script>
				
	</body>
</html>
