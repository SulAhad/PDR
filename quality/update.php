<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $inn1_quality1 = htmlspecialchars($_POST['inn1_quality1']);
    $inn1_quality2 = htmlspecialchars($_POST['inn1_quality2']);
    $inn1_quality3 = htmlspecialchars($_POST['inn1_quality3']);
    $inn1_comment = htmlspecialchars($_POST['inn1_comment']);
    $inn2_quality1 = htmlspecialchars($_POST['inn2_quality1']);
    $inn2_quality2 = htmlspecialchars($_POST['inn2_quality2']);
    $inn2_quality3 = htmlspecialchars($_POST['inn2_quality3']);
    $inn2_comment = htmlspecialchars($_POST['inn2_comment']);
    $inn3_quality1 = htmlspecialchars($_POST['inn3_quality1']);
    $inn3_quality2 = htmlspecialchars($_POST['inn3_quality2']);
    $inn3_quality3 = htmlspecialchars($_POST['inn3_quality3']);
    $inn3_comment = htmlspecialchars($_POST['inn3_comment']);
    $link->set_charset("utf8");
    
    // Update innotech1 table
    mysqli_query($link, "UPDATE innotech1
      SET quality1 = '$inn1_quality1',
      quality2 = '$inn1_quality2',
      quality3 = '$inn1_quality3',
      comment = '$inn1_comment'
      WHERE date = '$dateTime' AND team = '$team'");
      
    // Update innotech2 table
    mysqli_query($link, "UPDATE innotech2
      SET quality1 = '$inn2_quality1',
      quality2 = '$inn2_quality2',
      quality3 = '$inn2_quality3'
      WHERE date = '$dateTime' AND team = '$team'");
?>