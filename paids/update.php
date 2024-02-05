<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $avtomat = htmlspecialchars($_POST['avtomat']);
    $date = htmlspecialchars($_POST['date']);
    $team = htmlspecialchars($_POST['team']);
    $name = htmlspecialchars($_POST['name']);
    $oee = htmlspecialchars($_POST['oee']);
    $comment = htmlspecialchars($_POST['comment']);
    $quality1 = htmlspecialchars($_POST['quality1']);
    $quality2 = htmlspecialchars($_POST['quality2']);
    $quality3 = htmlspecialchars($_POST['quality3']);
    $id = htmlspecialchars($_POST['id']);
    $link->set_charset("utf8");
      mysqli_query($link, "UPDATE $avtomat
      SET date = '$date',
      team = '$team',
      name_operator = '$name',
      oee = '$oee',
      comment = '$comment',
      quality1 = '$quality1',
      quality2 = '$quality2',
      quality3 = '$quality3'
      WHERE id = '$id'");
?>