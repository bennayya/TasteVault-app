<?php
session_start();
require_once "connexion.php";

if(isset($_GET['id'])) {
    $recipeID = $_GET['id'];
    
    if(isset($_POST['submit'])) {
        // Escape user input to prevent SQL injection and handle special characters
        $newTitle = mysqli_real_escape_string($conn, $_POST['new_title']);
        $newIngredients = mysqli_real_escape_string($conn, $_POST['new_ingredients']);
        $newDescription = mysqli_real_escape_string($conn, $_POST['new_description']);
        $newCategory = mysqli_real_escape_string($conn, $_POST['new_category']);

        // Update the record in the database using the escaped values
        $updateQuery = "UPDATE recipe SET TITLE = '$newTitle', INGREDIENTS = '$newIngredients', 
                        DESCRIPTION = '$newDescription', category = '$newCategory' WHERE IDRECIPE = $recipeID";
        
        if(mysqli_query($conn, $updateQuery)) {
            header("Location: profile.php"); // Redirect after successful update
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    $fetchQuery = "SELECT * FROM recipe WHERE IDRECIPE = $recipeID";
    $result = mysqli_query($conn, $fetchQuery);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    mysqli_close($conn);
}
else {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">

		<title>
   			TasteVault
  		</title>

		<style>
			body{
				margin-left:10px;
				margin-right:5px;
			}
		</style>
		<!-- Other meta tags, title, etc. -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	</head>
<body>
    <!-- Add your header/navigation here -->

    <div class="container">
        <h2>Edit Recipe</h2>
        <form method="post">
            <div class="form-group">
                <label for="new_title">Title:</label>
                <input type="text" class="form-control" name="new_title" value="<?php echo $row['TITLE']; ?>">
            </div>
            <div class="form-group">
                <label for="new_ingredients">Ingredients:</label>
                <textarea class="form-control" name="new_ingredients"><?php echo $row['INGREDIENTS']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="new_description">Description:</label>
                <textarea class="form-control" name="new_description"><?php echo $row['DESCRIPTION']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="new_category">Category:</label>
                
                <select class="form-control" name="new_category"style="width:160px" value="<?php echo $row['category']; ?>" >
                    <option>diet</option>
                    <option>party</option>
                    <option>birthday</option>
                    <option>Morrocan's food</option>
                    <option>italian's food</option>
                    <option>desert</option>     
                    <option>fitness</option>
                    <option>breakfast</option>
                    <option>lunch</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

   <!-- Footer -->
   <footer id="footer">
						<div class="inner">
							
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

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
