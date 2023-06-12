<?php
$host = 'localhost';
$db   = 'neurotech';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// SQL statement to create checkbox_data table
$sql = "CREATE TABLE IF NOT EXISTS checkbox_data (
            id INT AUTO_INCREMENT PRIMARY KEY,
            checkbox1 INT DEFAULT 0,
            checkbox2 INT DEFAULT 0,
            checkbox3 INT DEFAULT 0
        )";

// Execute the SQL statement
$pdo->exec($sql);

echo "Table created successfully.";
?>
