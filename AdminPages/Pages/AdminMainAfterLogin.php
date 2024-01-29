<?php
session_start();
require_once '../php/conn.php';
$EmpId = isset($_SESSION['EmpId']['EmpId']) ? (int)$_SESSION['EmpId']['EmpId'] : null;


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
            const textContent = $(`#Main${type}`).text();
            const popup = $(`#editPopup${capitalizeFirstLetter("Main" + type)}`);
            const textarea = $(`#editTextarea${capitalizeFirstLetter("Main" + type)}`);
                    
            textarea.val(textContent);
            popup.dialog({
                modal: true,
                buttons: {
                    "Zapisz": function () {
                        const newValue = textarea.val();
                        const operation = `update${capitalizeFirstLetter(type)}`;
                        saveEdit(`Main${type}`, newValue, operation, 999);
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

            $("#editDescriptionButton").on("click", function () {
                showEditPopup("Description", "Main");
            });

            $("#editContactButton").on("click", function () {
                showEditPopup("Contact", "Main");
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
            <li><a href="#">Strona główna</a></li>
            <li><a href="javascript:void(0);" onclick="loadUsers()">Użytkownicy</a></li>
            <li><a href="javascript:void(0);" onclick="loadCarDetails()">Samochody</a></li>
            <li><a href="../pages/ContactPage.php">Kontakt</a></li>
            <li><a href="../php/AdminExit.php">Wyloguj</a></li>
        </ul>
    </nav>

    <main>
        <div class="block">
            <h1>Witamy w Car2Go!</h1>
            <h2 id="MainDescription">
                <?php echo $description; ?>
            </h2>
            <button type="button" id="editDescriptionButton">Edytuj</button>
        </div>
        <div class="block">
            <h1>Skontaktuj się z nami</h1>
            <h2 id="MainContact">
                <?php echo $contact; ?>
            </h2>
            <button type="button" id="editContactButton">Edytuj</button>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Car2Go. All rights reserved.</p>
    </footer>

    <div id="editPopupMainDescription" style="display: none;" title="Edycja Opisu">
        <textarea id="editTextareaMainDescription"></textarea>
    </div>

    <div id="editPopupMainContact" style="display: none;" title="Edycja Kontaktu">
        <textarea id="editTextareaMainContact"></textarea>
    </div>

    <script>
        $(document).ready(function () {
            $.ajax({
                type: "POST",
                url: "../php/extractdescription.php",
                success: function (response) {
                    const data = JSON.parse(response);
                    $("#MainDescription").text(data.description || "Brak opisu");
                    $("#MainContact").text(data.contact || "Brak kontaktu");
                },
                error: function (error) {
                    console.error("Błąd AJAX: ", error);
                }
            });
        });
    </script>

</body>

</html>

