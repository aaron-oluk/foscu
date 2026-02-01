<?php
$servername = "localhost";
// $username = "u460308402_foscu";
// $password = "Leon12@48dex";
// $dbname = 'u460308402_foscu';
$username = "root";
$dbname = "foscu";
$password = "";

$conn = null;

try {
    // $conn = new PDO("mysql:host=$servername;dbname=foscu", $username, $password);
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $conn = null;
    error_log("DB connection failed: " . $e->getMessage());
}
