<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
<title>
  TasteVault
</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
            body {
                background-color:#f6f6f6;
                display:flex;
                justify-content:center;
                align-items:center;
                height:100vh;
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
                
                padding:10px 15px;
                color:#fff;
                border-radius:5px;
                margin-right:10px;
                border:none;
            }
            button:hover{
                opacity:.7;
            }
            .error{
                background:#f2dede;
                color:#a94442;
                padding:10px;
                width:95%;
                border-radius:5px;
            }
        </style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="signup-form">
    <form action="register_a.php" method="post" enctype="multipart/form-data">
		<h2>Register</h2>
		<p class="hint-text">Create your account</p>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="UserName" required="required">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required="required">
        </div>
            

		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block" style="background:#ffb7c5;">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
    </form>
	
</div>
</body>
</html>