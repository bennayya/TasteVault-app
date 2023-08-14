<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["product_name"])) {
                $productByTitle = $db_handle->runQuery("SELECT * FROM recipe WHERE TITLE='" . $_POST["product_name"] . "'");
                $itemArray = array($productByTitle[0]["TITLE"] => array('TITLE' => $productByTitle[0]["TITLE"], 'prix' => $productByTitle[0]["prix"], 'IMAGER' => $productByTitle[0]["IMAGER"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (array_key_exists($productByTitle[0]["TITLE"], $_SESSION["cart_item"])) {
                        // Product is already in the cart
                    } else {
                        // Product is not in the cart, add it
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["name"] == $v["TITLE"]) {
                        unset($_SESSION["cart_item"][$k]);
                    }
                    if (empty($_SESSION["cart_item"])) {
                        unset($_SESSION["cart_item"]);
                    }
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

<HTML>
<HEAD>
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
<!-- Other meta tags, title, etc. -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	
	<style>
		body {
	
	color: #211a1a;
	font-size: 15px;
}

#shopping-cart {
	margin: 40px;
}

#product-grid {
	margin: 40px;
}

#shopping-cart table {
	width: 100%;
	background-color: #F0F0F0;
}

#shopping-cart table td {
	background-color: #FFFFFF;
}

.txt-heading {
	color: #211a1a;
	border-bottom: 1px solid #E0E0E0;
	overflow: auto;
}

#btnEmpty {
	background-color: #ffffff;
	border: #d00000 1px solid;
	padding: 5px 10px;
	color: #d00000;
	float: right;
	text-decoration: none;
	border-radius: 3px;
	margin: 10px 0px;
}

.btnAddAction {
    padding: 5px 10px;
    margin-left: 5px;
    background-color: #efefef;
    border: #E0E0E0 1px solid;
    color: #211a1a;
    float: right;
    text-decoration: none;
    border-radius: 3px;
    cursor: pointer;
}

#product-grid .txt-heading {
	margin-bottom: 18px;
}

.product-item {
	float: left;
	background: #ffffff;
	margin: 30px 30px 0px 0px;
	border: #E0E0E0 1px solid;
}

.product-image {
	height: 155px;
	width: 250px;
	background-color: #FFF;
}

.clear-float {
	clear: both;
}

.demo-input-box {
	border-radius: 2px;
	border: #CCC 1px solid;
	padding: 2px 1px;
}

.tbl-cart {
	font-size: 15px;
}

.tbl-cart th {
	font-weight: normal;
}

.product-title {
	margin-bottom: 20px;
}

.product-price {
	float:left;
}

.cart-action {
	float: right;
}

.product-quantity {
    padding: 5px 10px;
    border-radius: 3px;
    border: #E0E0E0 1px solid;
}

.product-tile-footer {
    padding: 15px 15px 0px 15px;
    overflow: auto;
}

.cart-item-image {
	width: 30px;
    height: 30px;
    border-radius: 50%;
    border: #E0E0E0 1px solid;
    padding: 5px;
    vertical-align: middle;
    margin-right: 15px;
}
.no-records {
	text-align: center;
	clear: both;
	margin: 38px 0px;
}
	</style>
</HEAD>
<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="home.php" class="logo">
								<span class="fas fa-atom"></span><span style="font-size:30px" class="title">TasteVault</span>
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

							<li><a href="iindex.php">Shop</a></li>

							<li><a href="about.php">About</a></li>

							<li><a href="contact.php">Contact Us</a></li>

							<li><a href="profile.php">profile</a></li>

							<li><a href="logout.php">LogOut</a></li>
						</ul>
					</nav>
<div id="shopping-cart">
    <div class="txt-heading"> <p> Shopping Cart</p></div>

    <a id="btnEmpty" href="iindex.php?action=empty">Empty Cart</a>
    <?php
    if (isset($_SESSION["cart_item"])) {
        $total_price = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:left;"width="50%">Title</th>
                <th style="text-align:right;"width="40%">Price</th>
                <th style="text-align:center;" width="20%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item) {
                ?>
                <tr>
                    <td><?php echo $item["TITLE"]; ?></td>
                    <td style="text-align:right;"><?php echo number_format($item["prix"], 2) . " DH"; ?></td>

                    <td style="text-align:center;">
                        <a href="iindex.php?action=remove&name=<?php echo $item["TITLE"]; ?>"
                           class="btnRemoveAction">
                            <img src="images/icon-delete.png" alt="Remove Item"/>
                        </a>
                    </td>
                </tr>
                <?php
                $total_price += $item["prix"];
            }
            ?>
            <tr>
                <td colspan="2" >Total:</td>
                <td colspan="2"><strong><?php echo number_format($total_price, 2) . " DH"; ?></strong></td>

                <td></td>
            </tr>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php
    }
    ?>
</div>

<div id="product-grid">
    <div class="txt-heading">Products</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM recipe");
    if (!empty($product_array)) {
        foreach ($product_array as $key => $value) {
            ?>
            <div class="product-item">
                <form method="post"
                      action="iindex.php?action=add">
                    <div class="product-image"><img src="images/<?php echo $product_array[$key]["IMAGER"]; ?>"
                                                   style="width:200px;height:200px"></div> <br> <br>
                    <div class="product-tile-footer">
                        
                        <div class="product-title"><?php echo $product_array[$key]["TITLE"]; ?></div>
                        <div class="product-price"><?php echo $product_array[$key]["prix"] . " DH"; ?></div>

                        <div class="cart-action">
                            <input type="hidden" name="product_name"
                                   value="<?php echo $product_array[$key]["TITLE"]; ?>">
                            <input type="submit" value="Add to Cart" class="btnAddAction"/>
                        </div>
                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>
</div>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>
</BODY>
</HTML>
