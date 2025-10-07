<?php
$host = '127.0.0.1';
$db   = 'COMPANY';
$user = 'companyuser';
$pass = 'companyp@ssw0rt';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Fehler werfen
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Ergebnis als Array
    PDO::ATTR_EMULATE_PREPARES   => false,                  // echte Prepared Statements
];

try { 
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Verbindung erfolgreich!";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
<?php
