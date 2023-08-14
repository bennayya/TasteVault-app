<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <title>TasteVault</title>
    <style>
        body {
            margin-left: 20px;
            margin-right:10px;
        }

        .image-style {
            height: 200px; /* Adjust image height as needed */
            width: auto; /* Set image width to maintain aspect ratio */

        }

        .recipe-item {
            margin-bottom: 30px; /* Add margin between recipe items */
        }

      

        .recipe-image {
            flex: 0 0 200px; /* Set width of image column (200px in this case) */
            margin-right: 20px; /* Add space between image and details */
        }

        .recipe-details {
            flex: 1; /* Allow details to take remaining width */
        }

        /* Placeholder styles, adjust as needed */
        .recipe-item {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .recipe-item h3 {
            margin-top: 0;
        }

        .recipe-item p {
            margin-bottom: 10px;
        }

        .recipe-item .additional-content {
            font-style: italic;
        }
    </style>
    <!-- Other meta tags, title, etc. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php
include 'connexion.php';

if (isset($_GET['IDRECIPE'])) {
    $recipeId = $_GET['IDRECIPE'];
    $query = "SELECT * FROM recipe WHERE IDRECIPE = $recipeId";
} else {
    // Redirect to the recipe list page if no specific recipe ID is provided
    header("Location: recipe.php");
    exit();
}

$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<div class='recipe-item'>";
    echo "<h3 class='title-style'>" . $row['TITLE'] . "</h3>";
    echo "<div class='recipe-content'>";
    echo "<div class='recipe-image'><img src='images/" . $row['IMAGER'] . "' class='image-style'></div>";
    echo "<div class='recipe-details'>";
    echo "<h2>Ingredients</h2>";
    echo "<p class='desc-style'>" . $row['INGREDIENTS'] . "</p>";
    echo "<h2>Description</h2>";
    echo "<p class='desc-style'>" . $row['DESCRIPTION'] . "</p>";
    echo "<p class='usd-style'>" . $row['TITLE'] . " &nbsp;&nbsp;|&nbsp;&nbsp; " . $row['DATER'] . "</p>";
    // Add condition to show additional content for matching IDRECIPE
    echo "<p class='additional-content'>Additional content for matching IDRECIPE: " . $row['IDRECIPE'] . "</p>";
    echo "</div>"; // Close .recipe-details
    echo "</div>"; // Close .recipe-content
    echo "</div>"; // Close .recipe-item
} else {
    echo "<p class='no-articles'>Recipe not found</p>";
}

$conn->close();
?>
<!-- Footer -->
<footer id="footer">
						<div class="inner">
							<section>
								<h2>Contact Us</h2>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>

										<div class="field half">
											<input type="text" name="email" id="email" placeholder="Email" />
										</div>

										<div class="field">
											<textarea name="message" id="message" rows="3" placeholder="Notes"></textarea>
										</div>

										<div class="field text-right">
											<label>&nbsp;</label>

											<ul class="actions">
												<li><input type="submit" value="Send Message" class="primary" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
							<section>
								<h2>Contact Info</h2>

								<ul class="alt">
									<li><span class="fa fa-envelope-o"></span> <a href="#">TasteVault@gmail.com</a></li>
									<li><span class="fa fa-phone"></span> +212 501346970 </li>
									<li><span class="fa fa-map-pin"></span>Casablanca,Morocco</li>
								</ul>

								<h2>Follow Us</h2>

								<ul class="icons">
									<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
								</ul>
							</section>

							<ul class="copyright">
								<li>Copyright © 2023 TAASTEVAULT </li>
							</ul>
						</div>
					</footer>

			</div>
        <!--Scripts -->
        <!-- ... -->

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
