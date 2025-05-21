<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: ../index.php');
    exit;
}

require_once('../classes/dbConnex.php');
require_once('../classes/modifications.php');

//creation d'une connection
$db = new dbConnex();
$instance = new modifications($db);

$insert = $instance->insert('Client', $_POST);

header('location:client-show.php?id=' . $insert);
