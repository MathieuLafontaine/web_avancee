<?php
require_once('../classes/dbConnex.php');
require_once('../classes/modifications.php');

// Create database connection
$db = new dbConnex();
$instance = new modifications($db);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teashop - Tea Create</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1 class="logo">Teashop</h1>
    </header>
    <main>
        <div class="container">
            <h1>Add a New Tea</h1>
            <form action="tea-store.php" method="post">
                <label>Tea Type
                    <input type="text" name="typeTea" required>
                </label>
                <label>Brand
                    <input type="text" name="brandTea" required>
                </label>
                <label>Description
                    <textarea name="descriptionTea" rows="4"></textarea>
                </label>
                <label>Price
                    <input type="number" name="priceTea" step="0.01" min="0" required>
                </label>
                <input type="submit" class="bouton" value="Save">
            </form>
        </div>
    </main>
    <footer>
        <h6>&copy All rights reserved</h6>
    </footer>
</body>

</html>