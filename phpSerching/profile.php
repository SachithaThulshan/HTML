<?php
// Start the session
session_start();

// Database connection
$con = mysqli_connect('localhost', 'root', '19991104', 'Tuition');

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Welcome message for the logged-in user
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, " . ($username) . "!";
} else {
    echo "You are not logged in!";
}

// Variable to store any potential errors
$error = "";

if (isset($_POST['search'])) {
    $s = $_POST['search1'];
    $sql = "SELECT `Tutor_Name`, `District`, `Subject` FROM `Tutor` WHERE `Tutor_Name` LIKE '%$s%'"; 
    $result = mysqli_query($con, $sql);

    // Check if any results were found

        if ($result && $result->num_rows > 0) {
            $output = ''; // Initialize a variable to store the results
            while ($row = $result->fetch_assoc()) {
                $output .= '<tr>';
                $output .= '<td>' . ($row['Tutor_Name']) . '</td>';
                $output .= '<td>' . ($row['District']) . '</td>';
                $output .= '<td>' . ($row['Subject']) . '</td>';
                $output .= '</tr>';
            }
        } else {
            $error = 'Invalid search! No results found.';
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Tutors</title>
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
                <li><a href="login.php">Log out</a></li>
            </ul>
        </div>
    </nav>
    <hr>
    <fieldset class = "image">
        <form action="profile.php" method="post">
            <table>
                <tr>
                    <td>Book Title</td>
                    <td><input type="text" name="search1" id="search1"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="search" value="Search"></td>
                </tr>
            </table>

            <h1>Search Result</h1>
    <?php
    // Display error message if there's an error
    if (!empty($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
    <table border="1">

        <?php
        // Display the search results in the table
        if (isset($output)) {
            echo $output;
        }
        ?>
    </table>
        </form>
    </fieldset>

</body>
</html>
