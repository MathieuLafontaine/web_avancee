<?php
if (isset($_GET['id']) && $_GET['id'] != null) {

    require_once('../classes/dbConnex.php');
    require_once('../classes/modifications.php');
    $id = $_GET['id'];
    //creation d'une connection
    $db = new dbConnex();
    $instance = new modifications($db);
    $selectId = $instance->selectId('Tea', $id, 'idTea');
    if ($selectId) {
        extract($selectId);
    } else {
        header('location:../index.php');
    }
} else {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tea Show</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1 class="logo">Teashop</h1>
    </header>
    <main>
        <div class="container">
            <h1>Tea</h1>
            <p><strong>Type: </strong><?= $typeTea; ?></p>
            <p><strong>Brand: </strong><?= $brandTea; ?></p>
            <p><strong>Description: </strong><?= $descriptionTea; ?></p>
            <p><strong>Price: </strong>$<?= number_format($priceTea, 2); ?></p>

            <a href="tea-edit.php?id=<?= $id; ?>" class="btn">Edit</a>
            <form action="tea-delete.php" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <button type="submit" class="bouton delete">Delete</button>
            </form>
        </div>
        <a href="../index.php" class="bouton">Return to Home Page</a>
    </main>
    <footer>
        <h6>&copy All rights reserved</h6>
    </footer>
</body>

</html>