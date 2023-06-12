<?php
include "conn.php";
if(isset($_POST['submit'])) {
    $role = implode(",", $_POST['biaya']);  
} else {
    $role = "";
}
$sql=$link->query("UPDATE coba SET biaya='$role' WHERE id='1'");

header("Location: {$_SERVER['HTTP_REFERER']}");
?>