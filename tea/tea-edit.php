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
    <title>Tea Edit</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1 class="logo">Teashop</h1>
    </header>
    <main>
        <div class="container">
            <h1>Tea Edit</h1>
            <form action="tea-store.php" method="post">
                <label>Type
                    <input type="text" name="typeTea" value="<?= $typeTea; ?>">
                </label>
                <label>Brand
                    <input type="text" name="brandTea" value="<?= $brandTea; ?>">
                </label>
                <label>Description
                    <input type="text" name="descriptionTea" value="<?= $descriptionTea; ?>">
                </label>
                <label>Price
                    <input type="text" name="priceTea" value="<?= $priceTea; ?>">
                </label>
                <input type="submit" class="bouton" value="Save">
            </form>
        </div>
    </main>
</body>

</html>