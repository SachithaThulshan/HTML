<?php

$error = '';
if(isset($_POST['logi'])) {
    require_once 'db.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: profile.php");
    } else {
        $error = 'Invalid username or password!';
    }
    $conn->close();
}
?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
        <div class="nevbar">
            <ul>
                <li>Home</li>
                <li>About us</li>
            </ul>
        </div>
        <div class="nevbar1">
            <ul>
                <li>Register</li>
                <li><a href="login.php">Log in</a></li>
            </ul>
        </div>
    </nav>
<center>
    <br>
    <br>
    <br>
    <br>
    <fieldset class= "image">
    <form action="login.php" method="post">
        Username <input name="username"/>
        <br>
        Password <input name="password"/>
        <br>
        <input type="submit" name="logi" value="login"/>
        <p><?php echo $error?></p>
    </form>
    </fieldset>
</center>
</body>
</html>