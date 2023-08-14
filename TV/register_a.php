<?php
if (isset($_POST['save'])) {
    // Include the connection file and sanitize user inputs
    include("connexion.php");
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Check if the username already exists in the database
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE USENAME='$username'");
    if (mysqli_num_rows($sql) > 0) {
        echo "Username Already Exists";
        exit;
    } else {
 

        // Perform the INSERT query (consider using prepared statements for better security)
        $query = "INSERT INTO user(USENAME, Email, PASSWORD) VALUES ('$username', '$email', '$pass')";
        $sql = mysqli_query($conn, $query) or die("Could Not Perform the Query");
        header("Location: index.php?status=success");
    }
}
?>
