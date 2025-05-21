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

$insert = $instance->insert('tea', $_POST);

header('location:tea-show.php?id=' . $insert);
