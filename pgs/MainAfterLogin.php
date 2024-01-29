<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Car2Go</title>
		<link rel="stylesheet" href="../style/Styles.css">
		<link rel="stylesheet" href="../scr/lightbox.min.css">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
		<script src="../scr/datepicker.js"></script>
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="#">Strona główna</a></li>
				<li><a href="../pages/ContactAfterLogin.php">Kontakt</a></li>
				<li class="Parent">
					<a href="#">Konto</a>
					<div class="Child">
						<a href="../pages/PersonalData.php">Twoje dane</a>
						<a href="../pages/Orders.php">Twoje rezerwacje</a>
						<a href="../php/exit.php">Wyloguj</a>
					</div>
				</li>
			</ul>
		</nav>
        <div class="col" style="width: 50%; height:30%;">
		    <form id="availabilityForm" method="post" action="../php/CheckAvailableCars.php">
		        <label for="date1" style="text-align: left; font-weight: bold;">Wybierz datę od kiedy chcesz zarezerwować ten samochód:</label>
		        <input type="text" id="ReservedFrom1" name="wanttoreservefrom" style="width: 70px; height:30px;" required
		            oninvalid="this.setCustomValidity('Pole nie może być puste')"
		            oninput="this.setCustomValidity('')"
					onblur="this.setCustomValidity('')"
                    onvalid="this.setCustomValidity('')">
		        <label for="date2" style="text-align: left; margin-top: 10px; font-weight: bold;">Wybierz datę do kiedy chcesz zarezerwować ten samochód:</label>
		        <input type="text" id="ReservedTo1" name="wanttoreserveto" style="width: 100px; height:30px;" required
		            oninvalid="this.setCustomValidity('Pole nie może być puste')"
		            oninput="this.setCustomValidity('')"
					onblur="this.setCustomValidity('')"
                    onvalid="this.setCustomValidity('')">
		        <button type="submit" style="margin-top: 15px;">Potwierdz</button>
		    </form>
		    <div id="message"></div>
		</div>
		<footer>
			<p>&copy; 2023 Car2Go. All rights reserved.</p>
		</footer>
	</body>
</html>
