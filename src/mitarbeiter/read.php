<?php

# Verbindung mit der Datenbank mit einem PDO Objekt
$conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', 'phpp@ssw0rt');
#Den Auszuführenden SQL Befehl
$sql = 'SELECT * FROM employees';
#Erstellen eines PDOStatement Objektes "SQL Boten" und übergabe des SQL-Befehls mithilfe des PDO Objektes
$stmt = $conn->prepare($sql);
# Ausführen des SQL-Befehls
$stmt->execute();
# Das Ergebnis des SQLs in form eines nummerischen Arrays (fetchAll) mit assoziativen Arrays als Elementen (PDO::FETCH_ASSOC)  in eine variable
$array = $stmt->fetchAll(PDO::FETCH_ASSOC);



function createTable(array $data, array|false $ueberschrifeten = false, string $farbe_1 = 'lightgrey', string $farbe_2 = 'lightgreen'): string
{
    $string = "<table>";
    $string .= "<tr>";
    foreach ($data[0] as $key => $value) {
        $string .= "<th>";
        $string .= "$key";
        $string .= "</th>";
    }
    $string .= "</tr>";


    foreach ($data as $index => $user) {
        if ($index % 2 == 0) {
            $color = $farbe_1;
        } else {
            $color = $farbe_2;
        }
        $string .= "<tr  style='background-color: $color'>";
        foreach ($user as $item) {
            $string .= "<td>";
            $string .= $item;
            $string .= "</td>";
        }
        $string .= "<td class='link' style='background-color: white'>";
        $id = $user['id'];
        $string .= "<a href='/mitarbeiter/delete/{$id}'>Delete</a>";
        $string .= "</td>";
        $string .= "<td class='link' style='background-color: white'>";
        $string .= "<a href='/mitarbeiter/update/{$id}'>Update</a>";
        $string .= "</td>";
        $string .= "</tr>";
    }
    $string .= "</table>";
    return $string;
}

?>

<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Mitarbeiter</title>
    <h2>Hier sind alle Mitarbeiter unseres Unternehmens!</h2>
</head>
<body>
<?= createTable($array) ?>
</body>
</html>