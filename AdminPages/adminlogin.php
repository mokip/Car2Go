<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
	    <link rel="stylesheet" href="./style/Styles.css">
	</head>
	<body>
		<div class="container">
			<form method="post" action="./php/adminsignin.php">
				<label for="useremail">E-mail:</label>
				<input type="text" id="useremail" name="useremail" 
				placeholder="example@email.com" onblur="validateEmail(this)" 
				oninput="this.setCustomValidity('')" >
				<label for="password">Hasło:</label>
				<input type="password" id="password" name="password" required>
				<button type="submit">Zaloguj</button>
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
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    	<script src="../scr/datepicker.js"></script>
	</body>
</html>
