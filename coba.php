<?php
// require_once 'auth.php';

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect the user to the login page if not authenticated
    exit();
}
require_once 'db_connection.php';
?>

<?php
    require_once 'conn.php';
	// include "conn.php";
	ini_set('display_errors',0); 
    $qrykoreksi=$link->query("select * from coba where id='1'");
    $dataku=$qrykoreksi->fetch_array();
    $c=0;
    $baris= 1;
?>

<br/>

<?php
$nilai = $dataku['biaya'];
$berai = explode(",", $nilai);

if($nilai == ""){
	
}else{
$jumlah1 = $berai[0];
$jumlah2 = $berai[1];
$jumlah3 = $berai[2];
$jumlah4 = $berai[3];
$jumlah5 = $berai[4];
$jumlah6 = $berai[5];
}
include "detailkelas1.php";
?>