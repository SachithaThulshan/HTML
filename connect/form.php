<?php require_once 'db.php';
$sql = "SELECT * FROM person";
$result = mysqli_query($conn,$sql);
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
<form action="insert.php" method="post">
    Firstname: <input type="text" name="firstname" />
    Lastname: <input type="text" name="lastname" />
    Age: <input type="text" name="age" />
    <input align = "right" type="submit" value="ADD" />
</form>
<br>
<?php
if($result->num_rows > 0) {
    ?>
    <table border="1">
        <tr>
            <td>FirstName</td>
            <td>LastName</td>
            <td>Age</td>
            <td>Actions</td>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['FirstName'] . '</td>';
            echo '<td>' . $row['LastName'] . '</td>';
            echo '<td>' . $row['Age'] . '</td>';
            echo '<td>
                    <a href="update.php?edit=' . $row['id'] . '">Edit</a> | 
                    <a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <?php
}else {
    echo 'No users to view';
}
?>
</body>
</html>
