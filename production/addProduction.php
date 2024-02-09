<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $user = htmlspecialchars($_POST['user']);
    $team = htmlspecialchars($_POST['team']);
    $plan_team = !empty($_POST['plan_team']) ? htmlspecialchars($_POST['plan_team']) : 0;
    $fact_team = !empty($_POST['fact_team']) ? htmlspecialchars($_POST['fact_team']) : 0;
    $deviation = !empty($_POST['deviation']) ? htmlspecialchars($_POST['deviation']) : 0;
    $oee_total = !empty($_POST['oee_total']) ? htmlspecialchars($_POST['oee_total']) : 0;
    $OEE_team = !empty($_POST['OEE_team']) ? htmlspecialchars($_POST['OEE_team']) : 0;

    $innotech1 = !empty($_POST['innotech1']) ? htmlspecialchars($_POST['innotech1']) : 0;
    $innotech1_trek = !empty($_POST['innotech1_trek']) ? htmlspecialchars($_POST['innotech1_trek']) : 0;
    $innotech1_user = !empty($_POST['innotech1_user']) ? htmlspecialchars($_POST['innotech1_user']) : 0;
    $innotech1_comment = !empty($_POST['innotech1_comment']) ? htmlspecialchars($_POST['innotech1_comment']) : 0;

    $innotech2 = !empty($_POST['innotech2']) ? htmlspecialchars($_POST['innotech2']) : 0;
    $innotech2_trek = !empty($_POST['innotech2_trek']) ? htmlspecialchars($_POST['innotech2_trek']) : 0;
    $innotech2_user = !empty($_POST['innotech2_user']) ? htmlspecialchars($_POST['innotech2_user']) : 0;
    $innotech2_comment = !empty($_POST['innotech2_comment']) ? htmlspecialchars($_POST['innotech2_comment']) : 0;

    $innotech3 = !empty($_POST['innotech3']) ? htmlspecialchars($_POST['innotech3']) : 0;
    $innotech3_trek = !empty($_POST['innotech3_trek']) ? htmlspecialchars($_POST['innotech3_trek']) : 0;
    $innotech3_user = !empty($_POST['innotech3_user']) ? htmlspecialchars($_POST['innotech3_user']) : 0;
    $innotech3_comment = !empty($_POST['innotech3_comment']) ? htmlspecialchars($_POST['innotech3_comment']) : 0;

    $uva4 = !empty($_POST['uva4']) ? htmlspecialchars($_POST['uva4']) : 0;
    $uva4_trek = !empty($_POST['uva4_trek']) ? htmlspecialchars($_POST['uva4_trek']) : 0;
    $uva4_user = !empty($_POST['uva4_user']) ? htmlspecialchars($_POST['uva4_user']) : 0;
    $uva4_comment = !empty($_POST['uva4_comment']) ? htmlspecialchars($_POST['uva4_comment']) : 0;

    $uva5 = !empty($_POST['uva5']) ? htmlspecialchars($_POST['uva5']) : 0;
    $uva5_trek = !empty($_POST['uva5_trek']) ? htmlspecialchars($_POST['uva5_trek']) : 0;
    $uva5_user = !empty($_POST['uva5_user']) ? htmlspecialchars($_POST['uva5_user']) : 0;
    $uva5_comment = !empty($_POST['uva5_comment']) ? htmlspecialchars($_POST['uva5_comment']) : 0;

    $acma = !empty($_POST['acma']) ? htmlspecialchars($_POST['acma']) : 0;
    $acma_trek = !empty($_POST['acma_trek']) ? htmlspecialchars($_POST['acma_trek']) : 0;
    $acma_user = !empty($_POST['acma_user']) ? htmlspecialchars($_POST['acma_user']) : 0;
    $acma_comment = !empty($_POST['acma_comment']) ? htmlspecialchars($_POST['acma_comment']) : 0;

    $link->set_charset("utf8");

    mysqli_query($link, "INSERT INTO `productionsms`
      (`id`,
      `datetime`,
      `team`,
      
      `plan_team`,
      `fact_team`,
      `deviation`,
      `oee_total`,
      `OEE_team`,

      `innotech1`,
      `innotech1_trek`,
      `innotech1_user`,
      `innotech1_comment`,

      `innotech2`,
      `innotech2_trek`,
      `innotech2_user`,
      `innotech2_comment`,

      `innotech3`,
      `innotech3_trek`,
      `innotech3_user`,
      `innotech3_comment`,

      `uva4`,
      `uva4_trek`,
      `uva4_user`,
      `uva4_comment`,

      `uva5`,
      `uva5_trek`,
      `uva5_user`,
      `uva5_comment`,

      `acma`,
      `acma_trek`,
      `acma_user`,
      `acma_comment`,
      `created_user`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      
      '$plan_team',
      '$fact_team',
      '$deviation',
      '$oee_total',
      '$OEE_team',

      '$innotech1',
      '$innotech1_trek',
      '$innotech1_user',
      '$innotech1_comment',

      '$innotech2',
      '$innotech2_trek',
      '$innotech2_user',
      '$innotech2_comment',

      '$innotech3',
      '$innotech3_trek',
      '$innotech3_user',
      '$innotech3_comment',

      '$uva4',
      '$uva4_trek',
      '$uva4_user',
      '$uva4_comment',

      '$uva5',
      '$uva5_trek',
      '$uva5_user',
      '$uva5_comment',

      '$acma',
      '$acma_trek',
      '$acma_user',
      '$acma_comment', '$user')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'plan_team' => $plan_team,
'fact_team' => $fact_team,
'deviation' => $deviation,
'oee_total' => $oee_total,
'OEE_team' => $OEE_team, 

'innotech1' => $innotech1, 
'innotech1_trek' => $innotech1_trek, 
'innotech1_user' => $innotech1_user, 
'innotech1' => $innotech1, 

'innotech2' => $innotech2, 
'innotech2_trek' => $innotech2_trek, 
'innotech2_user' => $innotech2_user, 
'innotech2_comment' => $innotech2_comment, 

'innotech3' => $innotech3, 
'innotech3_trek' => $innotech3_trek, 
'innotech3_user' => $innotech3_user, 
'innotech3_comment' => $innotech3_comment, 

'uva4' => $uva4, 
'uva4_trek' => $uva4_trek, 
'uva4_user' => $uva4_user, 
'uva4_comment' => $uva4_comment, 

'uva5' => $uva5, 
'uva5_trek' => $uva5_trek, 
'uva5_user' => $uva5_user, 
'uva5_comment' => $uva5_comment, 

'acma' => $acma, 
'acma_trek' => $acma_trek, 
'acma_user' => $acma_user, 
'acma_comment' => $acma_comment));
?>
