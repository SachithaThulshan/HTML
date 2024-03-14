<?php
require_once 'db.php';

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$age = $_POST['age'];

$sql = "INSERT INTO person (firstname, lastname, age) VALUES ('$firstName', '$lastName', '$age')";

if ($conn->query($sql) === true) {
    header("Location: form.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

