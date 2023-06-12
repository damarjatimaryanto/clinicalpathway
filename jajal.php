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

// Retrieve checkbox values from the database
$stmt = $pdo->query("SELECT * FROM checkbox_data LIMIT 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$checkbox1 = isset($_SESSION['checkbox1']) ? $_SESSION['checkbox1'] : $row['checkbox1'];
$checkbox2 = isset($_SESSION['checkbox2']) ? $_SESSION['checkbox2'] : $row['checkbox2'];
$checkbox3 = isset($_SESSION['checkbox3']) ? $_SESSION['checkbox3'] : $row['checkbox3'];

// Update checkbox values when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $checkbox1 = isset($_POST['checkbox1']) ? $_POST['checkbox1'] : 0;
    $checkbox2 = isset($_POST['checkbox2']) ? $_POST['checkbox2'] : 0;
    $checkbox3 = isset($_POST['checkbox3']) ? $_POST['checkbox3'] : 0;

    // Update session variables with checkbox values
    $_SESSION['checkbox1'] = $checkbox1;
    $_SESSION['checkbox2'] = $checkbox2;
    $_SESSION['checkbox3'] = $checkbox3;

    if ($row) {
        // Prepare and execute an SQL statement to update the checkbox values
        $stmt = $pdo->prepare("UPDATE checkbox_data SET checkbox1 = ?, checkbox2 = ?, checkbox3 = ?");
        $stmt->execute([$checkbox1, $checkbox2, $checkbox3]);
    } else {
        // Prepare and execute an SQL statement to insert the checkbox values
        $stmt = $pdo->prepare("INSERT INTO checkbox_data (checkbox1, checkbox2, checkbox3) VALUES (?, ?, ?)");
        $stmt->execute([$checkbox1, $checkbox2, $checkbox3]);
    }

    // Redirect back to index.php
    header("Location: jajal.php");
    exit();
} elseif (!$row) {
    // If no checkbox data is found in the database, insert default values
    $stmt = $pdo->prepare("INSERT INTO checkbox_data (checkbox1, checkbox2, checkbox3) VALUES (0, 0, 0)");
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Checkbox Form</title>
</head>
<body>
  <form method="post" action="jajal.php">
    <input type="checkbox" name="checkbox1" value="15000" <?php if ($checkbox1) echo 'checked'; ?>> Checkbox 1<br>
    <input type="checkbox" name="checkbox2" value="15000" <?php if ($checkbox2) echo 'checked'; ?>> Checkbox 2<br>
    <input type="checkbox" name="checkbox3" value="15000" <?php if ($checkbox3) echo 'checked'; ?>> Checkbox 3<br>
    <input type="submit" value="Save">
  </form>
</body>
</html>
