<!DOCTYPE html>
<html>
    <head>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">

<title>
  TasteVault
</title>
        <style>
            body {
                background-color:#f6f6f6;
                display:flex;
                justify-content:center;
                align-items:center;
                height:90vh;
            }
            *{
                font-family:sans-serif;
                box-sizing:border-box;
            }
            form{
                width:500px;
                border:2px solid #ccc;
                padding:30px;
                background:#fff;
                border-radius:15px; 
            }
            h2{
                text-align:center;
                margin-bottom:40px;
            }
            input{
                display:block;
                border:2px solid #ccc;
                width:95%;
                padding:10px;
                margin:10px auto;
                border-radius:5px;
            }
            label{
                color:#888;
                font-size:18px;
                padding:10px;
            }
            button{
                float:right;
                background:#ffb7c5;
                padding:10px 15px;
                color:#fff;
                border-radius:5px;
                margin-right:10px;
                border:none;
            }
            button:hover{
                opacity: .7;
            }
            .error{
                background:#f2dede;
                color:#a94442;
                padding:10px;
                width:95%;
                border-radius:5px;
            }
        </style>
    </head>
    <body>
        <form action="login.php" method="post">
            <h2>LOGIN</h2>
            <?php if(isset($_GET['error'])){?>
            <p class="error"><?php echo $_GET['error'];?></p>
            <?php } ?>
            <label>UserName</label>
            <input type="text" name="uname" placeholder="User Name">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
            <button type="submit">login</button>
            <div class="text-center">Don't have an account? <a href="register.php">Register Here</a></div>
        </form>


        		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>
    </body>
</html>
