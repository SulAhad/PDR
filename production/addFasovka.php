<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    if($innotech1_user == $rowUser['id'])
    {

    }
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $dateTime = htmlspecialchars($_POST['dateTime']);
    
    $innotech1_user = htmlspecialchars($_POST['innotech1_user']);

    $innotech2 = htmlspecialchars($_POST['innotech2']);
    $innotech2_user = htmlspecialchars($_POST['innotech2_user']);

    $innotech3 = htmlspecialchars($_POST['innotech3']);
    $innotech3_user = htmlspecialchars($_POST['innotech3_user']);

    $uva4 = htmlspecialchars($_POST['uva4']);
    $uva4_user = htmlspecialchars($_POST['uva4_user']);

    $uva5 = htmlspecialchars($_POST['uva5']);
    $uva5_user = htmlspecialchars($_POST['uva5_user']);

    $acma = htmlspecialchars($_POST['acma']);
    $acma_user = htmlspecialchars($_POST['acma_user']);

    $link->set_charset("utf8");

    mysqli_query($link, "INSERT INTO `fasovka`
      (`id`,
      `date`,
      `team`,

      `innotech1`,
      `innotech1_user`,

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
      `acma_comment`)
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
      '$acma_comment')");
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
