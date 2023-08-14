<?php
require_once 'connexion.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    if (filter_var($id, FILTER_VALIDATE_INT) && $id > 0) {
        // Rest of your code ...

        $sql = "DELETE FROM recipe WHERE IDRECIPE = ?";
        $q = $conn->prepare($sql);
        $q->bind_param("i", $id);
        $q->execute();

        // ... rest of your code ...

        header("Location: profile.php");
        exit();
    } else {
        echo "Invalid ID value. Please provide a valid ID.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Recipe</title>
</head>
<body>

<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Delete Recipe</h3>
        </div>

        <form class="form-horizontal" action="delete.php" method="get">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
            Are you sure you want to delete this recipe?
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
