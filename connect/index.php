<?php
$error = '';
if(isset($_POST['login'])) {
    require_once 'db.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0) {
        header("Location: form.php");
    } else {
        $error = 'Invalid username or password!';
    }
    $conn->close();
}
?>
<html>
<head>
    <title>Login</title>
</head>
<body>
<center>
    <br>
    <br>
    <br>
    <br>
    <form action="index.php" method="post">
        Username <input name="username"/>
        <br>
        Password <input name="password"/>
        <br>
        <input type="submit" name="login" value="login"/>
        <p><?php echo $error?></p>
    </form>
</center>
</body>
</html>