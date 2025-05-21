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
    <title>Client Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1 class="logo">Teashop</h1>
    </header>
    <main>
        <div class="container">
            <h1>Client Edit</h1>
            <form action="client-update.php" method="post">
                <label>Name
                    <input type="text" name="nameClient" value="<?= $nameClient; ?>">
                </label>
                <label>Username
                    <input type="text" name="usernameClient" value="<?= $usernameClient; ?>">
                </label>
                <label>Password
                    <input type="text" name="passwordClient" value="<?= $passwordClient; ?>">
                </label>
                <label>Email
                    <input type="email" name="emailClient" value="<?= $emailClient; ?>">
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