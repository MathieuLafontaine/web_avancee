<?php
if (isset($_GET['id']) && $_GET['id'] != null) {

    require_once('../classes/dbConnex.php');
    require_once('../classes/modifications.php');
    $id = $_GET['id'];
    //creation d'une connection
    $db = new dbConnex();
    $instance = new modifications($db);
    $selectId = $instance->selectId('Client', $id, 'idClient');
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
    <title>Client Show</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <header>
        <h1 class="logo">Teashop</h1>
    </header>
    <main>
        <div class="container">
            <h1>Client</h1>
            <p><strong>Name: </strong><?= $nameClient; ?></p>
            <p><strong>Username: </strong><?= $usernameClient; ?></p>
            <p><strong>Password: </strong>*********</p>
            <p><strong>Email: </strong><?= $emailClient; ?></p>
            <a href="client-edit.php?id=<?= $id; ?>" class="bouton">Edit</a>
            <form action="client-delete.php" method="post">
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