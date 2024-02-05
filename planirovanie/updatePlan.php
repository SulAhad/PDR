<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $avtomat = htmlspecialchars($_POST['avtomat']);
    $format = htmlspecialchars($_POST['format']);
    $date_start = htmlspecialchars($_POST['date_start']);
    $con = htmlspecialchars($_POST['con']);
    $pcs_min = htmlspecialchars($_POST['pcs_min']);
    $date_end = htmlspecialchars($_POST['date_end']);
    $name = htmlspecialchars($_POST['name']);
    $id = htmlspecialchars($_POST['id']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE plansms
      SET avtomat = '$avtomat',
      format = '$format',
      date_start = '$date_start',
      con = '$con',
      pcs_min = '$pcs_min',
      date_end = '$date_end',
      name = '$name'
      WHERE id = '$id'");
?>
