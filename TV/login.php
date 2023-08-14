<?php 
session_start(); // Start the session
include "connexion.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {  
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE USENAME='$uname' AND PASSWORD='$pass'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) == 1) { // Check if $result is not false
            $row = mysqli_fetch_assoc($result);
            $_SESSION['USENAME'] = $row['USENAME'];
            $_SESSION['IDUSER'] = $row['IDUSER'];
            $_SESSION['FULL_NAME'] = $row['FULL_NAME']; // Assuming the full name column is named 'FULL_NAME' in the database
            $_SESSION['EMAIL'] = $row['EMAIL']; // Assuming the email column is named 'EMAIL' in the database

            // Redirect to the profile page after successful login
            header("Location: home.php");
            exit();
        } else {
            header("Location: index.php?error=incorrect Password or UserName");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
