<?php
session_start();
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
			<h2>Zaloguj się na swoje konto Car2Go</h2>
			<form method="post" action="../php/SignIn.php">
				<label for="userphone">Numer telefonu:</label>
				<input type="text" id="userphone" name="userphone" required minlength="9" maxlength="9" pattern="[0-9]{9}" 
				oninvalid="this.setCustomValidity('Proszę wprowadzić numer telefonu składający się z 9 cyfr')"
				oninput="this.value=this.value.replace(/[^0-9]/g,'');this.setCustomValidity('')">
				<label for="password">Hasło:</label>
				<input type="password" id="password" name="password" required>
				<button type="submit">Zaloguj</button>
				<a href="../pages/AccountCreation.html"><button type="button">Utwórz konto</button></a>
				<a href="../index.php"><button type="button">Wróc na stronę główną</button></a>
			</form>
            <?php 
                if (isset($_SESSION['message'])) {
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                } 
                unset($_SESSION['message']);
                ?>
		</div>
		<footer>
			<p>&copy; 2023 Car2Go. All rights reserved.</p>
		</footer>
	</body>
</html>
