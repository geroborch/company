<?php

# Verbindung mit der Datenbank
$conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', 'phpp@ssw0rt');
$sql = 'SELECT * FROM department';
$stmt = $conn->prepare($sql);
$stmt->execute();
$array = $stmt->fetchAll(PDO::FETCH_ASSOC);

function createTable(array $data, array|false $ueberschrifeten = false, string $farbe_1 = '#B0C4DE', string $farbe_2 = '#D3D3D3'): string
{
    $string = "<table border='1' cellspacing='0' cellpadding='8' style='border-collapse: collapse;'>";
    $string .= "<tr style='background-color: #87CEEB;'>";
    foreach ($data[0] as $key => $value) {
        $string .= "<th>" . htmlspecialchars($key) . "</th>";
    }
    $string .= "<th colspan='2'>Aktionen</th>";
    $string .= "</tr>";

    foreach ($data as $index => $user) {
        $color = $index % 2 === 0 ? $farbe_1 : $farbe_2;
        $string .= "<tr style='background-color: $color;'>";

        foreach ($user as $key => $item) {
            // 🔹 Wenn Spalte "is_hiring", ersetze Zahl durch Symbol
            if ($key === 'is_hiring') {
                if ($item == 1) {
                    $item = "<span style='color: green; font-size: 20px;'>✅</span>";
                } else {
                    $item = "<span style='color: red; font-size: 20px;'>❌</span>";
                }
            }
            $string .= "<td style='text-align: center;'>" . $item . "</td>";
        }

        // 🔹 Action-Buttons
        $id = $user['id'];
        $string .= "<td style='background-color: white; text-align: center;'>
                        <a href='/department/update/{$id}'>✏️ Update</a>
                    </td>";
        $string .= "<td style='background-color: white; text-align: center;'>
                        <a href='/department/delete/{$id}'>🗑️ Delete</a>
                    </td>";

        $string .= "</tr>";
    }

    $string .= "</table>";
    return $string;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>READ department</title>
</head>
<body>
<h1>Welcome in meine Firma</h1>
<td style='background-color: white; text-align: center;'>
    <a href='create.php?id=$id'>✏️ Create Departments</a>
</td><br><br>
<h2>Meine Departments</h2>
<?= createTable($array) ?>
</body>
</html>
