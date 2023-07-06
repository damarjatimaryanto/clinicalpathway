<?php
function insertData($nama_pasien, $nomr, $masuk_rs, $ruangan, $kelas_bpjs)
{
    // Establish a connection to the database
    $servername = "192.168.1.178";
    $username = "root";
    $password = "takonbudi";
    $dbname = "simrs";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO simrs.t_clinicalpathway (nama_pasien, nomr, masuk_rs, ruangan, kelas_bpjs)
                                                    VALUES ('$nama_pasien', '$nomr', '$masuk_rs', '$ruangan', '$kelas_bpjs')";

    if ($conn->query($sql) === TRUE) {
        echo "Data stored successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $nama_pasien = $_POST['nama_pasien'];
    $nomr = $_POST['nomr'];
    $masuk_rs = $_POST['masuk_rs'];
    $ruangan = $_POST['ruangan'];
    $kelas_bpjs = $_POST['kelas_bpjs'];

    if ($ruangan == 'Pilih Ruangan' || $kelas_bpjs == 'Pilih Kelas') {
        echo "<script>alert('raisolur')</script>";
    } else {
        insertData($nama_pasien, $nomr, $masuk_rs, $ruangan, $kelas_bpjs);
        echo "<script>alert('Data Berhasil ditambahkan')</script>";

        $_SESSION['pesan'] = 'sukses';

        if ($_SESSION['pesan'] == 'sukses') {
            if ($_POST['ruangan'] == 'Camar Bawah') {
                header("Location: /clicinalpathway/camarbawah.php");
                exit;
            } elseif ($_POST['ruangan'] == 'Cendrawasih Atas') {
                header("Location: /clicinalpathway/cendraatas.php");
                exit;
            } elseif ($_POST['ruangan'] == 'Kenari Atas') {
                header("Location: /clicinalpathway/kenariatas.php");
                exit;
            } elseif ($_POST['ruangan'] == 'Cendrawasih Bawah') {
                header("Location: /clicinalpathway/cendrabawah.php");
                exit;
            }
        }
    }
}
