<?php

// Prüfen, welche HTTP-Methode verwendet wurde (GET = Formular anzeigen, POST = Formular absenden/verarbeiten)
if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    // Debugging-Ausgabe der $_SERVER-Variablen (auskommentiert)
    // echo '<pre>';
    // var_dump($_SERVER);
    // echo '</pre>';
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- Responsives Design (Viewport anpassen) -->
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <h2> Create datensatz: </h2>
    <!-- Formular zum Anlegen eines neuen Datensatzes -->
    <form action='' method='post'>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"><br><br>
        <input type="submit" value="Submit">
    </form>
    </body>
    </html>

    <?php
// Wenn das Formular abgeschickt wurde (POST-Methode)
} elseif ($_SERVER["REQUEST_METHOD"] === 'POST') {

    // Debugging-Ausgabe der Formulardaten (auskommentiert)
    // var_dump($_POST);

    // Formulardaten auslesen
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    // Verbindung zur Datenbank herstellen
    $conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', 'phpp@ssw0rt');
    // SQL-Befehl vorbereiten (Achtung: aktuell unsicher, da direkt Variablen eingebaut → SQL-Injection möglich!)
    // diese Ganze :fname :lname ist dafür da um man den SQL-Injection zu vermeiden . jetzt ist Sicher
    $stmt = $conn->prepare("INSERT INTO employees (fname, lname) VALUES (:fname,:lname)");
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    // SQL ausführen
    $stmt->execute();
    // Erfolgsmeldung ausgeben
    echo 'wurde eingetragen!';
}
?>

