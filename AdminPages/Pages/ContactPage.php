<?php
session_start();
require_once '../php/conn.php';
$EmpId = isset($_SESSION['EmpId']['EmpId']) ? (int)$_SESSION['EmpId']['EmpId'] : null;


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
        <script>
            $(document).ready(function () {
                function showEditPopup(type, objectId) {
                const textContent = $(`#Contact${type}`).text();
                const popup = $(`#editPopup${capitalizeFirstLetter("Contact" + type)}`);
                const textarea = $(`#editTextarea${capitalizeFirstLetter("Contact" + type)}`);

                textarea.val(textContent);
                popup.dialog({
                    modal: true,
                    buttons: {
                        "Zapisz": function () {
                            const newValue = textarea.val();
                            const operation = `update${capitalizeFirstLetter(type)}`;
                            saveEdit(`Contact${type}`, newValue, operation, 999);
                            $(this).dialog("close");
                        },
                        "Anuluj": function () {
                            $(this).dialog("close");
                        }
                    }
                });
            }

            function saveEdit(type, value, operation, objectId) {
                $.ajax({
                    type: "POST",
                    url: "../php/UpdateData.php",
                    data: {
                        type: type,
                        value: value,
                        EmpId: <?php echo json_encode(isset($_SESSION['EmpId']) ? $_SESSION['EmpId'] : null); ?>,
                        ObjectId: objectId
                    },
                    success: function (response) {
                        console.log(response);
                        if (response === "success") {
                            $(`#${type}`).text(value);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Błąd AJAX: ", error);
                    }
                });
            }


                function capitalizeFirstLetter(string) {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }

                $("#editOrderIssuesPhoneButton").on("click", function () {
                    showEditPopup("OrderIssuesPhone", "Contact");
                });

                $("#editOrderIssuesEmailButton").on("click", function () {
                    showEditPopup("OrderIssuesEmail", "Contact");
                });

                $("#editCarIssuesPhoneButton").on("click", function () {
                    showEditPopup("CarIssuesPhone", "Contact");
                });

                $("#editCarIssuesEmailButton").on("click", function () {
                    showEditPopup("CarIssuesEmail", "Contact");
                });

                $("#editAddressButton").on("click", function () {
                    showEditPopup("Address", "Contact");
                });

                $("#editWorkingHoursButton").on("click", function () {
                    showEditPopup("WorkingHours", "Contact");
                });

            });

            function loadUsers() {
                $.ajax({
                    url: "../php/GetUsers.php",
                    type: "GET",
                    success: function(response) {
                        localStorage.setItem("userData", response);
                    
                        window.location.href = "./Users.php";
                    },
                    error: function(error) {
                        console.log("Wystąpił błąd: " + error);
                    }
                });
                }
                function loadCarDetails() {
                $.ajax({
                    url: "../php/GetCarDetails.php",
                    type: "GET",
                    success: function(response) {
                        localStorage.setItem("carDetails", response);
                    
                        window.location.href = "./Cars.php";
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
                <li><a href="./AdminMainAfterLogin.php">Strona główna</a></li>
                <li><a href="javascript:void(0);" onclick="loadUsers()">Użytkownicy</a></li>
                <li><a href="javascript:void(0);" onclick="loadCarDetails()">Samochody</a></li>
                <li><a href="#">Kontakt</a></li>
                <li><a href="../php/AdminExit.php">Wyloguj</a></li>
            </ul>
        </nav>
        <main>    
            <div class="container2">
                <h1>Jesteśmy dostępni dla Ciebie w każdej chwili.</h1>
                <div>
                    <h2 class="h2">W razie pytań dotyczących reserwacji, zadzwoń za poniższym numerem:</h2>
                    <h3 id="ContactOrderIssuesPhone">
                        <?php echo $orderphone;?>
                    </h3>
                    <button type="button" id="editOrderIssuesPhoneButton">Edytuj</button>
                    <h2 class="h2">lub napisz nam:</h2>
                    <h3 id="ContactOrderIssuesEmail">
                        <?php echo $ordermail;?>
                    </h3>
                    <button type="button" id="editOrderIssuesEmailButton">Edytuj</button>
                </div>
                <div>    
                    <h2 class="h2">Potrzebujesz zgłoszić problem z samochodem?
                        Zadzwoń za poniższym numerem:</h2>
                    <h3 id="ContactCarIssuesPhone"> 
                        <?php echo $carphone;?>
                    </h3>
                    <button type="button" id="editCarIssuesPhoneButton">Edytuj</button>
                    <h2 class="h2">lub napisz nam:</h2>
                    <h3 id="ContactCarIssuesEmail">
                        <?php echo $caremail;?>
                    </h3>
                    <button type="button" id="editCarIssuesEmailButton">Edytuj</button>
                </div>
                <div>
                    <h2 class="h2">Albo możesz przyjść do naszego biura pod adressem: </h2>
                    <h3 id="ContactAddress">
                        <?php echo $contactaddress;?>
                    </h3>
                    <button type="button" id="editAddressButton">Edytuj</button>
                    <h2 class="h2">Godziny pracy biura:</h2>
                    <h3 id="ContactWorkingHours">
                        <?php echo $wrkghours;?>
                    <button type="button" id="editWorkingHoursButton">Edytuj</button>
                </div>
            </div>
        </main>
    
        <footer>
			<p>&copy; 2023 Car2Go. All rights reserved.</p>
		</footer>

        <div id="editPopupContactOrderIssuesPhone" style="display: none;" title="Edycja Telefon Problemy Zamówienia">
        <textarea id="editTextareaContactOrderIssuesPhone"></textarea>
        </div>
        <div id="editPopupOrderIssuesEmail" style="display: none;" title="Edycja Email Problemy Zamówienia">
            <textarea id="editTextareaOrderIssuesEmail"></textarea>
        </div>

        <div id="editPopupContactCarIssuesPhone" style="display: none;" title="Edycja Telefon Problemy Samochodu">
        <textarea id="editTextareaContactCarIssuesPhone"></textarea>
        </div>
        <div id="editPopupContactCarIssuesEmail" style="display: none;" title="Edycja Email Problemy Samochodu">
            <textarea id="editTextareaContactCarIssuesEmail"></textarea>
        </div>

        <div id="editPopupContactAddress" style="display: none;" title="Edycja Adres Kontaktowy">
        <textarea id="editTextareaContactAddress"></textarea>
        </div>
        <div id="editPopupContactWorkingHours" style="display: none;" title="Edycja Godziny Pracy">
            <textarea id="editTextareaContactWorkingHours"></textarea>
        </div>

        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "POST",
                    url: "../php/extractcontactdata.php",
                    success: function (response) {
                        const data = JSON.parse(response);
                        $("#ContactOrderIssuesPhone").text(data.orderphone || "Brak");
                        $("#ContactOrderIssuesEmail").text(data.ordermail || "Brak");
                        $("#ContactCarIssuesPhone").text(data.carphone || "Brak");
                        $("#ContactCarIssuesEmail").text(data.caremail || "Brak");
                        $("#ContactAddress").text(data.contactaddress || "Brak");
                        $("#ContactWorkingHours").text(data.wrkghours || "Brak");
                    },
                    error: function (error) {
                        console.error("Błąd AJAX: ", error);
                    }
                });
            });
        </script>
    </body>
</html>