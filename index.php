<?php
session_start();
require_once './php/conn.php';

if (isset($_SESSION['description'])) {
    $description = $_SESSION['description'];
} else {
    $description = "Brak opisu";
}

if (isset($_SESSION['contact'])) {
    $contact = $_SESSION['contact'];
} else {
    $contact = "Brak kontaktu";
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Car2Go</title>
		<link rel="stylesheet" href="./style/Styles.css">
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="#">Strona główna</a></li>
				<li><a href="./pages/Cars.php">Samochody</a></li>
				<li><a href="./pages/ContactPage.php">Kontakt</a></li>
				<li class="login"><a href="./pages/Login.php">Login</a></li>
			</ul>
		</nav>	
		<main>
			<div class="block">
				<h1>Witamy w Car2Go!</h1>
				<h2>
                    <?php echo $description; ?>
				</h2>
			</div>	
			<div class="block">
				<h1>Skontaktuj się z nami</h1>
				<h2>
                    <?php echo $contact; ?>
                </h2>
				<form>
					<label for="name">Adres e-mail:</label>
					<input type="text" id="name" name="name">
					<label for="message">Wiadomość:</label>
				<textarea id="message" name="message"></textarea>
				<button>Wyślij wiadomość</button>
			</div>
		</main>
		<footer>
			<p>&copy; 2023 Car2Go. All rights reserved.</p>
		</footer>
	</body>
</html>