<?php
require 'config/Database.php';

$id = $_GET['id'];
$db = new Database();
$db->deleteBarang($id);

header('Location: index.php');
?>