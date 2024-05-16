<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>


<?php

$host = "localhost";
$user = "root";
$pass = "19991104";
$database = "Customer_Orders";

$con = mysqli_connect($host,$user,$pass,$database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// customer variable 
$nic = $_POST['nic'];
$cname = $_POST['Cname'];
$email = $_POST['Email'];

//Recepient Variable

$order = $_POST['order'];
$rname = $_POST['Rname'];
$add = $_POST['address'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$item = $_POST['item'];
$price = $_POST['price'];
$dmy = $day.'/'.$month.'/'.$year;

$sql = "INSERT INTO customer(`NIC_No`,`Name`,`E_mail`) VALUES ('$nic','$cname','$email')";
$sql1 = "INSERT INTO recepient_order(`Order_No`,`NIC_No`,`Recepient_Name`,`Address`,`Date`,`Item_No`,`Price`) VALUES ('$order','$nic','$rname','$add','$dmy','$item','$price')";

if (mysqli_query($con,$sql)) {   // can use new mysqli($con,$sql)
     echo "Data Insert Success!";
} else {
    echo "Error".$sql. "<br>".mysqli_error($con);
}

if (mysqli_query($con,$sql1)) {   // can use new mysqli($con,$sql)
    echo "Data Insert Success!";
} else {
   echo "Error".$sql. "<br>".mysqli_error($con);
}



// $uquery = "UPDATE user SET "

mysqli_close($con);
?>