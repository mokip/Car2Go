<?php

session_start();

$wanttoreservefrom = $_SESSION['wanttoreservefrom'];
$wanttoreserveto = $_SESSION['wanttoreserveto'];

$Car = $_SESSION['Car'];
$OrderId = $_SESSION['OrderId'];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Car2Go</title>
		<link rel="stylesheet" href="../style/Styles.css">
		<link rel="stylesheet" href="../scr/lightbox.min.css">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
	</head>
	<body>	  
		<a href="../pages/Orders.php"><button type="button" style="width: 30%; margin-left: 35%; ">Wróć</button></a>
		<div class="container4" style="margin-top:3%;">
			<div id="i7" class="col2">
				<h2 style="padding-bottom: 28px;">BMW I7</h2>
				<img src="../img/bmw_i7_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button1" class="popup-button" type="button">Wybierz</button>
				<div id="popup1" class="popup_1" style="height: 55%;">
                    <form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="i7">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na BMW I7 </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 1450.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 1305.00</h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 1160.00</h4>
                        <h3>Również można odblokować dodatkowe opcje: </h3>
                        <div style="text-align: left; display: flex; flex-direction: column;">
                            <p style="margin-top: 7px;">
                                <input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
                            </p>
                            <p style="margin-top: 7px;">
                                <input type="checkbox" disabled name="Neon"/>Neon (100zł)
                            </p>
                            <p style="margin-top: 7px;">
                                <input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
                            </p>
                            <p style="margin-top: 7px;">
                                <input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
                            </p>
                            <p style="margin-top: 7px;">
                                <input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
                            </p>
                            <p style="margin-top: 7px;">
                                <input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
                            </p>
                        </div>
                        <button type="submit" style="margin-top: 15px;">Potwierdz</button>
                    </form>
                    <button class="close-button">Zamknij</button>
                </div>
			</div>
			<div id="i8" class="col2">
				<h2 style="padding-bottom: 28px;" >BMW I8</h2>
				<img src="../img/bmw_i8_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button2" class="popup-button" type="button">Wybierz</button>
				<div id="popup2" class="popup_1">
					  <form method="post" action="../php/OrderCarChange.php">
						  <input type="hidden" name="carid" value="i8">
						  <h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na BMW I8 </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						  <h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 1450.00 zł</h4>
						  <h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 1305.00</h4>
						  <h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 1160.00</h4>
						  <h3>Również można odblokować dodatkowe opcje: </h3>
							<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
							  		<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Neon" name="Neon" value="1"/>Neon (100zł)
							  	</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Spotify"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="Autopilot" name="Autopilot" value="1"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
							</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					  </form>
					  <button class="close-button">Zamknij</button>
				  </div>
			</div>
			<div id="Camry" class="col2">
				<h2>TOYOTA CAMRY</h2>
				<img src="../img/toyota_camry_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				  <button id="button3" type="button">Wybierz</button>
				  <div id="popup3" class="popup_1">
					  <form method="post" action="../php/OrderCarChange.php">
                          <input type="hidden" name="carid" value="Camry">
						  <h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na TOYOTA CAMRY </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						  <h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 250.00 zł</h4>
						  <h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 225.00</h4>
						  <h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 200.00</h4>
						  <h3>Również można odblokować dodatkowe opcje: </h3>
						  <div style="text-align: left; display: flex; flex-direction: column;">
							<p style="margin-top: 7px;">
							  <input type="checkbox" id="GPS" name="GPS"/>GPS (100zł)
							</p>
							<p style="margin-top: 7px;">
							  <input type="checkbox" disabled name="Neon"/>Neon (100zł)
							</p>
							<p style="margin-top: 7px;">
							  <input type="checkbox" id="Spotify" name="Spotify"/>Spotify (100zł)
							</p>
							<p style="margin-top: 7px;">
							  <input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
							</p>
							<p style="margin-top: 7px;">
							  <input type="checkbox" disabled name="AutomatiParking"/>AutomatiParking (100zł)
							</p>
							<p style="margin-top: 7px;">
							  <input type="checkbox" id="SeatHeating" name="SeatHeating"/>SeatHeating (100zł)
							</p>
						  </div>
						  <button type="submit" style="margin-top: 15px;">Potwierdz</button>
					  </form>
					  <button class="close-button">Zamknij</button>
				  </div>
			</div>
			<div id="GLC" class="col2">
				<h2>MERCEDES GLC</h2>
				<img src="../img/mercedes_glc_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button4" class="popup-button" type="button">Wybierz</button>
				<div id="popup4" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="GLC">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Mercedes GLC </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 412.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 370.80 zł</h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 329.60 zł </h4>
						<h3>Również można odblokować dodatkowe opcje: </h3>
						  	<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
									<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Neon"/>Neon (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
						  	</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					</form>
					<button class="close-button">Zamknij</button>
				</div>
			</div>
			<div id="CLA" class="col2">
				<h2>MERCEDES CLA</h2>
				<img src="../img/mercedes_cla_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button5" class="popup-button" type="button">Wybierz</button>
				<div id="popup5" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="CLA">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Mercedes CLA</br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 400.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 360.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 320.00 zł</h4>
						<h3>Również można odblokować dodatkowe opcje: </h3>
						  	<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
									<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Neon"/>Neon (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
						  	</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					</form>
					<button class="close-button">Zamknij</button>
				</div>
			</div>
			<div id="EQS" class="col2">
				<h2>MERCEDES EQS</h2>
				<img src="../img/mercedes_eqs_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button6" class="popup-button" type="button">Wybierz</button>
				<div id="popup6" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="EQS">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Mercedes EQS </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 1400.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 1260.00 </h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 1120.00</h4>
						<h3>Również można odblokować dodatkowe opcje: </h3>
						  	<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
									<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Neon"/>Neon (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
						  	</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					</form>
					<button class="close-button">Zamknij</button>
				</div>
			</div>
			<div id="EQC" class="col2">
				<h2>MERCEDES EQC</h2>
				<img src="../img/mercedes_eqc_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button7" class="popup-button" type="button">Wybierz</button>
				<div id="popup7" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="EQC">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Mercedes EQC </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 1400.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 1260.00</h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 1120.00</h4>
						<h3>Również można odblokować dodatkowe opcje: </h3>
						  	<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
									<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Neon"/>Neon (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
						  	</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					</form>
					<button class="close-button">Zamknij</button>
				</div>
			</div>
			<div id="X" class="col2">
				<h2 style="padding-bottom: 28px;">TESlA X</h2>
				<img src="../img/tesla_x_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button8" class="popup-button" type="button">Wybierz</button>
				<div id="popup8" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="X">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Tesla Model X </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 400.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 360.00 </h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 320.00 </h4>
						<h3>Również można odblokować dodatkowe opcje: </h3>
						  	<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
									<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Neon"/>Neon (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
						  	</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					</form>
					<button class="close-button">Zamknij</button>
				</div>
			</div>
			<div id="S" class="col2">
				<h2 style="padding-bottom: 28px;">TESlA S</h2>
				<img src="../img/tesla_s_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button9" class="popup-button" type="button">Wybierz</button>
				<div id="popup9" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="S">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Tesla Model S </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 480.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 432.00</h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 384.00</h4>
						<h3>Również można odblokować dodatkowe opcje: </h3>
						  	<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
									<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Neon"/>Neon (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
						  	</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					</form>
					<button class="close-button">Zamknij</button>
				</div>
			</div>
			<div id="6" class="col2">
				<h2 style="padding-bottom: 28px;">MAZDA 6</h2>
				<img src="../img/mazda_6_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button10" class="popup-button" type="button">Wybierz</button>
				<div id="popup10" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="6">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Mazda 6 </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 1450.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 1305.00</h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 1160.00</h4>
						<h3>Również można odblokować dodatkowe opcje: </h3>
						  	<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
									<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Neon"/>Neon (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
						  	</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					</form>
					<button class="close-button">Zamknij</button>
				</div>
			</div>
			<div id="ARONA" class="col2">
				<h2>SEAT ARONA</h2>
				<img src="../img/seat_arona_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				  <button id="button11" class="popup-button" type="button">Wybierz</button>
				  <div id="popup11" class="popup_1" style="height: 55%;">
					  <form method="post" action="../php/OrderCarChange.php">
                          <input type="hidden" name="carid" value="ARONA">
						  <h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Seat Arona </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						  <h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 146.00 zł</h4>
						  <h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 131.40</h4>
						  <h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 116.80</h4>
						  <h3>Również można odblokować dodatkowe opcje: </h3>
								<div style="text-align: left; display: flex; flex-direction: column;">
								  <p style="margin-top: 7px;">
									  <input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								  </p>
								  <p style="margin-top: 7px;">
									  <input type="checkbox" disabled name="Neon"/>Neon (100zł)
								  </p>
								  <p style="margin-top: 7px;">
									  <input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								  </p>
								  <p style="margin-top: 7px;">
										<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								  </p>
								  <p style="margin-top: 7px;">
										<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								  </p>
								  <p style="margin-top: 7px;">
										<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								  </p>
								</div>
						  <button type="submit" style="margin-top: 15px;">Potwierdz</button>
					  </form>
					  <button class="close-button">Zamknij</button>
				  </div>
			</div>
			<div id="CORSA" class="col2">
				<h2>OPEL CORSA</h2>
				<img src="../img/opel_corsa_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button12" class="popup-button" type="button">Wybierz</button>
				<div id="popup12" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="CORSA">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Opel Corsa </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 115.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 103.50</h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 92.00</h4>
						<h3>Również można odblokować dodatkowe opcje: </h3>
						  	<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
									<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Neon"/>Neon (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
						  	</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					</form>
					<button class="close-button">Zamknij</button>
				</div>
			</div>
			<div id="RIO" class="col2">
				<h2 style="padding-bottom: 28px;">KIA RIO</h2>
				<img src="../img/kia_rio_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button13" class="popup-button" type="button">Wybierz</button>
				<div id="popup13" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="RIO">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Kia Rio </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 115.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 103.50</h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 92.00</h4>
						<h3>Również można odblokować dodatkowe opcje: </h3>
						  	<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
									<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Neon"/>Neon (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
						  	</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					</form>
					<button class="close-button">Zamknij</button>
				</div>
			</div>
			<div id="CEED" class="col2">
				<h2 style="padding-bottom: 28px;">KIA CEED</h2>
				<img src="../img/kia_ceed_front.jpg" height=50% width=85%>
				<div id="overlay"></div>
				<button id="button14" class="popup-button" type="button">Wybierz</button>
				<div id="popup14" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCarChange.php">
                        <input type="hidden" name="carid" value="CEED ">
						<h3 style="text-align: left; margin-bottom: 30px;">Zmieniasz samochód <?php echo $Car; ?>,</br>na Kia Ceed </br> dla zamówienia o numerze <?php echo $OrderId; ?> </h3>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): 150.00 zł</h4>
						<h4 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): 135.00</h4>
						<h4 style="text-align: left; margin-bottom: 30px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): 120.00</h4>
						<h3>Również można odblokować dodatkowe opcje: </h3>
						  	<div style="text-align: left; display: flex; flex-direction: column;">
								<p style="margin-top: 7px;">
									<input type="checkbox" id="GPS" name="GPS" value="1"/>GPS (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" disabled name="Neon"/>Neon (100zł)
								</p>
								<p style="margin-top: 7px;">
									<input type="checkbox" id="Spotify" name="Spotify" value="1"/>Spotify (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" disabled name="Autopilot"/>Autopilot (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="AutomatiParking" name="AutomatiParking" value="1"/>AutomatiParking (100zł)
								</p>
								<p style="margin-top: 7px;">
								  	<input type="checkbox" id="SeatHeating" name="SeatHeating" value="1"/>SeatHeating (100zł)
								</p>
						  	</div>
						<button type="submit" style="margin-top: 15px;">Potwierdz</button>
					</form>
					<button class="close-button">Zamknij</button>
				</div>
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
		<script>
			window.addEventListener("DOMContentLoaded", function() {
			  var carBlocks = document.getElementsByClassName("col2");
			  for (var i = 0; i < carBlocks.length; i++) {
				carBlocks[i].style.display = "none";
			  }
			
			  var hash = window.location.hash.substr(1);
			  if (hash.length > 0) {
				var anchors = hash.split(",");
				for (var j = 0; j < anchors.length; j++) {
				  var carId = anchors[j];
				  var carBlock = document.getElementById(carId);
				  if (carBlock) {
					carBlock.style.display = "block";
				  }
				}
			  }
			});
			</script>					
	</body>
</html>
