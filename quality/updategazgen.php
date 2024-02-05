<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $quality1 = htmlspecialchars($_POST['gazgen_quality1']);
    $quality2 = htmlspecialchars($_POST['gazgen_quality2']);
    $quality3 = htmlspecialchars($_POST['gazgen_quality3']);
    $quality4 = htmlspecialchars($_POST['gazgen_quality4']);
    $comment = htmlspecialchars($_POST['gazgen_comment']);
    $link->set_charset("utf8");
      mysqli_query($link, "UPDATE gazgen
      SET quality1 = '$quality1',
      quality2 = '$quality2',
      quality3 = '$quality3', quality4 = '$quality4', comment = '$comment'
      WHERE date = '$dateTime' AND team = '$team'");
?>