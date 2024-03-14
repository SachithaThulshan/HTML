<?php
$servername = "localhost";
$username = "root";
$password = "19991104";
$dbname = "info";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
?>