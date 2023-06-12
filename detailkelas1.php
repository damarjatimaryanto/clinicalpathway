<?php
// require_once 'auth.php';

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect the user to the login page if not authenticated
    exit();
}
require_once 'db_connection.php';

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
$stmt = $pdo->query("SELECT * FROM checkbox_save LIMIT 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$biaya1 = isset($_SESSION['biaya1']) ? $_SESSION['biaya1'] : $row['biaya1'];
$biaya2 = isset($_SESSION['biaya2']) ? $_SESSION['biaya2'] : $row['biaya2'];
$biaya3 = isset($_SESSION['biaya3']) ? $_SESSION['biaya3'] : $row['biaya3'];
$biaya4 = isset($_SESSION['biaya4']) ? $_SESSION['biaya4'] : $row['biaya4'];
$biaya5 = isset($_SESSION['biaya5']) ? $_SESSION['biaya5'] : $row['biaya5'];
$biaya6 = isset($_SESSION['biaya6']) ? $_SESSION['biaya6'] : $row['biaya6'];
$biaya7 = isset($_SESSION['biaya7']) ? $_SESSION['biaya7'] : $row['biaya7'];
$biaya8 = isset($_SESSION['biaya8']) ? $_SESSION['biaya8'] : $row['biaya8'];
$biaya9 = isset($_SESSION['biaya9']) ? $_SESSION['biaya9'] : $row['biaya9'];
$biaya10 = isset($_SESSION['biaya10']) ? $_SESSION['biaya10'] : $row['biaya10'];
$biaya11 = isset($_SESSION['biaya11']) ? $_SESSION['biaya11'] : $row['biaya11'];
$biaya12 = isset($_SESSION['biaya12']) ? $_SESSION['biaya12'] : $row['biaya12'];

// Update checkbox values when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Update session variables with checkbox values
    $_SESSION['biaya1'] = $biaya1;
    $_SESSION['biaya2'] = $biaya2;
    $_SESSION['biaya3'] = $biaya3;
    $_SESSION['biaya4'] = $biaya4;
    $_SESSION['biaya5'] = $biaya5;
    $_SESSION['biaya6'] = $biaya6;
    $_SESSION['biaya7'] = $biaya7;
    $_SESSION['biaya8'] = $biaya8;
    $_SESSION['biaya9'] = $biaya9;
    $_SESSION['biaya10'] = $biaya10;
    $_SESSION['biaya11'] = $biaya11;
    $_SESSION['biaya12'] = $biaya12;

    if ($row) {
        // Prepare and execute an SQL statement to update the checkbox values
        $stmt = $pdo->prepare("UPDATE checkbox_save SET biaya1 = ?, biaya2 = ?, biaya3 = ?, biaya4 = ?, biaya5 = ?, biaya6 = ?, biaya7 = ?, biaya8 = ?, biaya9 = ?, biaya10 = ?, biaya11 = ?, biaya12 = ?");
        $stmt->execute([$biaya1, $biaya2, $biaya3, $biaya4, $biaya5, $biaya6, $biaya7, $biaya8, $biaya9, $biaya10, $biaya11, $biaya12]);
    } else {
        // Prepare and execute an SQL statement to insert the checkbox values
        $stmt = $pdo->prepare("INSERT INTO checkbox_save (biaya1, biaya2, biaya3, biaya4, biaya5, biaya6, biaya7, biaya8, biaya9, biaya10, biaya11, biaya12) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?)");
        $stmt->execute([$biaya1, $biaya2, $biaya3, $biaya4, $biaya5, $biaya6, $biaya7, $biaya8, $biaya9, $biaya10, $biaya11, $biaya12]);
    }

    // Redirect back to index.php
    header("Location: detailkelas1.php?nomr=echo $nomr");
    exit();
} elseif (!$row) {
    // If no checkbox data is found in the database, insert default values
    $stmt = $pdo->prepare("INSERT INTO checkbox_save (biaya1, biaya2, biaya3, biaya4, biaya5, biaya6, biaya7, biaya8, biaya9, biaya10, biaya11, biaya12) VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<script>
    function formatRupiah(angka) {
        var bilangan = angka.toString().replace(/[^,\d]/g, '');
        var split = bilangan.split(',');
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp' + rupiah;
    }

    function unformat(value) {
        // Remove non-numeric characters from the value
        var unformattedValue = value.replace(/[^\d.-]/g, '');

        // Convert the unformatted value to a numeric value
        var numericValue = parseFloat(unformattedValue);

        return numericValue;
    }


    function hitungTotal() {
        var checkboxes = document.getElementsByTagName("input");

        var total = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya1" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
            if (checkboxes[i].name === "biaya2" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
            if (checkboxes[i].name === "biaya3" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
            if (checkboxes[i].name === "biaya4" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
            if (checkboxes[i].name === "biaya5" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
            if (checkboxes[i].name === "biaya6" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
        }

        var totalRupiah = formatRupiah(total);
        document.getElementById("total").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal2() {
        var checkboxes = document.getElementsByTagName("input");

        var total2 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya7" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
            if (checkboxes[i].name === "biaya8" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
            if (checkboxes[i].name === "biaya9" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
            if (checkboxes[i].name === "biaya10" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
            if (checkboxes[i].name === "biaya11" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
            if (checkboxes[i].name === "biaya12" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
        }

        var totalRupiah = formatRupiah(total2);
        document.getElementById("total2").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal3() {
        var checkboxes = document.getElementsByTagName("input");

        var total3 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya13" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
            if (checkboxes[i].name === "biaya14" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
            if (checkboxes[i].name === "biaya15" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
            if (checkboxes[i].name === "biaya16" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
            if (checkboxes[i].name === "biaya17" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
            if (checkboxes[i].name === "biaya18" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
        }

        var totalRupiah = formatRupiah(total3);
        document.getElementById("total3").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal4() {
        var checkboxes = document.getElementsByTagName("input");

        var total4 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya19" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
            if (checkboxes[i].name === "biaya20" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
            if (checkboxes[i].name === "biaya21" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
            if (checkboxes[i].name === "biaya22" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
            if (checkboxes[i].name === "biaya23" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
            if (checkboxes[i].name === "biaya24" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
        }

        var totalRupiah = formatRupiah(total4);
        document.getElementById("total4").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal5() {
        var checkboxes = document.getElementsByTagName("input");

        var total5 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya25" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
            if (checkboxes[i].name === "biaya26" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
            if (checkboxes[i].name === "biaya27" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
            if (checkboxes[i].name === "biaya28" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
            if (checkboxes[i].name === "biaya29" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
            if (checkboxes[i].name === "biaya30" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
        }

        var totalRupiah = formatRupiah(total5);
        document.getElementById("total5").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal6() {
        var checkboxes = document.getElementsByTagName("input");

        var total6 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya31" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }
            if (checkboxes[i].name === "biaya32" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }
            if (checkboxes[i].name === "biaya33" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }
            if (checkboxes[i].name === "biaya34" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }
            if (checkboxes[i].name === "biaya35" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }
            if (checkboxes[i].name === "biaya36" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total6);
        document.getElementById("total6").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal7() {
        var checkboxes = document.getElementsByTagName("input");

        var total7 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya37" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }
            if (checkboxes[i].name === "biaya38" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }
            if (checkboxes[i].name === "biaya39" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }
            if (checkboxes[i].name === "biaya40" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }
            if (checkboxes[i].name === "biaya41" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }
            if (checkboxes[i].name === "biaya42" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total7);
        document.getElementById("total7").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal8() {
        var checkboxes = document.getElementsByTagName("input");

        var total8 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya43" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }
            if (checkboxes[i].name === "biaya44" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }
            if (checkboxes[i].name === "biaya45" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }
            if (checkboxes[i].name === "biaya46" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }
            if (checkboxes[i].name === "biaya47" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }
            if (checkboxes[i].name === "biaya48" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total8);
        document.getElementById("total8").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal9() {
        var checkboxes = document.getElementsByTagName("input");

        var total9 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya49" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }
            if (checkboxes[i].name === "biaya50" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }
            if (checkboxes[i].name === "biaya51" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }
            if (checkboxes[i].name === "biaya52" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }
            if (checkboxes[i].name === "biaya53" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }
            if (checkboxes[i].name === "biaya54" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total9);
        document.getElementById("total9").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal10() {
        var checkboxes = document.getElementsByTagName("input");

        var total10 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya55" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }
            if (checkboxes[i].name === "biaya56" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }
            if (checkboxes[i].name === "biaya57" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }
            if (checkboxes[i].name === "biaya58" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }
            if (checkboxes[i].name === "biaya59" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }
            if (checkboxes[i].name === "biaya60" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total10);
        document.getElementById("total10").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal11() {
        var checkboxes = document.getElementsByTagName("input");

        var total11 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya61" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }
            if (checkboxes[i].name === "biaya62" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }
            if (checkboxes[i].name === "biaya63" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }
            if (checkboxes[i].name === "biaya64" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }
            if (checkboxes[i].name === "biaya65" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }
            if (checkboxes[i].name === "biaya66" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total11);
        document.getElementById("total11").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal12() {
        var checkboxes = document.getElementsByTagName("input");

        var total12 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya67" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }
            if (checkboxes[i].name === "biaya68" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }
            if (checkboxes[i].name === "biaya69" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }
            if (checkboxes[i].name === "biaya70" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }
            if (checkboxes[i].name === "biaya71" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }
            if (checkboxes[i].name === "biaya72" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total12);
        document.getElementById("total12").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal13() {
        var checkboxes = document.getElementsByTagName("input");

        var total13 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya73" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }
            if (checkboxes[i].name === "biaya74" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }
            if (checkboxes[i].name === "biaya75" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }
            if (checkboxes[i].name === "biaya76" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }
            if (checkboxes[i].name === "biaya77" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }
            if (checkboxes[i].name === "biaya78" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total13);
        document.getElementById("total13").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal14() {
        var checkboxes = document.getElementsByTagName("input");

        var total14 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya79" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }
            if (checkboxes[i].name === "biaya80" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }
            if (checkboxes[i].name === "biaya81" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }
            if (checkboxes[i].name === "biaya82" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }
            if (checkboxes[i].name === "biaya83" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }
            if (checkboxes[i].name === "biaya84" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total14);
        document.getElementById("total14").innerHTML = "" + totalRupiah;

        calculateSum();
    }


    function hitungTotal15() {
        var checkboxes = document.getElementsByTagName("input");

        var total15 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya85" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }
            if (checkboxes[i].name === "biaya86" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }
            if (checkboxes[i].name === "biaya87" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }
            if (checkboxes[i].name === "biaya88" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }
            if (checkboxes[i].name === "biaya89" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }
            if (checkboxes[i].name === "biaya90" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total15);
        document.getElementById("total15").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal16() {
        var checkboxes = document.getElementsByTagName("input");

        var total16 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya91" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }
            if (checkboxes[i].name === "biaya92" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }
            if (checkboxes[i].name === "biaya93" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }
            if (checkboxes[i].name === "biaya94" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }
            if (checkboxes[i].name === "biaya95" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }
            if (checkboxes[i].name === "biaya96" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total16);
        document.getElementById("total16").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal17() {
        var checkboxes = document.getElementsByTagName("input");

        var total17 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya97" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }
            if (checkboxes[i].name === "biaya98" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }
            if (checkboxes[i].name === "biaya99" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }
            if (checkboxes[i].name === "biaya100" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }
            if (checkboxes[i].name === "biaya101" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }
            if (checkboxes[i].name === "biaya102" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total17);
        document.getElementById("total17").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal18() {
        var checkboxes = document.getElementsByTagName("input");

        var total18 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya103" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya104" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya105" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya106" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya107" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya108" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya109" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya110" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya111" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya112" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya113" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya114" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total18);
        document.getElementById("total18").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal19() {
        var checkboxes = document.getElementsByTagName("input");

        var total19 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya115" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }
            if (checkboxes[i].name === "biaya116" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }
            if (checkboxes[i].name === "biaya117" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }
            if (checkboxes[i].name === "biaya118" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }
            if (checkboxes[i].name === "biaya119" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }
            if (checkboxes[i].name === "biaya120" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total19);
        document.getElementById("total19").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal20() {
        var checkboxes = document.getElementsByTagName("input");

        var total20 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya121" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }
            if (checkboxes[i].name === "biaya122" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }
            if (checkboxes[i].name === "biaya123" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }
            if (checkboxes[i].name === "biaya124" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }
            if (checkboxes[i].name === "biaya125" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }
            if (checkboxes[i].name === "biaya126" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total20);
        document.getElementById("total20").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal21() {
        var checkboxes = document.getElementsByTagName("input");

        var total21 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya127" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }
            if (checkboxes[i].name === "biaya128" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }
            if (checkboxes[i].name === "biaya129" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }
            if (checkboxes[i].name === "biaya130" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }
            if (checkboxes[i].name === "biaya131" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }
            if (checkboxes[i].name === "biaya132" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total21);
        document.getElementById("total21").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal22() {
        var checkboxes = document.getElementsByTagName("input");

        var total22 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya133" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }
            if (checkboxes[i].name === "biaya134" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }
            if (checkboxes[i].name === "biaya135" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }
            if (checkboxes[i].name === "biaya136" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }
            if (checkboxes[i].name === "biaya137" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }
            if (checkboxes[i].name === "biaya138" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total22);
        document.getElementById("total22").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal23() {
        var checkboxes = document.getElementsByTagName("input");

        var total23 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya139" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }
            if (checkboxes[i].name === "biaya140" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }
            if (checkboxes[i].name === "biaya141" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }
            if (checkboxes[i].name === "biaya142" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }
            if (checkboxes[i].name === "biaya143" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }
            if (checkboxes[i].name === "biaya144" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total23);
        document.getElementById("total23").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal24() {
        var checkboxes = document.getElementsByTagName("input");

        var total24 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya145" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }
            if (checkboxes[i].name === "biaya146" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }
            if (checkboxes[i].name === "biaya147" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }
            if (checkboxes[i].name === "biaya148" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }
            if (checkboxes[i].name === "biaya149" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }
            if (checkboxes[i].name === "biaya150" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total24);
        document.getElementById("total24").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal25() {
        var checkboxes = document.getElementsByTagName("input");

        var total25 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya151" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }
            if (checkboxes[i].name === "biaya152" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }
            if (checkboxes[i].name === "biaya153" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }
            if (checkboxes[i].name === "biaya154" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }
            if (checkboxes[i].name === "biaya155" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }
            if (checkboxes[i].name === "biaya156" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total25);
        document.getElementById("total25").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal26() {
        var checkboxes = document.getElementsByTagName("input");

        var total26 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya157" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }
            if (checkboxes[i].name === "biaya158" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }
            if (checkboxes[i].name === "biaya159" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }
            if (checkboxes[i].name === "biaya160" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }
            if (checkboxes[i].name === "biaya161" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }
            if (checkboxes[i].name === "biaya162" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total26);
        document.getElementById("total26").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal27() {
        var checkboxes = document.getElementsByTagName("input");

        var total27 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya163" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }
            if (checkboxes[i].name === "biaya164" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }
            if (checkboxes[i].name === "biaya165" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }
            if (checkboxes[i].name === "biaya166" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }
            if (checkboxes[i].name === "biaya167" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }
            if (checkboxes[i].name === "biaya168" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total27);
        document.getElementById("total27").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal28() {
        var checkboxes = document.getElementsByTagName("input");

        var total28 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya169" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }
            if (checkboxes[i].name === "biaya170" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }
            if (checkboxes[i].name === "biaya171" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }
            if (checkboxes[i].name === "biaya172" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }
            if (checkboxes[i].name === "biaya173" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }
            if (checkboxes[i].name === "biaya174" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total28);
        document.getElementById("total28").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal29() {
        var checkboxes = document.getElementsByTagName("input");

        var total29 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya175" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }
            if (checkboxes[i].name === "biaya176" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }
            if (checkboxes[i].name === "biaya177" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }
            if (checkboxes[i].name === "biaya178" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }
            if (checkboxes[i].name === "biaya179" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }
            if (checkboxes[i].name === "biaya180" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total29);
        document.getElementById("total29").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal30() {
        var checkboxes = document.getElementsByTagName("input");

        var total30 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya181" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }
            if (checkboxes[i].name === "biaya182" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }
            if (checkboxes[i].name === "biaya183" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }
            if (checkboxes[i].name === "biaya184" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }
            if (checkboxes[i].name === "biaya185" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }
            if (checkboxes[i].name === "biaya186" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total30);
        document.getElementById("total30").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal31() {
        var checkboxes = document.getElementsByTagName("input");

        var total31 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya187" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }
            if (checkboxes[i].name === "biaya188" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }
            if (checkboxes[i].name === "biaya189" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }
            if (checkboxes[i].name === "biaya190" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }
            if (checkboxes[i].name === "biaya191" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }
            if (checkboxes[i].name === "biaya192" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total31);
        document.getElementById("total31").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal32() {
        var checkboxes = document.getElementsByTagName("input");

        var total32 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya193" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }
            if (checkboxes[i].name === "biaya194" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }
            if (checkboxes[i].name === "biaya195" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }
            if (checkboxes[i].name === "biaya196" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }
            if (checkboxes[i].name === "biaya197" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }
            if (checkboxes[i].name === "biaya198" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total32);
        document.getElementById("total32").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal33() {
        var checkboxes = document.getElementsByTagName("input");

        var total33 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya199" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }
            if (checkboxes[i].name === "biaya200" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }
            if (checkboxes[i].name === "biaya201" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }
            if (checkboxes[i].name === "biaya202" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }
            if (checkboxes[i].name === "biaya203" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }
            if (checkboxes[i].name === "biaya204" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total33);
        document.getElementById("total33").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal34() {
        var checkboxes = document.getElementsByTagName("input");

        var total34 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya205" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }
            if (checkboxes[i].name === "biaya206" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }
            if (checkboxes[i].name === "biaya207" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }
            if (checkboxes[i].name === "biaya208" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }
            if (checkboxes[i].name === "biaya209" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }
            if (checkboxes[i].name === "biaya210" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total34);
        document.getElementById("total34").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal35() {
        var checkboxes = document.getElementsByTagName("input");

        var total35 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya211" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }
            if (checkboxes[i].name === "biaya212" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }
            if (checkboxes[i].name === "biaya213" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }
            if (checkboxes[i].name === "biaya214" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }
            if (checkboxes[i].name === "biaya215" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }
            if (checkboxes[i].name === "biaya216" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total35);
        document.getElementById("total35").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal36() {
        var checkboxes = document.getElementsByTagName("input");

        var total36 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya217" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }
            if (checkboxes[i].name === "biaya218" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }
            if (checkboxes[i].name === "biaya219" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }
            if (checkboxes[i].name === "biaya220" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }
            if (checkboxes[i].name === "biaya221" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }
            if (checkboxes[i].name === "biaya222" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total36);
        document.getElementById("total36").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal37() {
        var checkboxes = document.getElementsByTagName("input");

        var total37 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya223" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }
            if (checkboxes[i].name === "biaya224" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }
            if (checkboxes[i].name === "biaya225" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }
            if (checkboxes[i].name === "biaya226" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }
            if (checkboxes[i].name === "biaya227" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }
            if (checkboxes[i].name === "biaya228" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total37);
        document.getElementById("total37").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal38() {
        var checkboxes = document.getElementsByTagName("input");

        var total38 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya229" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }
            if (checkboxes[i].name === "biaya230" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }
            if (checkboxes[i].name === "biaya231" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }
            if (checkboxes[i].name === "biaya232" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }
            if (checkboxes[i].name === "biaya233" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }
            if (checkboxes[i].name === "biaya234" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total38);
        document.getElementById("total38").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal39() {
        var checkboxes = document.getElementsByTagName("input");

        var total39 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya235" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }
            if (checkboxes[i].name === "biaya236" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }
            if (checkboxes[i].name === "biaya237" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }
            if (checkboxes[i].name === "biaya238" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }
            if (checkboxes[i].name === "biaya239" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }
            if (checkboxes[i].name === "biaya240" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total39);
        document.getElementById("total39").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal40() {
        var checkboxes = document.getElementsByTagName("input");

        var total40 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya241" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }
            if (checkboxes[i].name === "biaya242" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }
            if (checkboxes[i].name === "biaya243" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }
            if (checkboxes[i].name === "biaya244" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }
            if (checkboxes[i].name === "biaya245" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }
            if (checkboxes[i].name === "biaya246" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total40);
        document.getElementById("total40").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal41() {
        var checkboxes = document.getElementsByTagName("input");

        var total41 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya247" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }
            if (checkboxes[i].name === "biaya248" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }
            if (checkboxes[i].name === "biaya249" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }
            if (checkboxes[i].name === "biaya250" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }
            if (checkboxes[i].name === "biaya251" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }
            if (checkboxes[i].name === "biaya252" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total41);
        document.getElementById("total41").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal42() {
        var checkboxes = document.getElementsByTagName("input");

        var total42 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya253" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }
            if (checkboxes[i].name === "biaya254" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }
            if (checkboxes[i].name === "biaya255" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }
            if (checkboxes[i].name === "biaya256" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }
            if (checkboxes[i].name === "biaya257" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }
            if (checkboxes[i].name === "biaya258" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total42);
        document.getElementById("total42").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal43() {
        var checkboxes = document.getElementsByTagName("input");

        var total43 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya259" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }
            if (checkboxes[i].name === "biaya260" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }
            if (checkboxes[i].name === "biaya261" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }
            if (checkboxes[i].name === "biaya262" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }
            if (checkboxes[i].name === "biaya263" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }
            if (checkboxes[i].name === "biaya264" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total43);
        document.getElementById("total43").innerHTML = "" + totalRupiah;

        calculateSum();
    }


    function calculateSum() {
        var checkboxes = document.getElementsByTagName("input");
        var totalSum = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                totalSum += biaya;
            }
        }

        totalSum -= 2; // Subtract 2 from totalSum //sementara hasil -2 xixixi


        var totalRupiah = formatRupiah(totalSum);
        document.getElementById("totalSum").innerHTML = "" + totalRupiah;
    }


    // $(document).ready(function() {
    //   $('#customCheckbox1a11').change(function() {
    //     var isChecked = $(this).is(':checked');

    //     $.ajax({
    //       url: 'save_checkbox_state.php',
    //       method: 'POST',
    //       data: { isChecked: isChecked },
    //       success: function(response) {
    //         // Optional success callback
    //       }
    //     });
    //   });
    // });

    // $(window).on('load', function() {
    //   $.ajax({
    //     url: 'get_checkbox_state.php',
    //     method: 'GET',
    //     success: function(response) {
    //       var isChecked = response === 'true';
    //       $('#customCheckbox1a11').prop('checked', isChecked);
    //     }
    //   });
    // });
</script>





<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SINAPS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#customCheckbox1a11').change(function() {
                var isChecked = $(this).is(':checked');

                $.ajax({
                    url: 'save_checkbox_state.php',
                    method: 'POST',
                    data: {
                        isChecked: isChecked
                    },
                    success: function(response) {
                        // Optional success callback
                    }
                });
            });
        });

        $(window).on('load', function() {
            $.ajax({
                url: 'get_checkbox_state.php',
                method: 'GET',
                success: function(response) {
                    var isChecked = response === 'true';
                    $('#customCheckbox1a11').prop('checked', isChecked);
                }
            });
        });
    </script>

</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="assets/index3.html" class="brand-link">
                <img src="img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SINAPS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">User</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="assets/index.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="assets/index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="assets/index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Widgets
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="kelas1.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pasien Kelas I

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="kelas2.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pasien Kelas II

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="kelas3.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pasien Kelas III

                                </p>
                            </a>
                        </li>







                    </ul>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pasien</h3>

                                    <div class="card-tools">

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Nama Pasien</th>
                                                <th style="text-align:center;">No. RM</th>
                                                <th style="text-align:center;">Tgl. Masuk</th>
                                                <th style="text-align:center;">Tgl. Keluar</th>
                                                <th style="text-align:center;">DX Medis Utama</th>
                                                <th style="text-align:center;">DX Medis Sekunder</th>
                                                <th style="text-align:center;">ICD 10</th>
                                                <th style="text-align:center;">ICD 9</th>
                                                <th style="text-align:center;">Kelas BPJS</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $nomr = $_GET["nomr"];
                                            // Assuming you have established a database connection
                                            $sql = mysqli_query($conn, "SELECT * FROM simrs2012.m_pasien a
                                            left join simrs2012.t_admission b
                                            ON simrs2012.a.NOMR = simrs2012.b.NOMR
                                            left join simrs2012.t_Sep c ON simrs2012.a.NOMR = simrs2012.c.NOMR
                                            where simrs2012.a.NOMR='$nomr'");
                                            $result = mysqli_fetch_array($sql);

                                            $nama = $result["NAMA"];
                                            $nomr = $result["NOMR"];
                                            $alamat = $result["ALAMAT"];
                                            $tanggalmasuk = $result["masukrs"];
                                            $tanggalkeluar = $result["keluarrs"];
                                            $dxmedis = $result["kode_diagnosaawal"]

                                            // Check if there are any rows returned from the query
                                            // print_r($result);
                                            ?>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $nama; ?></td>
                                                <td style="text-align:center;"><?php echo $nomr; ?></td>
                                                <td style="text-align:center;"><?php echo $tanggalmasuk; ?></td>
                                                <td style="text-align:center;"><?php echo $tanggalkeluar; ?></td>
                                                <td style="text-align:center;">
                                                    <select class="form-control">
                                                        <option>-</option>
                                                        <option>cerebral infarction (i63.9)</option>
                                                        <option>intracerebral haemorrhage(I61.9)</option>
                                                    </select></th>
                                                </td>
                                                <td style="text-align:center;">
                                                    <select class="form-control">
                                                        <option>-</option>
                                                        <option>hemiplegi(G81)</option>
                                                        <option>Congestive heart failure (I50.0)</option>
                                                    </select></th>
                                                </td>
                                                <td style="text-align:center;"><?php echo $dxmedis; ?></td>
                                                <td style="text-align:center;">-</td>
                                                <td style="text-align:center;">1</td>
                                                
                                            </tr>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <div class="card">

                                <!-- <div class="card-header">
                                    
                                    <h3 class="card-title">Detail Data Pasien</h3>
                                </div> -->
                                <form method="POST" action="detailkelas1.php?">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered ">

                                            <thead>
                                                <tr>
                                                    <th rowspan="2">No.</th>
                                                    <th rowspan="2">Kegiatan</th>
                                                    <th rowspan="2">Uraian Kegiatan</th>
                                                    <th colspan="6" class="text-center">Hari</th>
                                                    <th rowspan="2">Keterangan</th>
                                                    <th rowspan="2">Biaya</th>
                                                </tr>

                                                <tr>
                                                    <th>1</th>
                                                    <th>2</th>
                                                    <th>3</th>
                                                    <th>4</th>
                                                    <th>5</th>
                                                    <th>6</th>
                                                </tr>
                                            </thead>



                                            <tbody>
                                                <!-- Nomor 1 -->
                                                <tr>
                                                    <td rowspan="5">1</td>
                                                    <td rowspan="2">a. Asesment awal Medis</td>
                                                    <td>Dokter IGD</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a11" name="biaya1" value="15000" onchange="hitungTotal()">
                                                            <label for="customCheckbox1a11" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a12" name="biaya2" value="15000" onchange="hitungTotal()">
                                                            <label for="customCheckbox1a12" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a13" name="biaya3" value="15000" onchange="hitungTotal()">
                                                            <label for="customCheckbox1a13" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a14" name="biaya4" value="15000" onchange="hitungTotal()">
                                                            <label for="customCheckbox1a14" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a15" name="biaya5" value="15000" onchange="hitungTotal()">
                                                            <label for="customCheckbox1a15" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a16" name="biaya6" value="15000" onchange="hitungTotal()">
                                                            <label for="customCheckbox1a16" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td> -</td>



                                                    <td>
                                                        <p id="total">Rp-</p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>DPJP</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a21" name="biaya7" value="20000" onchange="hitungTotal2()">
                                                            <label for="customCheckbox1a21" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a22" name="biaya8" value="20000" onchange="hitungTotal2()">
                                                            <label for="customCheckbox1a22" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a23" name="biaya9" value="20000" onchange="hitungTotal2()">
                                                            <label for="customCheckbox1a23" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a24" name="biaya10" value="20000" onchange="hitungTotal2()">
                                                            <label for="customCheckbox1a24" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a25" name="biaya11" value="20000" onchange="hitungTotal2()">
                                                            <label for="customCheckbox1a25" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1a26" name="biaya12" value="20000" onchange="hitungTotal2()">
                                                            <label for="customCheckbox1a26" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total2">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td rowspan="3">b. Asesment awal Keperawatan</td>
                                                    <td>IGD / Poli</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b11" name="biaya13" value="5000" onchange="hitungTotal3()">
                                                            <label for="customCheckbox1b11" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b12" name="biaya14" value="5000" onchange="hitungTotal3()">
                                                            <label for="customCheckbox1b12" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b13" name="biaya15" value="5000" onchange="hitungTotal3()">
                                                            <label for="customCheckbox1b13" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b14" name="biaya16" value="5000" onchange="hitungTotal3()">
                                                            <label for="customCheckbox1b14" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b15" name="biaya17" value="5000" onchange="hitungTotal3()">
                                                            <label for="customCheckbox1b15" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b16" name="biaya18" value="5000" onchange="hitungTotal3()">
                                                            <label for="customCheckbox1b16" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        <p id="total3">Rp-</p>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>Poli Klinik</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b21" name="biaya19" value="2500" onchange="hitungTotal4()">
                                                            <label for="customCheckbox1b21" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b22" name="biaya20" value="2500" onchange="hitungTotal4()">
                                                            <label for="customCheckbox1b22" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b23" name="biaya21" value="2500" onchange="hitungTotal4()">
                                                            <label for="customCheckbox1b23" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b24" name="biaya22" value="2500" onchange="hitungTotal4()">
                                                            <label for="customCheckbox1b24" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b25" name="biaya23" value="2500" onchange="hitungTotal4()">
                                                            <label for="customCheckbox1b25" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1b26" name="biaya24" value="2500" onchange="hitungTotal4()">
                                                            <label for="customCheckbox1b26" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total4">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Rawat Inap</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1231" name="biaya25" value="13000" onchange="hitungTotal5()">
                                                            <label for="customCheckbox1231" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1232" name="biaya26" value="13000" onchange="hitungTotal5()">
                                                            <label for="customCheckbox1232" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1233" name="biaya27" value="13000" onchange="hitungTotal5()">
                                                            <label for="customCheckbox1233" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1234" name="biaya28" value="13000" onchange="hitungTotal5()">
                                                            <label for="customCheckbox1234" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1235" name="biaya29" value="13000" onchange="hitungTotal5()">
                                                            <label for="customCheckbox1235" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1236" name="biaya30" value="13000" onchange="hitungTotal5()">
                                                            <label for="customCheckbox1236" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total5">Rp-</p>
                                                    </td>

                                                </tr>

                                                <!-- Nomor 2 -->
                                                <tr>
                                                    <td rowspan="13">2</td>
                                                    <td rowspan="13">Laboratorium</td>

                                                </tr>
                                                <tr>

                                                    <td>Darah Lengkap</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2111" name="biaya31" value="56000" onchange="hitungTotal6()">
                                                            <label for="customCheckbox2111" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2112" name="biaya32" value="56000" onchange="hitungTotal6()">
                                                            <label for="customCheckbox2112" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2113" name="biaya33" value="56000" onchange="hitungTotal6()">
                                                            <label for="customCheckbox2113" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2114" name="biaya34" value="56000" onchange="hitungTotal6()">
                                                            <label for="customCheckbox2114" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2115" name="biaya35" value="56000" onchange="hitungTotal6()">
                                                            <label for="customCheckbox2115" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2116" name="biaya36" value="56000" onchange="hitungTotal6()">
                                                            <label for="customCheckbox2116" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total6">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Urenium Kriatin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2121" name="biaya37" value="26500" onchange="hitungTotal7()">
                                                            <label for="customCheckbox2121" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2122" name="biaya38" value="26500" onchange="hitungTotal7()">
                                                            <label for="customCheckbox2122" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2123" name="biaya39" value="26500" onchange="hitungTotal7()">
                                                            <label for="customCheckbox2123" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2124" name="biaya40" value="26500" onchange="hitungTotal7()">
                                                            <label for="customCheckbox2124" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2125" name="biaya41" value="26500" onchange="hitungTotal7()">
                                                            <label for="customCheckbox2125" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2126" name="biaya42" value="26500" onchange="hitungTotal7()">
                                                            <label for="customCheckbox2126" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total7">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>GDS</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2131" name="biaya43" value="24000" onchange="hitungTotal8()">
                                                            <label for="customCheckbox2131" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2132" name="biaya44" value="24000" onchange="hitungTotal8()">
                                                            <label for="customCheckbox2132" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2133" name="biaya45" value="24000" onchange="hitungTotal8()">
                                                            <label for="customCheckbox2133" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2134" name="biaya46" value="24000" onchange="hitungTotal8()">
                                                            <label for="customCheckbox2134" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2135" name="biaya47" value="24000" onchange="hitungTotal8()">
                                                            <label for="customCheckbox2135" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2136" name="biaya48" value="24000" onchange="hitungTotal8()">
                                                            <label for="customCheckbox2136" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total8">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Elektrolit</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2141" name="biaya49" value="91000" onchange="hitungTotal9()">
                                                            <label for="customCheckbox2141" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2142" name="biaya50" value="91000" onchange="hitungTotal9()">
                                                            <label for="customCheckbox2142" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2143" name="biaya51" value="91000" onchange="hitungTotal9()">
                                                            <label for="customCheckbox2143" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2144" name="biaya52" value="91000" onchange="hitungTotal9()">
                                                            <label for="customCheckbox2144" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2145" name="biaya53" value="91000" onchange="hitungTotal9()">
                                                            <label for="customCheckbox2145" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2146" name="biaya54" value="91000" onchange="hitungTotal9()">
                                                            <label for="customCheckbox2146" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total9">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Asam Urat</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2151" name="biaya55" value="14500" onchange="hitungTotal10()">
                                                            <label for="customCheckbox2151" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2152" name="biaya56" value="14500" onchange="hitungTotal10()">
                                                            <label for="customCheckbox2152" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2153" name="biaya57" value="14500" onchange="hitungTotal10()">
                                                            <label for="customCheckbox2153" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2154" name="biaya58" value="14500" onchange="hitungTotal10()">
                                                            <label for="customCheckbox2154" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2155" name="biaya59" value="14500" onchange="hitungTotal10()">
                                                            <label for="customCheckbox2155" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2156" name="biaya60" value="14500" onchange="hitungTotal10()">
                                                            <label for="customCheckbox2156" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total10">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>GDP</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2161" name="biaya61" value="24000" onchange="hitungTotal11()">
                                                            <label for="customCheckbox2161" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2162" name="biaya62" value="24000" onchange="hitungTotal11()">
                                                            <label for="customCheckbox2162" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2163" name="biaya63" value="24000" onchange="hitungTotal11()">
                                                            <label for="customCheckbox2163" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2164" name="biaya64" value="24000" onchange="hitungTotal11()">
                                                            <label for="customCheckbox2164" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2165" name="biaya65" value="24000" onchange="hitungTotal11()">
                                                            <label for="customCheckbox2165" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2166" name="biaya66" value="24000" onchange="hitungTotal11()">
                                                            <label for="customCheckbox2166" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total11">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>GD2PP</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2171" name="biaya67" value="24000" onchange="hitungTotal12()">
                                                            <label for="customCheckbox2171" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2172" name="biaya67" value="24000" onchange="hitungTotal12()">
                                                            <label for="customCheckbox2172" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2173" name="biaya69" value="24000" onchange="hitungTotal12()">
                                                            <label for="customCheckbox2173" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2174" name="biaya70" value="24000" onchange="hitungTotal12()">
                                                            <label for="customCheckbox2174" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2175" name="biaya71" value="24000" onchange="hitungTotal12()">
                                                            <label for="customCheckbox2175" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2176" name="biaya72" value="24000" onchange="hitungTotal12()">
                                                            <label for="customCheckbox2176" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total12">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>LDL</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2181" name="biaya73" value="0" onchange="hitungTotal13()">
                                                            <label for="customCheckbox2181" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2182" name="biaya74" value="0" onchange="hitungTotal13()">
                                                            <label for="customCheckbox2182" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2183" name="biaya75" value="0" onchange="hitungTotal13()">
                                                            <label for="customCheckbox2183" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2184" name="biaya76" value="0" onchange="hitungTotal13()">
                                                            <label for="customCheckbox2184" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2185" name="biaya77" value="0" onchange="hitungTotal13()">
                                                            <label for="customCheckbox2185" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2186" name="biaya78" value="0" onchange="hitungTotal13()">
                                                            <label for="customCheckbox2186" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total13">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>HDL</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2191" name="biaya79" value="29000" onchange="hitungTotal14()">
                                                            <label for="customCheckbox2191" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2192" name="biaya80" value="29000" onchange="hitungTotal14()">
                                                            <label for="customCheckbox2192" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2193" name="biaya81" value="29000" onchange="hitungTotal14()">
                                                            <label for="customCheckbox2193" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2194" name="biaya82" value="29000" onchange="hitungTotal14()">
                                                            <label for="customCheckbox2194" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2195" name="biaya83" value="29000" onchange="hitungTotal14()">
                                                            <label for="customCheckbox2195" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2196" name="biaya84" value="29000" onchange="hitungTotal14()">
                                                            <label for="customCheckbox2196" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total14">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Trigliserida</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21101" name="biaya85" value="24000" onchange="hitungTotal15()">
                                                            <label for="customCheckbox21101" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21102" name="biaya86" value="24000" onchange="hitungTotal15()">
                                                            <label for="customCheckbox21102" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21103" name="biaya87" value="24000" onchange="hitungTotal15()">
                                                            <label for="customCheckbox21103" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21104" name="biaya88" value="24000" onchange="hitungTotal15()">
                                                            <label for="customCheckbox21104" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21105" name="biaya89" value="24000" onchange="hitungTotal15()">
                                                            <label for="customCheckbox21105" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21106" name="biaya90" value="24000" onchange="hitungTotal15()">
                                                            <label for="customCheckbox21106" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total15">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Kolesterol Total</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21111" name="biaya91" value="24000" onchange="hitungTotal16()">
                                                            <label for="customCheckbox21111" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21112" name="biaya92" value="24000" onchange="hitungTotal16()">
                                                            <label for="customCheckbox21112" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21113" name="biaya93" value="24000" onchange="hitungTotal16()">
                                                            <label for="customCheckbox21113" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21114" name="biaya94" value="24000" onchange="hitungTotal16()">
                                                            <label for="customCheckbox21114" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21115" name="biaya95" value="24000" onchange="hitungTotal16()">
                                                            <label for="customCheckbox21115" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21116" name="biaya96" value="24000" onchange="hitungTotal16()">
                                                            <label for="customCheckbox21116" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total16">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>EKG</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21121" name="biaya97" value="40000" onchange="hitungTotal17()">
                                                            <label for="customCheckbox21121" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21122" name="biaya98" value="40000" onchange="hitungTotal17()">
                                                            <label for="customCheckbox21122" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21213" name="biaya99" value="40000" onchange="hitungTotal17()">
                                                            <label for="customCheckbox21213" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21214" name="biaya100" value="40000" onchange="hitungTotal17()">
                                                            <label for="customCheckbox21214" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21215" name="biaya101" value="40000" onchange="hitungTotal17()">
                                                            <label for="customCheckbox21215" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox21216" name="biaya102" value="40000" onchange="hitungTotal17()">
                                                            <label for="customCheckbox21216" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total17">Rp-</p>
                                                    </td>

                                                </tr>


                                                <!-- Nomor 3 -->
                                                <tr>
                                                    <td rowspan="2">3</td>
                                                    <td rowspan="2">Radiologi / Imaging</td>
                                                    <td>RTO Thorax</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31112" name="biaya103" value="133500" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31112" class="custom-control-label">Besar</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31111" name="biaya104" value="93300" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31111" class="custom-control-label">Sedang</label>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31122" name="biaya105" value="133500" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31122" class="custom-control-label">Besar</label>

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31121" name="biaya106" value="93300" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31121" class="custom-control-label">Sedang</label>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31132" name="biaya107" value="133500" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31132" class="custom-control-label">Besar</label>

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31131" name="biaya108" value="93300" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31131" class="custom-control-label">Sedang</label>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31142" name="biaya109" value="133500" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31142" class="custom-control-label">Besar</label>

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31141" name="biaya110" value="93300" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31141" class="custom-control-label">Sedang</label>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31152" name="biaya111" value="133500" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31152" class="custom-control-label">Besar</label>

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31151" name="biaya112" value="93300" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31151" class="custom-control-label">Sedang</label>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31162" name="biaya113" value="133500" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31162" class="custom-control-label">Besar</label>

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox31161" name="biaya114" value="93300" onchange="hitungTotal18()">
                                                            <label for="customCheckbox31161" class="custom-control-label">Sedang</label>
                                                        </div>

                                                    </td>
                                                    <td> -</td>
                                                    <td>
                                                        <p id="total18">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>CT Scan Kepala</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox3121" name="biaya115" value="670000" onchange="hitungTotal19()">
                                                            <label for="customCheckbox3121" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox3122" name="biaya116" value="670000" onchange="hitungTotal19()">
                                                            <label for="customCheckbox3122" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox3123" name="biaya117" value="670000" onchange="hitungTotal19()">
                                                            <label for="customCheckbox3123" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox3124" name="biaya118" value="670000" onchange="hitungTotal19()">
                                                            <label for="customCheckbox3124" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox3125" name="biaya119" value="670000" onchange="hitungTotal19()">
                                                            <label for="customCheckbox3125" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox3126" name="biaya120" value="670000" onchange="hitungTotal19()">
                                                            <label for="customCheckbox3126" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total19">Rp-</p>
                                                    </td>

                                                </tr>


                                                <!-- Nomor 4 -->
                                                <tr>
                                                    <td>4</td>
                                                    <td>Konsultasi</td>
                                                    <td>DPJP</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox4111" name="biaya121" value="27000" onchange="hitungTotal20()">
                                                            <label for="customCheckbox4111" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox4112" name="biaya122" value="27000" onchange="hitungTotal20()">
                                                            <label for="customCheckbox4112" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox4113" name="biaya123" value="27000" onchange="hitungTotal20()">
                                                            <label for="customCheckbox4113" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox4114" name="biaya124" value="27000" onchange="hitungTotal20()">
                                                            <label for="customCheckbox4114" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox4115" name="biaya125" value="27000" onchange="hitungTotal20()">
                                                            <label for="customCheckbox4115" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox4116" name="biaya126" value="27000" onchange="hitungTotal20()">
                                                            <label for="customCheckbox4116" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total20">Rp-</p>
                                                    </td>
                                                </tr>

                                                <!-- Nomor 5 -->
                                                <tr>
                                                    <td rowspan="4">5</td>
                                                    <td rowspan="4">Asesmen Lanjutan</td>
                                                    <td>a. Asesmen Medis</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5111" name="biaya127" value="" onchange="hitungTotal21()">
                                                            <label for="customCheckbox5111" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5112" name="biaya128" value="" onchange="hitungTotal21()">
                                                            <label for="customCheckbox5112" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5113" name="biaya129" value="" onchange="hitungTotal21()">
                                                            <label for="customCheckbox5113" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5114" name="biaya130" value="" onchange="hitungTotal21()">
                                                            <label for="customCheckbox5114" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5115" name="biaya131" value="" onchange="hitungTotal21()">
                                                            <label for="customCheckbox5115" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5116" name="biaya132" value="" onchange="hitungTotal21()">
                                                            <label for="customCheckbox5116" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td> -</td>
                                                    <td>
                                                        <p id="total21">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>b. Asesmen Keperawtan</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5121" name="biaya133" value="13000" onchange="hitungTotal22()">
                                                            <label for="customCheckbox5121" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5122" name="biaya134" value="13000" onchange="hitungTotal22()">
                                                            <label for="customCheckbox5122" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5123" name="biaya135" value="13000" onchange="hitungTotal22()">
                                                            <label for="customCheckbox5123" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5124" name="biaya136" value="13000" onchange="hitungTotal22()">
                                                            <label for="customCheckbox5124" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5125" name="biaya137" value="13000" onchange="hitungTotal22()">
                                                            <label for="customCheckbox5125" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5126" name="biaya138" value="13000" onchange="hitungTotal22()">
                                                            <label for="customCheckbox5126" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total22">Rp-</p>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td>c. Asesment Gizi</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5131" name="biaya139" value="" onchange="hitungTotal23()">
                                                            <label for="customCheckbox5131" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5132" name="biaya140" value="" onchange="hitungTotal23()">
                                                            <label for="customCheckbox5132" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5133" name="biaya141" value="" onchange="hitungTotal23()">
                                                            <label for="customCheckbox5133" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5134" name="biaya142" value="" onchange="hitungTotal23()">
                                                            <label for="customCheckbox5134" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5135" name="biaya143" value="" onchange="hitungTotal23()">
                                                            <label for="customCheckbox5135" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5136" name="biaya144" value="" onchange="hitungTotal23()">
                                                            <label for="customCheckbox5136" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total23">Rp-</p>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td>d. Asesment Farmasi</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5141" name="biaya145" value="" onchange="hitungTotal24()">
                                                            <label for="customCheckbox5141" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5142" name="biaya146" value="" onchange="hitungTotal24()">
                                                            <label for="customCheckbox5142" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5143" name="biaya147" value="" onchange="hitungTotal24()">
                                                            <label for="customCheckbox5143" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5144" name="biaya148" value="" onchange="hitungTotal24()">
                                                            <label for="customCheckbox5144" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5145" name="biaya149" value="" onchange="hitungTotal24()">
                                                            <label for="customCheckbox5145" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox5146" name="biaya150" value="" onchange="hitungTotal24()">
                                                            <label for="customCheckbox5146" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total24">Rp-</p>
                                                    </td>

                                                </tr>


                                                <!-- Nomor 6 -->
                                                <tr>
                                                    <td rowspan="14">6</td>
                                                    <td rowspan="6">a. Injeksi</td>
                                                    <td>Inj. Piracetam</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6111" name="biaya151" value="9057" onchange="hitungTotal25()">
                                                            <label for="customCheckbox6111" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6112" name="biaya152" value="9057" onchange="hitungTotal25()">
                                                            <label for="customCheckbox6112" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6113" name="biaya153" value="9057" onchange="hitungTotal25()">
                                                            <label for="customCheckbox6113" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6114" name="biaya154" value="9057" onchange="hitungTotal25()">
                                                            <label for="customCheckbox6114" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6115" name="biaya155" value="9057" onchange="hitungTotal25()">
                                                            <label for="customCheckbox6115" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6116" name="biaya156" value="9057" onchange="hitungTotal25()">
                                                            <label for="customCheckbox6116" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td> -</td>
                                                    <td>
                                                        <p id="total25">Rp-</p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>Inj. Citicolin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6121" name="biaya157" value="19980" onchange="hitungTotal26()">
                                                            <label for="customCheckbox6121" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6122" name="biaya158" value="19980" onchange="hitungTotal26()">
                                                            <label for="customCheckbox6122" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6123" name="biaya159" value="19980" onchange="hitungTotal26()">
                                                            <label for="customCheckbox6123" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6124" name="biaya160" value="19980" onchange="hitungTotal26()">
                                                            <label for="customCheckbox6124" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6125" name="biaya161" value="19980" onchange="hitungTotal26()">
                                                            <label for="customCheckbox6125" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6126" name="biaya162" value="19980" onchange="hitungTotal26()">
                                                            <label for="customCheckbox6126" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total26">Rp-</p>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td>Inj. Mekobalamin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6131" name="biaya163" value="9057" onchange="hitungTotal27()">
                                                            <label for="customCheckbox6131" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6132" name="biaya164" value="9057" onchange="hitungTotal27()">
                                                            <label for="customCheckbox6132" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6133" name="biaya165" value="9057" onchange="hitungTotal27()">
                                                            <label for="customCheckbox6133" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6134" name="biaya166" value="9057" onchange="hitungTotal27()">
                                                            <label for="customCheckbox6134" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6135" name="biaya167" value="9057" onchange="hitungTotal27()">
                                                            <label for="customCheckbox6135" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6136" name="biaya168" value="9057" onchange="hitungTotal27()">
                                                            <label for="customCheckbox6136" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total27">Rp-</p>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td>Inj. Ranitidin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6141" name="biaya169" value="1270" onchange="hitungTotal28()">
                                                            <label for="customCheckbox6141" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6142" name="biaya170" value="1270" onchange="hitungTotal28()">
                                                            <label for="customCheckbox6142" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6143" name="biaya171" value="1270" onchange="hitungTotal28()">
                                                            <label for="customCheckbox6143" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6144" name="biaya172" value="1270" onchange="hitungTotal28()">
                                                            <label for="customCheckbox6144" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6145" name="biaya173" value="1270" onchange="hitungTotal28()">
                                                            <label for="customCheckbox6145" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6146" name="biaya174" value="1270" onchange="hitungTotal28()">
                                                            <label for="customCheckbox6146" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total28">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Inj. OMZ</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6151" name="biaya175" value="" onchange="hitungTotal29()">
                                                            <label for="customCheckbox6151" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6152" name="biaya176" value="" onchange="hitungTotal29()">
                                                            <label for="customCheckbox6152" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6153" name="biaya177" value="" onchange="hitungTotal29()">
                                                            <label for="customCheckbox6153" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6154" name="biaya178" value="" onchange="hitungTotal29()">
                                                            <label for="customCheckbox6154" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6155" name="biaya179" value="" onchange="hitungTotal29()">
                                                            <label for="customCheckbox6155" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6156" name="biaya180" value="" onchange="hitungTotal29()">
                                                            <label for="customCheckbox6156" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total29">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Inj. Furosemid</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6161" name="biaya181" value="2216" onchange="hitungTotal30()">
                                                            <label for="customCheckbox6161" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6162" name="biaya182" value="2216" onchange="hitungTotal30()">
                                                            <label for="customCheckbox6162" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6163" name="biaya183" value="2216" onchange="hitungTotal30()">
                                                            <label for="customCheckbox6163" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6164" name="biaya184" value="2216" onchange="hitungTotal30()">
                                                            <label for="customCheckbox6164" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6165" name="biaya185" value="2216" onchange="hitungTotal30()">
                                                            <label for="customCheckbox6165" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6166" name="biaya186" value="2216" onchange="hitungTotal30()">
                                                            <label for="customCheckbox6166" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total30">Rp-</p>
                                                    </td>

                                                </tr>



                                                <tr>

                                                    <td rowspan="2">b. Infus</td>
                                                    <td>Asering</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6211" name="biaya187" value="" onchange="hitungTotal31()">
                                                            <label for="customCheckbox6211" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6212" name="biaya188" value="" onchange="hitungTotal31()">
                                                            <label for="customCheckbox6212" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6213" name="biaya189" value="" onchange="hitungTotal31()">
                                                            <label for="customCheckbox6213" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6214" name="biaya190" value="" onchange="hitungTotal31()">
                                                            <label for="customCheckbox6214" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6215" name="biaya191" value="" onchange="hitungTotal31()">
                                                            <label for="customCheckbox6215" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6216" name="biaya192" value="" onchange="hitungTotal31()">
                                                            <label for="customCheckbox6216" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        <p id="total31">Rp-</p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>Manitol</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6221" name="biaya193" value="" onchange="hitungTotal32()">
                                                            <label for="customCheckbox6221" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6222" name="biaya194" value="" onchange="hitungTotal32()">
                                                            <label for="customCheckbox6222" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6223" name="biaya195" value="" onchange="hitungTotal32()">
                                                            <label for="customCheckbox6223" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6224" name="biaya196" value="" onchange="hitungTotal32()">
                                                            <label for="customCheckbox6224" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6225" name="biaya197" value="" onchange="hitungTotal32()">
                                                            <label for="customCheckbox6225" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6226" name="biaya198" value="" onchange="hitungTotal32()">
                                                            <label for="customCheckbox6226" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total32">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td rowspan="5">c. Obat Oral</td>
                                                    <td>Antiplatelet</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6311" name="biaya199" value="" onchange="hitungTotal33()">
                                                            <label for="customCheckbox6311" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6312" name="biaya200" value="" onchange="hitungTotal33()">
                                                            <label for="customCheckbox6312" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6313" name="biaya201" value="" onchange="hitungTotal33()">
                                                            <label for="customCheckbox6313" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6314" name="biaya202" value="" onchange="hitungTotal33()">
                                                            <label for="customCheckbox6314" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6315" name="biaya203" value="" onchange="hitungTotal33()">
                                                            <label for="customCheckbox6315" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6316" name="biaya204" value="" onchange="hitungTotal33()">
                                                            <label for="customCheckbox6316" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        <p id="total33">Rp-</p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>Simvasatatin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6321" name="biaya205" value="" onchange="hitungTotal34()">
                                                            <label for="customCheckbox6321" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6322" name="biaya206" value="" onchange="hitungTotal34()">
                                                            <label for="customCheckbox6322" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6323" name="biaya207" value="" onchange="hitungTotal34()">
                                                            <label for="customCheckbox6323" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6324" name="biaya208" value="" onchange="hitungTotal34()">
                                                            <label for="customCheckbox6324" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6325" name="biaya209" value="" onchange="hitungTotal34()">
                                                            <label for="customCheckbox6325" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6326" name="biaya210" value="" onchange="hitungTotal34()">
                                                            <label for="customCheckbox6326" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total34">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Amlodipin/Candesartan</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6331" name="biaya211" value="" onchange="hitungTotal35()">
                                                            <label for="customCheckbox6331" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6332" name="biaya212" value="" onchange="hitungTotal35()">
                                                            <label for="customCheckbox6332" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6333" name="biaya213" value="" onchange="hitungTotal35()">
                                                            <label for="customCheckbox6333" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6334" name="biaya214" value="" onchange="hitungTotal35()">
                                                            <label for="customCheckbox6334" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6335" name="biaya215" value="" onchange="hitungTotal35()">
                                                            <label for="customCheckbox6335" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6336" name="biaya216" value="" onchange="hitungTotal35()">
                                                            <label for="customCheckbox6336" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total35">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>CPG</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6341" name="biaya217" value="" onchange="hitungTotal36()">
                                                            <label for="customCheckbox6341" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6342" name="biaya218" value="" onchange="hitungTotal36()">
                                                            <label for="customCheckbox6342" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6343" name="biaya219" value="" onchange="hitungTotal36()">
                                                            <label for="customCheckbox6343" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6344" name="biaya220" value="" onchange="hitungTotal36()">
                                                            <label for="customCheckbox6344" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6345" name="biaya221" value="" onchange="hitungTotal36()">
                                                            <label for="customCheckbox6345" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6346" name="biaya222" value="" onchange="hitungTotal36()">
                                                            <label for="customCheckbox6346" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total36">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Mecobalamin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6351" name="biaya223" value="806" onchange="hitungTotal37()">
                                                            <label for="customCheckbox6351" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6352" name="biaya224" value="806" onchange="hitungTotal37()">
                                                            <label for="customCheckbox6352" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6353" name="biaya225" value="806" onchange="hitungTotal37()">
                                                            <label for="customCheckbox6353" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6354" name="biaya226" value="806" onchange="hitungTotal37()">
                                                            <label for="customCheckbox6354" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6355" name="biaya227" value="806" onchange="hitungTotal37()">
                                                            <label for="customCheckbox6355" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6356" name="biaya228" value="806" onchange="hitungTotal37()">
                                                            <label for="customCheckbox6356" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>-</td>
                                                    <td>
                                                        <p id="total37">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td rowspan="1">d. Oksigenasi</td>
                                                    <td>3 lpm</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6411" name="biaya229" value="" onchange="hitungTotal38()">
                                                            <label for="customCheckbox6411" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6412" name="biaya230" value="" onchange="hitungTotal38()">
                                                            <label for="customCheckbox6412" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6413" name="biaya231" value="" onchange="hitungTotal38()">
                                                            <label for="customCheckbox6413" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6414" name="biaya232" value="" onchange="hitungTotal38()">
                                                            <label for="customCheckbox6414" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6415" name="biaya233" value="" onchange="hitungTotal38()">
                                                            <label for="customCheckbox6415" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox6416" name="biaya234" value="" onchange="hitungTotal38()">
                                                            <label for="customCheckbox6416" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        <p id="total38">Rp-</p>
                                                    </td>
                                                </tr>

                                                <!-- Nomor 7 -->
                                                <tr>
                                                    <td rowspan="14">7</td>
                                                    <td rowspan="1">a. DPJP</td>
                                                    <td>Asesmen Ulang</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7111" name="biaya235" value="45000" onchange="hitungTotal39()">
                                                            <label for="customCheckbox7111" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7112" name="biaya236" value="45000" onchange="hitungTotal39()">
                                                            <label for="customCheckbox7112" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7113" name="biaya237" value="45000" onchange="hitungTotal39()">
                                                            <label for="customCheckbox7113" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7114" name="biaya238" value="45000" onchange="hitungTotal39()">
                                                            <label for="customCheckbox7114" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7115" name="biaya239" value="45000" onchange="hitungTotal39()">
                                                            <label for="customCheckbox7115" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7116" name="biaya240" value="45000" onchange="hitungTotal39()">
                                                            <label for="customCheckbox7116" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td> -</td>
                                                    <td>
                                                        <p id="total39">Rp-</p>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td rowspan="2">b. Non DPJP</td>
                                                    <td>DPJP Sekunder</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7211" name="biaya241" value="45000" onchange="hitungTotal40()">
                                                            <label for="customCheckbox7211" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7212" name="biaya242" value="45000" onchange="hitungTotal40()">
                                                            <label for="customCheckbox7212" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7213" name="biaya243" value="45000" onchange="hitungTotal40()">
                                                            <label for="customCheckbox7213" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7214" name="biaya244" value="45000" onchange="hitungTotal40()">
                                                            <label for="customCheckbox7214" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7215" name="biaya245" value="45000" onchange="hitungTotal40()">
                                                            <label for="customCheckbox7215" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7216" name="biaya246" value="45000" onchange="hitungTotal40()">
                                                            <label for="customCheckbox7216" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td> -</td>
                                                    <td>
                                                        <p id="total40">Rp-</p>
                                                    </td>
                                                </tr>

                                                <tr>


                                                    <td>DU</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7221" name="biaya247" value="27000" onchange="hitungTotal41()">
                                                            <label for="customCheckbox7221" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7222" name="biaya248" value="27000" onchange="hitungTotal41()">
                                                            <label for="customCheckbox7222" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7223" name="biaya249" value="27000" onchange="hitungTotal41()">
                                                            <label for="customCheckbox7223" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7224" name="biaya250" value="27000" onchange="hitungTotal41()">
                                                            <label for="customCheckbox7224" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7225" name="biaya251" value="27000" onchange="hitungTotal41()">
                                                            <label for="customCheckbox7225" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7226" name="biaya252" value="27000" onchange="hitungTotal41()">
                                                            <label for="customCheckbox7226" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td> -</td>
                                                    <td>
                                                        <p id="total41">Rp-</p>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>c. Keperawatan</td>

                                                    <td>
                                                        -
                                                    </td>

                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7311" name="biaya253" value="13000" onchange="hitungTotal42()">
                                                            <label for="customCheckbox7311" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7312" name="biaya254" value="13000" onchange="hitungTotal42()">
                                                            <label for="customCheckbox7312" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7313" name="biaya255" value="13000" onchange="hitungTotal42()">
                                                            <label for="customCheckbox7313" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7314" name="biaya256" value="13000" onchange="hitungTotal42()">
                                                            <label for="customCheckbox7314" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7315" name="biaya257" value="13000" onchange="hitungTotal42()">
                                                            <label for="customCheckbox7315" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7316" name="biaya258" value="13000" onchange="hitungTotal42()">
                                                            <label for="customCheckbox7316" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td> -</td>
                                                    <td>
                                                        <p id="total42">Rp-</p>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>d. Fisioterapi</td>

                                                    <td>
                                                        -
                                                    </td>

                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7411" name="biaya259" value="26000" onchange="hitungTotal43()">
                                                            <label for="customCheckbox7411" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7412" name="biaya260" value="26000" onchange="hitungTotal43()">
                                                            <label for="customCheckbox7412" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7413" name="biaya261" value="26000" onchange="hitungTotal43()">
                                                            <label for="customCheckbox7413" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7414" name="biaya262" value="26000" onchange="hitungTotal43()">
                                                            <label for="customCheckbox7414" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7415" name="biaya263" value="26000" onchange="hitungTotal43()">
                                                            <label for="customCheckbox7415" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox7416" name="biaya264" value="26000" onchange="hitungTotal43()">
                                                            <label for="customCheckbox7416" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td> -</td>
                                                    <td>
                                                        <p id="total43">Rp-</p>
                                                    </td>
                                                </tr>

                                            </tbody>


                                            <tfoot>
                                                <tr>

                                                    <th colspan="9" class="text-center"></th>
                                                    <th class="text-center">TOTAL BIAYA</th>
                                                    <td>

                                                        <p id="totalSum"></p>

                                                    </td>


                                                </tr>

                                                <tr>

                                                    <th colspan="9" class="text-center"></th>
                                                    <th class="text-center">KLAIM INA CBGS</th>
                                                    <th class="text-center">Rp. 0</th>


                                                </tr>
                                            </tfoot>
                                        </table>
                                        <td>
                                            <!-- <input type=button value="Proses" onclick="proses()"> -->
                                            <button type="submit" value="Save" name="submit" class="btn btn-block bg-gradient-primary btn-lg">SIMPAN</button>
                                        </td>
                                    </div>
                                </form>

                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2023 <a href="https://adminlte.io">ITI RSUD Ajibarang</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/jszip/jszip.min.js"></script>
    <script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>