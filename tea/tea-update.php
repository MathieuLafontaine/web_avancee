<?php

require_once('../classes/dbConnex.php');
require_once('../classes/modifications.php');

//creation d'une connection
$db = new dbConnex();
$instance = new modifications($db);

$update = $instance->update('tea', $_POST, 'idTea');

if ($update) {
    header('location:../index.php');
} else {
    echo "error";
}
