<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $datetime = htmlspecialchars($_POST['datetime']);
    $team = htmlspecialchars($_POST['team']);
    $plan_team = htmlspecialchars($_POST['plan_team']);
    $fact_team = htmlspecialchars($_POST['fact_team']);
    $deviation = htmlspecialchars($_POST['deviation']);
    $user = htmlspecialchars($_POST['user']);
    $innotech1 = htmlspecialchars($_POST['innotech1']);
    $innotech2 = htmlspecialchars($_POST['innotech2']);
    $innotech3 = htmlspecialchars($_POST['innotech3']);
    $uva4 = htmlspecialchars($_POST['uva4']);
    $uva5 = htmlspecialchars($_POST['uva5']);
    $acma = htmlspecialchars($_POST['acma']);
    $OEE_team = htmlspecialchars($_POST['OEE_team']);
    $innotech1_comment = htmlspecialchars($_POST['innotech1_comment']);
    $innotech2_comment = htmlspecialchars($_POST['innotech2_comment']);
    $innotech3_comment = htmlspecialchars($_POST['innotech3_comment']);
    $uva4_comment = htmlspecialchars($_POST['uva4_comment']);
    $uva5_comment = htmlspecialchars($_POST['uva5_comment']);
    $acma_comment = htmlspecialchars($_POST['acma_comment']);
    $idProduction = htmlspecialchars($_POST['idProduction']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE productionsms
      SET datetime = '$datetime',
      team = '$team',
      plan_team = '$plan_team',
      fact_team = '$fact_team',
      deviation = '$deviation',
      innotech1 = '$innotech1',
      innotech2 = '$innotech2',
      innotech3 = '$innotech3',
      uva4 = '$uva4',
      uva5 = '$uva5',
      acma = '$acma',
      OEE_team = '$OEE_team',
      innotech1_comment = '$innotech1_comment',
      innotech2_comment = '$innotech2_comment',
      innotech3_comment = '$innotech3_comment',
      uva4_comment = '$uva4_comment',
      uva5_comment = '$uva5_comment',
      acma_comment = '$acma_comment',
      created_user = '$user'
      WHERE id = '$idProduction'");
?>
