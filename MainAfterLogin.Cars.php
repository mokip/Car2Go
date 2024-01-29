<?php

session_start();

$wanttoreservefrom = $_SESSION['wanttoreservefrom'];
$wanttoreserveto = $_SESSION['wanttoreserveto'];

$carDetails = isset($_SESSION['carDetails']) && !empty($_SESSION['carDetails']) ? $_SESSION['carDetails'] : null;

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
		<nav>
			<ul>
				<li><a href="../pages/MainAfterLogin.php">Strona główna</a></li>
				<li><a href="../pages/ContactAfterLogin.html">Kontakt</a></li>
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
			<a href="../pages/MainAfterLogin.php"><button type="button" style="width: 30%; margin-left: 35%; margin-top:2%;">
				Zmień date
		</button></a>	  
		<div class="container3">
			<div id="i7" class="col">
				<h2>BMW I7</h2>
				<div class="image-container">
					<a href="../img/bmw_i7_front.jpg" data-lightbox="bmw_i7" class="big-image">
						<img src="../thumb-images/bmw_i7_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/bmw_i7_back.jpg" data-lightbox="bmw_i7" class="small-image">
							<img src="../thumb-images/bmw_i7_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/bmw_i7_side.jpg" data-lightbox="bmw_i7" class="small-image">
							<img src="../thumb-images/bmw_i7_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/bmw_i7_inside.jpg" data-lightbox="bmw_i7" class="small-image">
							<img src="../thumb-images/bmw_i7_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button1" type="button" data-carid="2">Wiecej informacji</button>
				<div id="popup1" class="popup">
					<img src="../img/bmw_i7_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">BMW I7</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>											
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_1" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_1" class="popup_1" style="height: 55%;">
                    <form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="i7">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="i8" class="col">
				<h2>BMW I8</h2>
				<div class="image-container">
					<a href="../img/bmw_i8_front.jpg" data-lightbox="bmw_i8" class="big-image">
						<img src="../thumb-images/bmw_i8_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
						<a href="../img/bmw_i8_back.jpg" data-lightbox="bmw_i8" class="small-image">
  							<img src="../thumb-images/bmw_i8_back.jpg" alt="Small Image 1" class="small-image">
						</a>
						<a href="../img/bmw_i8_side.jpg" data-lightbox="bmw_i8" class="small-image">
  							<img src="../thumb-images/bmw_i8_side.jpg" alt="Small Image 2" class="small-image">
						</a>
						<a href="../img/bmw_i8_inside.jpg" data-lightbox="bmw_i8" class="small-image">
  							<img src="../thumb-images/bmw_i8_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button2" type="button" data-carid="1">Wiecej informacji</button>
				<div id="popup2" class="popup">
					<img src="../img/bmw_i8_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">BMW I8</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>	
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_2" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_2" class="popup_1">
					  <form method="post" action="../php/OrderCreation.php">
						  <input type="hidden" name="carid" value="i8">
                          <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                          <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                          <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                          <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                          <p style="text-align: left; font-weight: bold;" >Do: </p>
                          <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="Camry" class="col">
				<h2>TOYOTA CAMRY</h2>
				<div class="image-container">
					<a href="../img/toyota_camry_front.jpg" data-lightbox="camry" class="big-image">
						<img src="../thumb-images/toyota_camry_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
						<a href="../img/toyota_camry_back.jpg" data-lightbox="camry" class="small-image">
  							<img src="../thumb-images/toyota_camry_back.jpg" alt="Small Image 1" class="small-image">
						</a>
						<a href="../img/toyota_camry_side.jpg" data-lightbox="camry" class="small-image">
  							<img src="../thumb-images/toyota_camry_side.jpg" alt="Small Image 2" class="small-image">
						</a>
						<a href="../img/toyota_camry_inside.jpg" data-lightbox="camry" class="small-image">
  							<img src="../thumb-images/toyota_camry_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button3" type="button" data-carid="14">Wiecej informacji</button>
				<div id="popup3" class="popup">
					<img src="../img/toyota_camry_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">Toyota Camry</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>	
					<button class="close-button">Zamknij</button>
				  </div>
				  <button id="button1_3" type="button">Zarezerwuj</button>
				  <div id="popup1_3" class="popup_1">
					  <form method="post" action="../php/OrderCreation.php">
                          <input type="hidden" name="carid" value="Camry">
                          <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                          <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                          <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                          <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                          <p style="text-align: left; font-weight: bold;" >Do: </p>
                          <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="GLC" class="col">
				<h2>MERCEDES GLC</h2>
				<div class="image-container">
					<a href="../img/mercedes_glc_front.jpg" data-lightbox="mercedes_glc" class="big-image">
						<img src="../thumb-images/mercedes_glc_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/mercedes_glc_back.jpg" data-lightbox="mercedes_glc" class="small-image">
							<img src="../thumb-images/mercedes_glc_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/mercedes_glc_side.jpg" data-lightbox="mercedes_glc" class="small-image">
							<img src="../thumb-images/mercedes_glc_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/mercedes_glc_inside.jpg" data-lightbox="mercedes_glc" class="small-image">
							<img src="../thumb-images/mercedes_glc_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button4" type="button">Wiecej informacji</button>
				<div id="popup4" class="popup">
					<img src="../img/mercedes_glc_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">MERCEDES GLC</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_4" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_4" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="GLC">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="CLA" class="col">
				<h2>MERCEDES CLA</h2>
				<div class="image-container">
					<a href="../img/mercedes_cla_front.jpg" data-lightbox="mercedes_cla" class="big-image">
						<img src="../thumb-images/mercedes_cla_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/mercedes_cla_back.jpg" data-lightbox="mercedes_cla" class="small-image">
							<img src="../thumb-images/mercedes_cla_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/mercedes_cla_side.jpg" data-lightbox="mercedes_cla" class="small-image">
							<img src="../thumb-images/mercedes_cla_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/mercedes_cla_inside.jpg" data-lightbox="mercedes_cla" class="small-image">
							<img src="../thumb-images/mercedes_cla_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button5" type="button">Wiecej informacji</button>
				<div id="popup5" class="popup">
					<img src="../img/mercedes_cla_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">MERCEDES CLA</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_5" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_5" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="CLA">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="EQS" class="col">
				<h2>MERCEDES EQS</h2>
				<div class="image-container">
					<a href="../img/mercedes_eqs_front.jpg" data-lightbox="mercedes_eqs" class="big-image">
						<img src="../thumb-images/mercedes_eqs_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/mercedes_eqs_back.jpg" data-lightbox="mercedes_eqs" class="small-image">
							<img src="../thumb-images/mercedes_eqs_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/mercedes_eqs_side.jpg" data-lightbox="mercedes_eqs" class="small-image">
							<img src="../thumb-images/mercedes_eqs_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/mercedes_eqs_inside.jpg" data-lightbox="mercedes_eqs" class="small-image">
							<img src="../thumb-images/mercedes_eqs_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button6" type="button">Wiecej informacji</button>
				<div id="popup6" class="popup">
					<img src="../img/mercedes_eqs_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">MERCEDES EQS</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_6" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_6" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="EQS">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="EQC" class="col">
				<h2>MERCEDES EQC</h2>
				<div class="image-container">
					<a href="../img/mercedes_eqc_front.jpg" data-lightbox="mercedes_eqc" class="big-image">
						<img src="../thumb-images/mercedes_eqc_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/mercedes_eqc_back.jpg" data-lightbox="mercedes_eqc" class="small-image">
							<img src="../thumb-images/mercedes_eqc_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/mercedes_eqc_side.jpg" data-lightbox="mercedes_eqc" class="small-image">
							<img src="../thumb-images/mercedes_eqc_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/mercedes_eqc_inside.jpg" data-lightbox="mercedes_eqc" class="small-image">
							<img src="../thumb-images/mercedes_eqc_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button7" type="button" data-carid="1">Wiecej informacji</button>
				<div id="popup7" class="popup">
					<img src="../img/mercedes_eqc_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">MERCEDES EQC</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_7" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_7" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="EQC">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="X" class="col">
				<h2>TESlA X</h2>
				<div class="image-container">
					<a href="../img/tesla_x_front.jpg" data-lightbox="tesla_x" class="big-image">
						<img src="../thumb-images/tesla_x_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/tesla_x_back.jpg" data-lightbox="tesla_x" class="small-image">
							<img src="../thumb-images/tesla_x_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/tesla_x_side.jpg" data-lightbox="tesla_x" class="small-image">
							<img src="../thumb-images/tesla_x_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/tesla_x_inside.jpg" data-lightbox="tesla_x" class="small-image">
							<img src="../thumb-images/tesla_x_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button8" type="button">Wiecej informacji</button>
				<div id="popup8" class="popup">
					<img src="../img/tesla_x_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">TESlA X</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_8" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_8" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="X">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="S" class="col">
				<h2>TESlA S</h2>
				<div class="image-container">
					<a href="../img/tesla_s_front.jpg" data-lightbox="tesla_s" class="big-image">
						<img src="../thumb-images/tesla_s_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/tesla_s_back.jpg" data-lightbox="tesla_s" class="small-image">
							<img src="../thumb-images/tesla_s_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/tesla_s_side.jpg" data-lightbox="tesla_s" class="small-image">
							<img src="../thumb-images/tesla_s_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/tesla_s_inside.jpg" data-lightbox="tesla_s" class="small-image">
							<img src="../thumb-images/tesla_s_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button9" type="button">Wiecej informacji</button>
				<div id="popup9" class="popup">
					<img src="../img/tesla_s_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">BMW I7</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_9" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_9" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="S">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="6" class="col">
				<h2>MAZDA 6</h2>
				<div class="image-container">
					<a href="../img/mazda_6_front.jpg" data-lightbox="mazda_6" class="big-image">
						<img src="../thumb-images/mazda_6_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/mazda_6_back.jpg" data-lightbox="mazda_6" class="small-image">
							<img src="../thumb-images/mazda_6_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/mazda_6_side.jpg" data-lightbox="mazda_6" class="small-image">
							<img src="../thumb-images/mazda_6_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/mazda_6_inside.jpg" data-lightbox="mazda_6" class="small-image">
							<img src="../thumb-images/mazda_6_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button10" type="button">Wiecej informacji</button>
				<div id="popup10" class="popup">
					<img src="../img/mazda_6_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">MAZDA 6</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_10" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_10" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="6">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="ARONA" class="col">
				<h2>SEAT ARONA</h2>
				<div class="image-container">
					<a href="../img/seat_arona_front.jpg" data-lightbox="seat_arona" class="big-image">
						<img src="../thumb-images/seat_arona_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/seat_arona_back.jpg" data-lightbox="seat_arona" class="small-image">
							<img src="../thumb-images/seat_arona_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/seat_arona_side.jpg" data-lightbox="seat_arona" class="small-image">
							<img src="../thumb-images/seat_arona_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/seat_arona_inside.jpg" data-lightbox="seat_arona" class="small-image">
							<img src="../thumb-images/seat_arona_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button11" type="button">Wiecej informacji</button>
				<div id="popup11" class="popup">
					<img src="../img/seat_arona_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">SEAT ARONA</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				  <button id="button1_11" class="popup-button" type="button">Zarezerwuj</button>
				  <div id="popup1_11" class="popup_1" style="height: 55%;">
					  <form method="post" action="../php/OrderCreation.php">
                          <input type="hidden" name="carid" value="ARONA">
                          <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                          <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                          <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                          <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                          <p style="text-align: left; font-weight: bold;" >Do: </p>
                          <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="CORSA" class="col">
				<h2>OPEL CORSA</h2>
				<div class="image-container">
					<a href="../img/opel_corsa_front.jpg" data-lightbox="opel_corsa" class="big-image">
						<img src="../thumb-images/opel_corsa_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/opel_corsa_back.jpg" data-lightbox="opel_corsa" class="small-image">
							<img src="../thumb-images/opel_corsa_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/opel_corsa_side.jpg" data-lightbox="opel_corsa" class="small-image">
							<img src="../thumb-images/opel_corsa_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/opel_corsa_inside.jpg" data-lightbox="opel_corsa" class="small-image">
							<img src="../thumb-images/opel_corsa_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button12" type="button">Wiecej informacji</button>
				<div id="popup12" class="popup">
					<img src="../img/opel_corsa_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">OPEL CORSA</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_12" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_12" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="CORSA">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="RIO" class="col">
				<h2>KIA RIO</h2>
				<div class="image-container">
					<a href="../img/kia_rio_front.jpg" data-lightbox="kia_rio" class="big-image">
						<img src="../thumb-images/kia_rio_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/kia_rio_back.jpg" data-lightbox="kia_rio" class="small-image">
							<img src="../thumb-images/kia_rio_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/kia_rio_side.jpg" data-lightbox="kia_rio" class="small-image">
							<img src="../thumb-images/kia_rio_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/kia_rio_inside.jpg" data-lightbox="kia_rio" class="small-image">
							<img src="../thumb-images/kia_rio_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button13" type="button">Wiecej informacji</button>
				<div id="popup13" class="popup">
					<img src="../img/kia_rio_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">KIA RIO</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_13" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_13" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="RIO">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			<div id="CEED" class="col">
				<h2>KIA CEED</h2>
				<div class="image-container">
					<a href="../img/kia_ceed_front.jpg" data-lightbox="kia_ceed" class="big-image">
						<img src="../thumb-images/kia_ceed_front.jpg" alt="Big Image" class="big-image">
					</a>
					<div class="small-images">
  						<a href="../img/kia_ceed_back.jpg" data-lightbox="kia_ceed" class="small-image">
							<img src="../thumb-images/kia_ceed_back.jpg" alt="Small Image 1" class="small-image">
						</a>
  						<a href="../img/kia_ceed_side.jpg" data-lightbox="kia_ceed" class="small-image">
							<img src="../thumb-images/kia_ceed_side.jpg" alt="Small Image 2" class="small-image">
						</a>
  						<a href="../img/kia_ceed_inside.jpg" data-lightbox="kia_ceed" class="small-image">
							<img src="../thumb-images/kia_ceed_inside.jpg" alt="Small Image 3" class="small-image">
						</a>
					</div>
				</div>
				<div id="overlay"></div>
				<button id="button14" type="button">Wiecej informacji</button>
				<div id="popup14" class="popup">
					<img src="../img/kia_ceed_front.jpg" alt="Image description" class="popup-image">
					<div style="width: 100%;">
						<h1 style="text-align: left; margin-bottom: 10px;">KIA CEED</h1>
						<div style="padding-bottom: 15px;"></div>
						<?php
                            if ($carDetails) {
                                foreach ($carDetails as $car) {
                                    if ($car['Model'] == 'i7') {
                                        echo '<h2 style="text-align: left; margin-bottom: 10px;">' . nl2br($car['Description']) . '</h2>';
                                        echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Rok: 2023</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna prędkość: ' . $car['MaxSpeed'] . 'KM/H</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Maksymalna ilość osób: ' . $car['Passengers'] . '</h3>';
						                echo '<div style="padding-bottom: 30px;"></div>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu do 7 dni): ' . $car['PricePerDay'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu od 8 do 31 dni): ' . $car['PricePerWeek'] . 'zł</h3>';
						                echo '<h3 style="text-align: left; margin-bottom: 10px;">Cena za dzień (w przypadku wynajmu na więcej niż 32 dni): ' . $car['PricePerMonth'] . 'zł</h3>';
                                    }
                                }
                            } else {
                                echo '<p>Dane sesji nie są dostępne lub są puste.</p>';
                            }
                        ?>
					</div>
					<button class="close-button">Zamknij</button>
				  </div>
				<button id="button1_14" class="popup-button" type="button">Zarezerwuj</button>
				<div id="popup1_14" class="popup_1" style="height: 55%;">
					<form method="post" action="../php/OrderCreation.php">
                        <input type="hidden" name="carid" value="CEED ">
                        <input type="hidden" id="ReservedFrom" name="reservedfrom" value="<?php echo $wanttoreservefrom; ?>">
                        <p style="text-align: left; font-weight: bold;" >Samochód będzie zarezerwowany od: </p>
                        <p style="text-align: left;"><?php echo $wanttoreservefrom; ?></p>
                        <input type="hidden" id="ReservedTo" name="reservedto" value="<?php echo $wanttoreserveto; ?>">
                        <p style="text-align: left; font-weight: bold;" >Do: </p>
                        <p style="text-align: left;"><?php echo $wanttoreserveto; ?></p>
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
			  var carBlocks = document.getElementsByClassName("col");
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
