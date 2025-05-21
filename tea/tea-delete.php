<?php

$id = $_POST['id'];


require_once('../classes/dbConnex.php');
require_once('../classes/modifications.php');

//creation d'une connection
$db = new dbConnex();
$instance = new modifications($db);


$delete = $instance->delete('tea', $id, 'idTea');

if ($delete) {
    header('location:../index.php');
} else {
    echo "Error 404. Please exit.";
}
