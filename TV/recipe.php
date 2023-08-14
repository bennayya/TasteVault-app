
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
    /* Your other styles here */
    #searchButton.pink-background {
      background-color: pink;
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
              <li><a href="iindex.php">Shop</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <li><a href="profile.php">profile</a></li>
              <li><a href="logout.php">LogOut</a></li>
            </ul>
          </nav>
    <!-- Main content -->
    <div id="main">
      <div class="inner">
        <!-- Search form and other content here -->
        <div class="search-and-categories" style="display: flex; align-items: center; justify-content: space-between;">
    <div class="sidebar-box">
        <ul class="categories" style="list-style: none; padding: 0; margin: 0; display: flex;margin-left: 60px;">
            <li style="margin-right: 10px;"><a href="category.php?category=breakfast"> <strong>breakfast</strong></a></li>
            <li style="margin-right: 10px;"><a href="category.php?category=lunch"><strong> lunch</strong></a></li>
            <li style="margin-right: 10px;"><a href="category.php?category=desert"><strong> desert</strong></a></li>
            <li style="margin-right: 10px;"><a href="category.php?category=healthy"><strong>healthy</strong></a></li>
            <li style="margin-right: 10px;"><a href="category.php?category=dinner"><strong>dinner</strong></a></li>
            <li style="margin-right: 10px;"><a href="category.php?category=fitness"><strong>fitness</strong></a></li>
            <li style="margin-right: 10px;"><a href="category.php?category=party"><strong>party</strong></a></li>
        </ul>
    </div>

    <div class="search-form" style="display: flex; align-items: center;">
    <form action="searchpage.php" method="GET" style="display: flex;">
        <input type="text" name="q" id="searchQuery" placeholder="Enter search query" style="margin-right: 10px;">
        <input type="hidden" name="IDRECIPE" value="<?php echo isset($_GET['IDRECIPE']) ? $_GET['IDRECIPE'] : ''; ?>">
        <button type="submit" style="border: none; background: none; cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
            </svg>
        </button>
    </form>
</div>

</div>



        <br><br>
        <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <?php
                $connection = mysqli_connect("localhost", "root", "", "datatv");
                // Fetch articles from the database
                $query = "SELECT recipe.*, user.USENAME FROM recipe
                          INNER JOIN user ON recipe.IDUSER = user.IDUSER"; // Join the user table to retrieve username
                $result = mysqli_query($connection, $query);
                ?>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="col-sm-4 text-center">
                            <img src="images/<?= $row['IMAGER'] ?>" class="img-fluid" style="height: 200px; width: 400px;">
                            <h2 class="m-n" style="font-size: 30px;">
                                <a href="show.php?IDRECIPE=<?= $row['IDRECIPE'] ?>">
                                    <?= $row['TITLE'] ?>
                                </a>
                            </h2>
                            <p>
                                <?= $row['USENAME'] ?>&nbsp;|&nbsp;
                                <?= $row['DATER'] ?>&nbsp;|&nbsp;
                                <div class="add-fav" style="display: flex; align-items: center; border: 1px solid lightpink; border-radius: 1px; padding: 0 5px; width: 75px;">
                                    <a href="javascript:void(0)" id="saveButton" data-id="<?= $row['IDRECIPE'] ?>" class="btn btn-purple fav-btn favorite-btn" data-method="post" rel="nofollow" data-saved="false">save +</a>
                                </div>
                            </p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No articles found</p>
                <?php endif; ?>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Inside your recipe.php -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const saveButtons = document.querySelectorAll(".fav-btn");

    saveButtons.forEach(saveButton => {
        saveButton.addEventListener("click", function () {
            const recipeId = saveButton.getAttribute("data-id");
            const isSaved = saveButton.getAttribute("data-saved") === "true";

            // Update the UI
            if (!isSaved) {
                saveButton.textContent = "saved";
                saveButton.setAttribute("data-saved", "true");
            } else {
                saveButton.textContent = "save +";
                saveButton.setAttribute("data-saved", "false");
            }

            // Send AJAX request to save.php
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "save.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    console.log("Recipe saved successfully!");
                }
            };
            xhr.send("recipeId=" + recipeId + "&action=" + (isSaved ? "unsave" : "save"));
        });
    });
});
</script>

   <!-- Footer -->
   <footer id="footer">
						
							
							

							<ul class="copyright">
								<li>Copyright © 2023 TAASTEVAULT </li>
							</ul>
						
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