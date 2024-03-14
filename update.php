<?php
require_once 'db.php';
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM person WHERE id=$id";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        ?>
        <html>
        <head>
            <title>Edit</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
        <form action="update.php" method="post">
            Firstname: <input type="text" name="firstname" value="<?php echo $user['FirstName'];?>"/>
            Lastname: <input type="text" name="lastname" value="<?php echo $user['LastName'];?>"/>
            Age: <input type="text" name="age" value="<?php echo $user['Age'];?>"/>
            <input type="hidden" name="id" value="<?php echo $user['id'];?>"/>
            <input type="submit" name="update" value="Update" />
        </form>
        </body>
        </html>
        <?php
    }
} else if(isset($_POST['update']) ){
    echo 'done';
    $id = $_POST['id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $age = $_POST['age'];
    $sql = "UPDATE person SET FirstName='$firstName', LastName='$lastName', Age='$age' WHERE id=$id";
    if($conn->query($sql) === true) {
        header("Location: form.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();