<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = htmlspecialchars($_POST['date_inn1']);
    $team = htmlspecialchars($_POST['team_inn1']);
    $name = htmlspecialchars($_POST['name_operator_inn1']);
    $oee = htmlspecialchars($_POST['oee_inn1']);
    $comment = htmlspecialchars($_POST['comment_inn1']);
    $quality1 = htmlspecialchars($_POST['quality1_inn1']);
    $quality2 = htmlspecialchars($_POST['quality2_inn1']);
    $quality3 = htmlspecialchars($_POST['quality3_inn1']);
    $id = htmlspecialchars($_POST['id_inn1']);
    $link->set_charset("utf8");
      mysqli_query($link, "UPDATE innotech2
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