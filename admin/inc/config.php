<?php
date_default_timezone_set('Asia/Kolkata');
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'Vikas@123';
$DB_NAME = 'shiv';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
    die('Database Connection Failed: ' . mysqli_connect_error());
}

// ---- SET CHARSET ----
mysqli_set_charset($conn, 'utf8mb4');
