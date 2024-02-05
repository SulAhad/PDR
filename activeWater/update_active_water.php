<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $id_water = htmlspecialchars($_POST['id_water']);
    $date_water = htmlspecialchars($_POST['date_water']);
    $w1 = htmlspecialchars($_POST['w1']);
    $w2 = htmlspecialchars($_POST['w2']);
    $w3 = htmlspecialchars($_POST['w3']);
    $w4 = htmlspecialchars($_POST['w4']);
    $w5 = htmlspecialchars($_POST['w5']);
    $w6 = htmlspecialchars($_POST['w6']);
    $w7 = htmlspecialchars($_POST['w7']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE Active_water_KPI
  SET date = '$date_water',
  w1 = '$w1',
  w2 = '$w2',
  w3 = '$w3',
  w4 = '$w4',
  w5 = '$w5',
  w6 = '$w6',
  w7 = '$w7'
  WHERE id = '$id_water'");
?>
