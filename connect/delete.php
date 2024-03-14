<?php
require_once 'db.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "$FirstName";
    $sql = "DELETE FROM person WHERE id='$id'";
    if ($conn->query($sql) === true) {
        header("Location: form.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

