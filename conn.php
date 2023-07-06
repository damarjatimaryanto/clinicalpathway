<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "neurotech");

$link = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($link->connect_error) {
   trigger_error('Koneksi ke database gagal: ' . $link->connect_error, E_USER_ERROR);
}
