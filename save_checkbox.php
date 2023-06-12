<?php
session_start();

// Establish database connection
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

// Assuming the checkboxes have names "checkbox1", "checkbox2", "checkbox3"
$checkbox1 = isset($_POST['checkbox1']) ? $_POST['checkbox1'] : 0;
$checkbox2 = isset($_POST['checkbox2']) ? $_POST['checkbox2'] : 0;
$checkbox3 = isset($_POST['checkbox3']) ? $_POST['checkbox3'] : 0;

// Update session variables with checkbox values
$_SESSION['checkbox1'] = $checkbox1;
$_SESSION['checkbox2'] = $checkbox2;
$_SESSION['checkbox3'] = $checkbox3;

// Prepare and execute an SQL statement to insert/update the checkbox values
$stmt = $pdo->prepare("INSERT INTO checkbox_data (checkbox1, checkbox2, checkbox3) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE checkbox1 = VALUES(checkbox1), checkbox2 = VALUES(checkbox2), checkbox3 = VALUES(checkbox3)");
$stmt->execute([$checkbox1, $checkbox2, $checkbox3]);

// Redirect back to index.php
header("Location: jajal.php");
exit();
?>
