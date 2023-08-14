<?php
if (isset($_POST['save'])) {
    // Include the connection file and sanitize user inputs
    include("connexion.php");
    $TITLE = mysqli_real_escape_string($conn, $_POST['TITLE']);    
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $DATER = mysqli_real_escape_string($conn, $_POST['date']);

    // Get the logged-in user's IDUSER from the session
    session_start();
    $IDUSER = $_SESSION['IDUSER'];

    // Check if the file was uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];

        // Process the uploaded image as needed (e.g., move it to a specific directory)
        // You can use functions like move_uploaded_file() to handle the image upload.
        // Example:
        // $target_dir = "uploads/";
        // $target_file = $target_dir . basename($image_name);
        // move_uploaded_file($image_tmp_name, $target_file);

        // For now, we'll just store the image name in the database without processing it.
        $image = mysqli_real_escape_string($conn, $image_name);
    } else {
        // If no image was uploaded or an error occurred, set the image name to an empty string or a default value.
        // Example: $image = "default.jpg";
        $image = "";
    }

    // Perform the INSERT query (consider using prepared statements for better security)
    $query = "INSERT INTO recipe (IDUSER, TITLE, INGREDIENTS, DESCRIPTION, IMAGER, DATER, category) 
              VALUES ('$IDUSER', '$TITLE', '$ingredients', '$description', '$image', '$DATER', '$category')";
    $result = mysqli_query($conn, $query) or die("Could Not Perform the Query");

    // Redirect the user to a success page after the data is inserted successfully
    header("Location: profile.php?status=success");
    exit(); // Important: Terminate the script after the redirection
}
?>
