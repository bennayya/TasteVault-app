<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "datatv");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['IDUSER'])) {
    // Handle user not logged in
    header("Location: login.php"); // Redirect to login page
    exit();
}

$userId = $_SESSION['IDUSER'];

if (isset($_POST['recipeId']) && isset($_POST['action'])) {
    $recipeId = $_POST['recipeId'];
    $action = $_POST['action'];

    if ($action === "save") {
        // Add the recipe to favorites
        $insertQuery = "INSERT INTO favorites (IDUSER, IDRECIPE) VALUES ('$userId', '$recipeId')";
        mysqli_query($connection, $insertQuery);
    } elseif ($action === "unsave") {
        // Remove the recipe from favorites
        $deleteQuery = "DELETE FROM favorites WHERE IDUSER = '$userId' AND IDRECIPE = '$recipeId'";
        mysqli_query($connection, $deleteQuery);
    }
}

// Fetch and display the saved recipes
$query = "SELECT recipe.* FROM recipe
          INNER JOIN favorites ON recipe.IDRECIPE = favorites.IDRECIPE
          WHERE favorites.IDUSER = '$userId'";
$result = mysqli_query($connection, $query);
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
<body>
    
    <!-- Display saved recipes -->
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
    <div class="container">
        <h1>Your Saved Recipes</h1>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <ul>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-sm-4 text-center">
                            <img src="images/<?= $row['IMAGER'] ?>" class="img-fluid" style="height: 200px; width: 400px;">
                            <h2 class="m-n" style="font-size: 30px;">
                                <a href="show.php?IDRECIPE=<?= $row['IDRECIPE'] ?>">
                                    <?= $row['TITLE'] ?>
                                </a>
                            </h2>
                           
                        </div><br><br>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No saved recipes found.</p>
        <?php endif; ?>
    </div>

		
    </div>
        </div>
    </div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
