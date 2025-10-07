<?php

$conn = new PDO(dsn:'mysql:host=localhost;dbname=company', username:'phpstorm', password:'phpp@ssw0rt');
$stmt = $conn->prepare('SELECT * FROM employees');
$stmt -> execute();
echo'<pre>';
$array = ($stmt->fetchAll(PDO::FETCH_ASSOC));

function createTable(array $data, array|false $ueberschriften=false, string $farbe_1='#7fb6f7', string $farbe_2='#b3e8ea') {     // $data die eig daten, $überschriften = Spaltennamen bspw. Nachn
    //$farbe_1 = hintergrundfarben für abwechselnde zeilen
    echo "<table style='margin:auto; border:1px solid black); border-collapse:collapse;'>";


    // Kopfzeile
    if ($ueberschriften) {                                                                                              // $ überschriften ist ein paramenter der funktion createTable! beim aufrufen müssen wir selber überschriften übergeben!
        echo "<tr>";                                                                                                    // erstellt eine zeile
        foreach ($ueberschriften as $head) {                                                                            // foreach nimmt jede überschrift einzeln, und $head ist nur ein platzhalter, da die schleife durch jedes element iteriert und speichert die aktuelle überschrift in $head
            echo "<th style='border:1px solid black; padding:5px;'>".htmlspecialchars($head)."</th>";                   // jetzt bauen wir mit th einen table header also kofzeile,
        }                                                                                                               //htmlspecialchars wandelt alle Sonderzeichen um damit nichts kaputt geht oder als htm l interpretiert wird
        echo "</tr>";                                                                                                   // mit echo "<tr>" haben wir die zeile geöffnet, dann mit der foreach gefüllt und jetzt mit echo "</tr>" schließen wir sie wieder
    }

    // Datenzeilen
    $i = 0;                                                                                                             // Zeilen-Zähler für abwechselnde Farben
    foreach ($data as $row) {                                                                                       // jede Zeile der Daten durchgehen
        $farbe = ($i % 2 == 0) ? $farbe_1 : $farbe_2;                                                                       // gerade/ungerade Zeilenfarbe
        echo "<tr style='background-color:$farbe;'>";                                                                   // öffnet die Tabellenzeile

        foreach ($row as $cell) {                                                                                   // jede Zelle der Zeile durchgehen
            echo "<td style='border:1px solid black; padding:5px;'>".htmlspecialchars($cell)."</td>";               // wir nehmen den wert von cell und wandeln ihn um um ihn in eine gestylte formatierte celle

        }
        echo "</tr>";                                                                               //                             schließt die Tabellenzeile
        $i++;                                                                           // Zähler erhöhen
    }

    echo "</table>";
}
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
// Tabelle wirklich ausgeben:
createTable($array, ['ID', 'Vorname', 'Nachname']);
?>
</body>
</html>

?>
