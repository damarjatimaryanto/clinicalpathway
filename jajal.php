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



<?php
$biaya1 = isset($_POST['biaya1']) ? $_POST['biaya1'] : 0;
$biaya2 = isset($_POST['biaya2']) ? $_POST['biaya2'] : 0;
$biaya3 = isset($_POST['biaya3']) ? $_POST['biaya3'] : 0;
$biaya4 = isset($_POST['biaya4']) ? $_POST['biaya4'] : 0;
$biaya5 = isset($_POST['biaya5']) ? $_POST['biaya5'] : 0;
$biaya6 = isset($_POST['biaya6']) ? $_POST['biaya6'] : 0;
$biaya7 = isset($_POST['biaya7']) ? $_POST['biaya7'] : 0;
$biaya8 = isset($_POST['biaya8']) ? $_POST['biaya8'] : 0;
$biaya9 = isset($_POST['biaya9']) ? $_POST['biaya9'] : 0;
$biaya10 = isset($_POST['biaya10']) ? $_POST['biaya10'] : 0;
$biaya11 = isset($_POST['biaya11']) ? $_POST['biaya11'] : 0;
$biaya12 = isset($_POST['biaya12']) ? $_POST['biaya12'] : 0;
$biaya13 = isset($_POST['biaya13']) ? $_POST['biaya13'] : 0;
$biaya14 = isset($_POST['biaya14']) ? $_POST['biaya14'] : 0;
$biaya15 = isset($_POST['biaya15']) ? $_POST['biaya15'] : 0;
$biaya16 = isset($_POST['biaya16']) ? $_POST['biaya16'] : 0;
$biaya17 = isset($_POST['biaya17']) ? $_POST['biaya17'] : 0;
$biaya18 = isset($_POST['biaya18']) ? $_POST['biaya18'] : 0;
$biaya19 = isset($_POST['biaya19']) ? $_POST['biaya19'] : 0;
$biaya20 = isset($_POST['biaya20']) ? $_POST['biaya20'] : 0;
$biaya21 = isset($_POST['biaya21']) ? $_POST['biaya21'] : 0;
$biaya22 = isset($_POST['biaya22']) ? $_POST['biaya22'] : 0;
$biaya23 = isset($_POST['biaya23']) ? $_POST['biaya23'] : 0;
$biaya24 = isset($_POST['biaya24']) ? $_POST['biaya24'] : 0;
$biaya25 = isset($_POST['biaya25']) ? $_POST['biaya25'] : 0;
$biaya26 = isset($_POST['biaya26']) ? $_POST['biaya26'] : 0;
$biaya27 = isset($_POST['biaya27']) ? $_POST['biaya27'] : 0;
$biaya28 = isset($_POST['biaya28']) ? $_POST['biaya28'] : 0;
$biaya29 = isset($_POST['biaya29']) ? $_POST['biaya29'] : 0;
$biaya30 = isset($_POST['biaya30']) ? $_POST['biaya30'] : 0;
$biaya31 = isset($_POST['biaya31']) ? $_POST['biaya31'] : 0;
$biaya32 = isset($_POST['biaya32']) ? $_POST['biaya32'] : 0;
$biaya33 = isset($_POST['biaya33']) ? $_POST['biaya33'] : 0;
$biaya34 = isset($_POST['biaya34']) ? $_POST['biaya34'] : 0;
$biaya35 = isset($_POST['biaya35']) ? $_POST['biaya35'] : 0;
$biaya36 = isset($_POST['biaya36']) ? $_POST['biaya36'] : 0;
$biaya37 = isset($_POST['biaya37']) ? $_POST['biaya37'] : 0;
$biaya38 = isset($_POST['biaya38']) ? $_POST['biaya38'] : 0;
$biaya39 = isset($_POST['biaya39']) ? $_POST['biaya39'] : 0;
$biaya40 = isset($_POST['biaya40']) ? $_POST['biaya40'] : 0;
$biaya41 = isset($_POST['biaya41']) ? $_POST['biaya41'] : 0;
$biaya42 = isset($_POST['biaya42']) ? $_POST['biaya42'] : 0;
$biaya43 = isset($_POST['biaya43']) ? $_POST['biaya43'] : 0;
$biaya44 = isset($_POST['biaya44']) ? $_POST['biaya44'] : 0;
$biaya45 = isset($_POST['biaya45']) ? $_POST['biaya45'] : 0;
$biaya46 = isset($_POST['biaya46']) ? $_POST['biaya46'] : 0;
$biaya47 = isset($_POST['biaya47']) ? $_POST['biaya47'] : 0;
$biaya48 = isset($_POST['biaya48']) ? $_POST['biaya48'] : 0;
$biaya49 = isset($_POST['biaya49']) ? $_POST['biaya49'] : 0;
$biaya50 = isset($_POST['biaya50']) ? $_POST['biaya50'] : 0;
$biaya51 = isset($_POST['biaya51']) ? $_POST['biaya51'] : 0;
$biaya52 = isset($_POST['biaya52']) ? $_POST['biaya52'] : 0;
$biaya53 = isset($_POST['biaya53']) ? $_POST['biaya53'] : 0;
$biaya54 = isset($_POST['biaya54']) ? $_POST['biaya54'] : 0;
$biaya55 = isset($_POST['biaya55']) ? $_POST['biaya55'] : 0;
$biaya56 = isset($_POST['biaya56']) ? $_POST['biaya56'] : 0;
$biaya57 = isset($_POST['biaya57']) ? $_POST['biaya57'] : 0;
$biaya58 = isset($_POST['biaya58']) ? $_POST['biaya58'] : 0;
$biaya59 = isset($_POST['biaya59']) ? $_POST['biaya59'] : 0;
$biaya60 = isset($_POST['biaya60']) ? $_POST['biaya60'] : 0;
$biaya61 = isset($_POST['biaya61']) ? $_POST['biaya61'] : 0;
$biaya62 = isset($_POST['biaya62']) ? $_POST['biaya62'] : 0;
$biaya63 = isset($_POST['biaya63']) ? $_POST['biaya63'] : 0;
$biaya64 = isset($_POST['biaya64']) ? $_POST['biaya64'] : 0;
$biaya65 = isset($_POST['biaya65']) ? $_POST['biaya65'] : 0;
$biaya66 = isset($_POST['biaya66']) ? $_POST['biaya66'] : 0;
$biaya67 = isset($_POST['biaya67']) ? $_POST['biaya67'] : 0;
$biaya68 = isset($_POST['biaya68']) ? $_POST['biaya68'] : 0;
$biaya69 = isset($_POST['biaya69']) ? $_POST['biaya69'] : 0;
$biaya70 = isset($_POST['biaya70']) ? $_POST['biaya70'] : 0;
$biaya71 = isset($_POST['biaya71']) ? $_POST['biaya71'] : 0;
$biaya72 = isset($_POST['biaya72']) ? $_POST['biaya72'] : 0;
$biaya73 = isset($_POST['biaya73']) ? $_POST['biaya73'] : 0;
$biaya74 = isset($_POST['biaya74']) ? $_POST['biaya74'] : 0;
$biaya75 = isset($_POST['biaya75']) ? $_POST['biaya75'] : 0;
$biaya76 = isset($_POST['biaya76']) ? $_POST['biaya76'] : 0;
$biaya77 = isset($_POST['biaya77']) ? $_POST['biaya77'] : 0;
$biaya78 = isset($_POST['biaya78']) ? $_POST['biaya78'] : 0;
$biaya79 = isset($_POST['biaya79']) ? $_POST['biaya79'] : 0;
$biaya80 = isset($_POST['biaya80']) ? $_POST['biaya80'] : 0;
$biaya81 = isset($_POST['biaya81']) ? $_POST['biaya81'] : 0;
$biaya82 = isset($_POST['biaya82']) ? $_POST['biaya82'] : 0;
$biaya83 = isset($_POST['biaya83']) ? $_POST['biaya83'] : 0;
$biaya84 = isset($_POST['biaya84']) ? $_POST['biaya84'] : 0;
$biaya85 = isset($_POST['biaya85']) ? $_POST['biaya85'] : 0;
$biaya86 = isset($_POST['biaya86']) ? $_POST['biaya86'] : 0;
$biaya87 = isset($_POST['biaya87']) ? $_POST['biaya87'] : 0;
$biaya88 = isset($_POST['biaya88']) ? $_POST['biaya88'] : 0;
$biaya89 = isset($_POST['biaya89']) ? $_POST['biaya89'] : 0;
$biaya90 = isset($_POST['biaya90']) ? $_POST['biaya90'] : 0;
$biaya91 = isset($_POST['biaya91']) ? $_POST['biaya91'] : 0;
$biaya92 = isset($_POST['biaya92']) ? $_POST['biaya92'] : 0;
$biaya93 = isset($_POST['biaya93']) ? $_POST['biaya93'] : 0;
$biaya94 = isset($_POST['biaya94']) ? $_POST['biaya94'] : 0;
$biaya95 = isset($_POST['biaya95']) ? $_POST['biaya95'] : 0;
$biaya96 = isset($_POST['biaya96']) ? $_POST['biaya96'] : 0;
$biaya97 = isset($_POST['biaya97']) ? $_POST['biaya97'] : 0;
$biaya98 = isset($_POST['biaya98']) ? $_POST['biaya98'] : 0;
$biaya99 = isset($_POST['biaya99']) ? $_POST['biaya99'] : 0;
$biaya100 = isset($_POST['biaya100']) ? $_POST['biaya100'] : 0;
$biaya101 = isset($_POST['biaya101']) ? $_POST['biaya101'] : 0;
$biaya102 = isset($_POST['biaya102']) ? $_POST['biaya102'] : 0;
$biaya103 = isset($_POST['biaya103']) ? $_POST['biaya103'] : 0;
$biaya104 = isset($_POST['biaya104']) ? $_POST['biaya104'] : 0;
$biaya105 = isset($_POST['biaya105']) ? $_POST['biaya105'] : 0;
$biaya106 = isset($_POST['biaya106']) ? $_POST['biaya106'] : 0;
$biaya107 = isset($_POST['biaya107']) ? $_POST['biaya107'] : 0;
$biaya108 = isset($_POST['biaya108']) ? $_POST['biaya108'] : 0;
$biaya109 = isset($_POST['biaya109']) ? $_POST['biaya109'] : 0;
$biaya110 = isset($_POST['biaya110']) ? $_POST['biaya110'] : 0;
$biaya111 = isset($_POST['biaya111']) ? $_POST['biaya111'] : 0;
$biaya112 = isset($_POST['biaya112']) ? $_POST['biaya112'] : 0;
$biaya113 = isset($_POST['biaya113']) ? $_POST['biaya113'] : 0;
$biaya114 = isset($_POST['biaya114']) ? $_POST['biaya114'] : 0;
$biaya115 = isset($_POST['biaya115']) ? $_POST['biaya115'] : 0;
$biaya116 = isset($_POST['biaya116']) ? $_POST['biaya116'] : 0;
$biaya117 = isset($_POST['biaya117']) ? $_POST['biaya117'] : 0;
$biaya118 = isset($_POST['biaya118']) ? $_POST['biaya118'] : 0;
?>