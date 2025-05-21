<?php
require_once('classes/dbConnex.php');
require_once('classes/selections.php');
require_once('classes/modifications.php');

// Create database connection
$db = new dbConnex();
$instance = new modifications($db);

// Fetch data from all tables
$clients = $instance->select('client', 'nameClient');
$teas = $instance->select('tea', 'typeTea');
$transactions = $instance->selectTransactions('Transaction', 'dateTransaction', 'DESC');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teashop</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <header>
        <h1 class="logo">Teashop</h1>
    </header>
    <main>
        <section class="welcome">
            <h1>Welcome to the Teashop database!</h1>
            <p>The purpose of this page is simply to view and/or edit entries in the system. Any other uses are strictly prohibitted.</p>
        </section>
        <section class="index__tables">
            <h1>Clients</h1>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($clients as $row) {
                    ?>
                        <tr>
                            <td><?= $row['nameClient'] ?></td>
                            <td><?= $row['usernameClient'] ?></td>
                            <td>*********</td>
                            <td><?= $row['emailClient'] ?></td>
                            <td><a href="./client/client-show.php?id=<?= $row['idClient']; ?>">View</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <br><br>
            <a href="./client/client-create.php" class="bouton">New Client</a>
        </section>
        <section class="index__tables">
            <h1>Teas</h1>
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($teas as $row) {
                    ?>
                        <tr>
                            <td><?= $row['typeTea'] ?></td>
                            <td><?= $row['brandTea'] ?></td>
                            <td><?= $row['descriptionTea'] ?></td>
                            <td>$<?= $row['priceTea'] ?></td>
                            <td><a href="./tea/tea-show.php?id=<?= $row['idTea']; ?>">View</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <br><br>
            <a href="./tea/tea-create.php" class="bouton">New Tea</a>
        </section>
        <section class="index__tables">
            <h1>Transactions</h1>
            <table>
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Tea Type</th>
                        <th>Date</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Payment Method</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($transactions as $row) {
                    ?>
                        <tr>
                            <td><?= $row['nameClient'] ?></td>
                            <td><?= $row['typeTea'] ?></td>
                            <td><?= $row['dateTransaction'] ?></td>
                            <td><?= $row['quantityTransaction'] ?></td>
                            <td>$<?= $row['totalPrice'] ?></td>
                            <td><?= $row['nameMethode'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <footer>
            <h6>&copy All rights reserved</h6>
        </footer>
    </main>

</body>

</html>