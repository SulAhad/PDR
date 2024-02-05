<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $quality1 = htmlspecialchars($_POST['acma_quality1']);
    $quality2 = htmlspecialchars($_POST['acma_quality2']);
    $quality3 = htmlspecialchars($_POST['acma_quality3']);
    $comment = htmlspecialchars($_POST['acma_comment']);
    $link->set_charset("utf8");
      mysqli_query($link, "UPDATE acma
      SET quality1 = '$quality1',
      quality2 = '$quality2',
      quality3 = '$quality3', comment = '$comment'
      WHERE date = '$dateTime' AND team = '$team'");
?>