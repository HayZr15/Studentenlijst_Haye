<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "websitedb_haye";

// De connectie maken
$conn = new mysqli($servername, $username, $password, $dbname);

// Checken of de verbinding werkt
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}
?>