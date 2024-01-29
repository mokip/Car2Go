<?php
session_start();
require_once '../php/conn.php';


if (isset($_SESSION['orderphone'])) {
    $orderphone = $_SESSION['orderphone'];
} else {
    $orderphone = "Brak";
}

if (isset($_SESSION['ordermail'])) {
    $ordermail = $_SESSION['ordermail'];
} else {
    $ordermail = "Brak";
}

if (isset($_SESSION['carphone'])) {
    $carphone = $_SESSION['carphone'];
} else {
    $carphone = "Brak";
}

if (isset($_SESSION['caremail'])) {
    $caremail = $_SESSION['caremail'];
} else {
    $caremail = "Brak";
}

if (isset($_SESSION['contactaddress'])) {
    $contactaddress = $_SESSION['contactaddress'];
} else {
    $contactaddress = "Brak";
}

if (isset($_SESSION['wrkghours'])) {
    $wrkghours = $_SESSION['wrkghours'];
} else {
    $wrkghours = "Brak";
}
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
                <li><a href="../index.php">Strona główna</a></li>
                <li><a href="../pages/Cars.php">Samochody</a></li>
                <li><a href="#">Kontakt</a></li>
                <li><a href="../pages/Login.php">Login</a></li>
            </ul>
        </nav>
        <div class="container2">
            <h1>Jesteśmy dostępni dla Ciebie w każdej chwili.</h1>
            <div>
                <h2 class="h2">W razie pytań dotyczących reserwacji, zadzwoń za poniższym numerem:</h2>
                <h3><?php echo $orderphone;?></h3>
                <h2 class="h2">lub napisz nam:</h2>
                <h3><?php echo $ordermail;?></h3>
            </div>
            <div>    
                <h2 class="h2">Potrzebujesz zgłoszić problem z samochodem?
                    Zadzwoń za poniższym numerem:</h2>
                <h3><?php echo $carphone;?></h3>
                <h2 class="h2">lub napisz nam:</h2>
                <h3><?php echo $caremail;?></h3>
            </div>
            <div>
                <h2 class="h2">Albo możesz przyjść do naszego biura pod adressem: </h2>
                <h3><?php echo $contactaddress;?></h3>
                <h2 class="h2">Godziny pracy biura:</h2>
                <h3><?php echo $wrkghours;?></h3>
            </div>
        </div>
        <footer>
			<p>&copy; 2023 Car2Go. All rights reserved.</p>
		</footer>
    </body>