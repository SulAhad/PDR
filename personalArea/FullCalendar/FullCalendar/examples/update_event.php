<?php
$link = mysqli_connect('127.0.0.1', 'root', 'root', 'u1851636_default');
$id = htmlspecialchars($_POST['id']);
$start = htmlspecialchars($_POST['start']);
$end = htmlspecialchars($_POST['end']);

$link->set_charset("utf8");
mysqli_query($link, "UPDATE plansms
SET date_start = '$start',
date_end = '$end'
WHERE id = '$id'");
?>
