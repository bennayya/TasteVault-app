<?php
if (isset($_GET['IDRECIPE'])) {
    $recipeId = $_GET['IDRECIPE'];
    $query = "SELECT * FROM recipe WHERE IDRECIPE = $recipeId";
} else {
    // Redirect to the recipe list page if no specific recipe ID is provided
    header("Location: recipe.php");
    exit();
}
?>