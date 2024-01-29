<?php

session_start();  
unset($_SESSION['EmpId']);

header('Location: ../adminlogin.php');

?>