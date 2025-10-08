<?php
require '../db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


$department = [
    ['name' => 'HR'],
    ['name' => 'Sales'],
    ['name' => 'Marketing']
];

// ID rauslassen – die macht die DB automatisch
$stmt = $pdo->prepare("INSERT INTO department (name) VALUES (:name)");

foreach ($department as $m) {
    $stmt->execute([
        'name' => $m['name']
    ]);
}

echo "Alle Departments erfolgreich hinzugefügt!";
?>
