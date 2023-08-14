<?php
session_start(); // Start the session
?>
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
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="home.php" class="logo">
								<span class="fas fa-atom"></span><span class="title">TasteVault</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="home.php" class="active">Home</a></li>

							<li><a href="recipe.php">Recipes</a></li>

                            <li><a href="shop.php">shop</a></li>

							<li><a href="about.php">About</a></li>

							<li><a href="contact.php">Contact Us</a></li>

							<li><a href="profile.php">profile</a></li>

							<li><a href="logout.php">LogOut</a></li>
						</ul>
					</nav>

						</div>
					</header>

				



					<div class="container">
        <div class="main-body">
            <h1>Welcome </h1>

    <div id="wrapper">
        <div class="container">
            <div class="main-body">
                
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mt-7 mb-6 clearfix">
                                    <h2 class="pull-left">Recipes Details</h2>
                                    <a href="addrecipe.php" class="btn btn-success pull-right" style="background-color:#007bff"><i class="fa fa-plus"></i> Add New Recipe</a>
									<a href="save.php" class="btn btn-success" style="margin-left:550px;background-color:#007bff"><i class="fa fa-plus"></i> Recipe Saved</a>
                                </div>
                                <?php
                                // Include config file
                                require_once "connexion.php";

                                // Get the logged-in user's IDUSER from the session
                                $userID = $_SESSION['IDUSER'];

                                // Attempt select query execution with user filter
                                $sql = "SELECT * FROM recipe WHERE IDUSER = $userID";
                                if($result = mysqli_query($conn, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>TITLE</th>";
                                        echo "<th>INGREDIENTS</th>";
                                        echo "<th>DESCRIPTION</th>";
                                        echo "<th>Category</th>";
										echo "<th>Function</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>";
                                            echo "<td>" . $row['IDRECIPE'] . "</td>";
                                            echo "<td>" . $row['TITLE'] . "</td>";
                                            echo "<td>" . $row['INGREDIENTS'] . "</td>";
                                            echo "<td>" . $row['DESCRIPTION'] . "</td>";
                                            echo "<td>" . $row['category'] . "</td>";
                                            echo "<td>";
                                            echo '<a href="update.php?id='. $row['IDRECIPE'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';echo "<br>";
                                            echo '<a href="delete.php?id='. $row['IDRECIPE'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                            
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                        mysqli_free_result($result);
                                    } else {
                                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                    }
                                } else {
                                    echo "Oops! Something went wrong. Please try again later.";
                                }

                                // Close connection
                                mysqli_close($conn);
                                ?>
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
            </div>
        </div>
    </div>
</body>
</html>
