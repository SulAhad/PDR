<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $avtomat = htmlspecialchars($_POST['avtomat']);
    $date = htmlspecialchars($_POST['date']);
    $team = htmlspecialchars($_POST['team']);
    $id_user = htmlspecialchars($_POST['id_user']);
    $name_avtomat = htmlspecialchars($_POST['name_avtomat']);
    $name = htmlspecialchars($_POST['name']);
    $oee = htmlspecialchars($_POST['oee']);
    $percent = htmlspecialchars($_POST['percent']);
    $comment = htmlspecialchars($_POST['comment']);
    $quality1 = htmlspecialchars($_POST['quality1']);
    $quality2 = htmlspecialchars($_POST['quality2']);
    $quality3 = htmlspecialchars($_POST['quality3']);
    $quality4 = htmlspecialchars($_POST['quality4']);
    $id = htmlspecialchars($_POST['id']);
    $link->set_charset("utf8");
      mysqli_query($link, "UPDATE $avtomat
      SET date = '$date',
      team = '$team',
      id_user = '$id_user',
      name_avtomat = '$name_avtomat',
      name_operator = '$name',
      oee = '$oee',
      percent = '$percent',
      comment = '$comment',
      quality1 = '$quality1',
      quality2 = '$quality2',
      quality3 = '$quality3', quality4 = '$quality4'
      WHERE id = '$id'");
?>