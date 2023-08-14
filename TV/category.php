<?php

include 'connexion.php';

session_start();

if(isset($_SESSION['IDUSER'])){
   $user_id = $_SESSION['IDUSER'];
}else{
   $user_id = '';
};

if(isset($_GET['categorie'])){
   $category = $_GET['categorie'];
}else{
   $category = '';
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <noscript>
    <link rel="stylesheet" href="assets/css/noscript.css" />
  </noscript>
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <title>TasteVault</title>
    <!-- Other meta tags, title, etc. -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="is-preload">
    <!-- Your header and navigation code here -->

    <!-- Main content -->
    <div id="main">
        <div class="inner">
            <a  style=" display:flex;justify-content:center; text-align:center";> <strong> For Breakfast</strong></a>
            <br><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            
                            <?php
                            // Get the selected category from the query parameter
                            if (isset($_GET['category'])) {
                                $selectedCategory = $_GET['category'];
                            } else {
                                // Default category or error handling
                                $selectedCategory = 'lunch';
                            }

                            // Establish a database connection
                            $connection = mysqli_connect("localhost", "root", "", "datatv");
                            if (!$connection) {
                                die("Database connection failed: " . mysqli_connect_error());
                            }

                            // Fetch recipes based on the selected category
                            $query = "SELECT recipe.*, user.USENAME FROM recipe
                                      INNER JOIN user ON recipe.IDUSER = user.IDUSER
                                      WHERE recipe.category = ?";
                            $stmt = mysqli_prepare($connection, $query);
                            mysqli_stmt_bind_param($stmt, "s", $selectedCategory);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            // Loop through the recipes and display them
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Display recipe card using $row data with style
                                    echo '<div class="col-sm-4 text-center">';
                                    echo '<img src="images/' . $row['IMAGER'] . '" class="img-fluid" style="height: 200px; width: 400px;">';
                                    echo '<h2 class="m-n" style="font-size: 30px;">';
                                    echo '<a href="show.php?IDRECIPE=' . $row['IDRECIPE'] . '">';
                                    echo $row['TITLE'];
                                    echo '</a>';
                                    echo '</h2>';
                                    echo '<p>';
                                    echo $row['USENAME'] . '&nbsp;|&nbsp;';
                                    echo $row['DATER'] . '&nbsp;|&nbsp;';
                            
                                    echo '</p>';
                                    echo '</div>';
                                }
                            } else {
                                echo "<p>No recipes found.</p>";
                            }

                            // Close the database connection
                            mysqli_close($connection);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Your footer code here -->
    <script>
        // Your JavaScript code here
    </script>
</body>
</html>
