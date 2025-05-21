<?php
require_once('../classes/dbConnex.php');
require_once('../classes/modifications.php');

//creation d'une connection
$db = new dbConnex();
$instance = new modifications($db);

$select = $instance->select('Client', 'nameClient');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teashop - Client Create</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <header>
        <h1 class="logo">Teashop</h1>
    </header>
    <main>
        <div class="container">
            <h1>Add a New Client</h1>
            <form action="client-store.php" method="post">
                <label>Name
                    <input type="text" name="nameClient" required>
                </label>
                <label>Username
                    <input type="text" name="usernameClient" required>
                </label>
                <label>Password
                    <input type="text" name="passwordClient" required>
                </label>
                <label>Email
                    <input type="email" name="emailClient" required>
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