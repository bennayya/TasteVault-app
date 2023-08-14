<!
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

  <style>
    body {
      margin-left: 10px;
      margin-right: 5px;
    }
    
  </style>
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

							<li><a href="about.php">About</a></li>

							<li><a href="contact.php">Contact Us</a></li>

							<li><a href="profile.php">profile</a></li>

							<li><a href="logout.php">LogOut</a></li>
						</ul>
					</nav>
                    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
        <?php
        include 'connexion.php';

        if (isset($_GET['q'])) {
            $searchQuery = $_GET['q'];
            $query = "SELECT * FROM recipe INNER JOIN user ON recipe.IDUSER = user.IDUSER WHERE TITLE LIKE '%" . $searchQuery . "%'";
        } else {
            $query = "SELECT * FROM recipe";
        }

        $result = $conn->query($query);

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
        
        

        $conn->close();
        ?>
        </div>
    </div>
</div>
<br>
<br>
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











