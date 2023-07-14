<?php
session_start();

$jut = session_destroy();

if ($jut) {
    header("Location: login.php");
    exit();
}
