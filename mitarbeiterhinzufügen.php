


<?php
require 'db.php';

$mitarbeiter = [
    ['vorname' => 'test', 'nachname' => 'einsnach'],
    ['vorname' => 'testi', 'nachname' => 'zweinach'],
    ['vorname' => 'testiii', 'nachname' => 'dreinach']
];

$stmt = $pdo->prepare("INSERT INTO mitarbeiter (vorname, nachname) VALUES (:vorname, :nachname)");

foreach ($mitarbeiter as $m) {
    $stmt->execute([
        'vorname' => $m['vorname'],
        'nachname' => $m['nachname']
    ]);
}

echo "Alle Mitarbeiter erfolgreich hinzugefügt!";
?>
