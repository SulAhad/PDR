<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $quality1 = htmlspecialchars($_POST['inn2_quality1']);
    $quality2 = htmlspecialchars($_POST['inn2_quality2']);
    $quality3 = htmlspecialchars($_POST['inn2_quality3']);
    $comment = htmlspecialchars($_POST['inn2_comment']);
    $link->set_charset("utf8");
      mysqli_query($link, "UPDATE innotech2
      SET quality1 = '$quality1',
      quality2 = '$quality2',
      quality3 = '$quality3', comment = '$comment'
      WHERE date = '$dateTime' AND team = '$team'");
?>