<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>TasteVault</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
         body {
            text-align: center;
        }
        .signup-form {
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
        }
        .signup-form .form-group {
            margin-bottom: 20px; /* Add space between form groups */
        }
        .signup-form h4 {
            text-align: left; /* Align h4 headings to the left */
        }
    </style>
</head>
<body>
    <div class="signup-form">
        <form action="recipeadding.php" method="post" enctype="multipart/form-data">
            <h2 class="hint-text">Create your recipe</h2>
            <div class="form-group">
                
                <input type="text" class="form-control" name="TITLE" placeholder="title" required="required">
            </div>
            <br>
            <div class="form-group">
                <h4>Ingredients</h4>
                <textarea name="ingredients" id="ingredients" cols="30" placeholder="write ingredients here" rows="10" required="required"></textarea>
            </div>
            <br>
            <div class="form-group">
                <h4>Description</h4>
                <textarea name="description" id="description" cols="30" rows="10" placeholder="write description here" required="required"></textarea>
            </div>
            <br>
            <div class="form-group">
                <h4>Category of recipe</h4>
                
                <select name="category" id="category" style="width:160px">
                    
                <option></option>   
                <option>dinner</option>   

                    <option>desert</option>     
                    <option>fitness</option>
                    <option>breakfast</option>
                    <option>lunch</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="image" style="text-align: left;">File Input</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <br>
            <div class="form-group"style="width:160px ;text-align: left;">
                <label for="date" >Date</label>
                <input type="date" class="form-control" name="date" required="required">
            </div>
            <br>
            <div class="form-group">
               
            <button type="submit" name="save" class="btn btn-success btn-lg btn-left" style="background:#007bff;">Add Now</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <h2>Follow Us</h2>
            <ul class="icons">
                <li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
            </ul>
        </div>
        <ul class="copyright">
            <li>Copyright © 2023 TAASTEVAULT</li>
        </ul>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
