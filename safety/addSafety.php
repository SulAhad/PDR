<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $Incedents = htmlspecialchars($_POST['Incedents']);
    $NearMiss = htmlspecialchars($_POST['NearMiss']);
    $Bbswa = htmlspecialchars($_POST['Bbswa']);
    $Kol_vo_zam = htmlspecialchars($_POST['Kol_vo_zam']);
    
    $Kol_zam_teamA = htmlspecialchars($_POST['Kol_zam_teamA']);
    $Bbs_teamA = htmlspecialchars($_POST['Bbs_teamA']);
    $Rpm_zam_teamA = htmlspecialchars($_POST['Rpm_zam_teamA']);
    $Rpm_bbs_teamA = htmlspecialchars($_POST['Rpm_bbs_teamA']);
    
    $Kol_zam_Sulf = htmlspecialchars($_POST['Kol_zam_Sulf']);
    $Bbs_Sulf = htmlspecialchars($_POST['Bbs_Sulf']);
    $Rpm_zam_Sulf = htmlspecialchars($_POST['Rpm_zam_Sulf']);
    $Rpm_bbs_Sulf = htmlspecialchars($_POST['Rpm_bbs_Sulf']);
    
    $Incedents_comment = htmlspecialchars($_POST['Incedents_comment']);
    $NearMiss_comment = htmlspecialchars($_POST['NearMiss_comment']);
    $Bbswa_comment = htmlspecialchars($_POST['Bbswa_comment']);
    $Kol_vo_zam_comment = htmlspecialchars($_POST['Kol_vo_zam_comment']);
    
    $Kol_zam_teamA_comment = htmlspecialchars($_POST['Kol_zam_teamA_comment']);
    $Bbs_teamA_comment = htmlspecialchars($_POST['Bbs_teamA_comment']);
    $Rpm_zam_teamA_comment = htmlspecialchars($_POST['Rpm_zam_teamA_comment']);
    $Rpm_bbs_teamA_comment = htmlspecialchars($_POST['Rpm_bbs_teamA_comment']);
    
    $Kol_zam_Sulf_comment = htmlspecialchars($_POST['Kol_zam_Sulf_comment']);
    $Bbs_Sulf_comment = htmlspecialchars($_POST['Bbs_Sulf_comment']);
    $Rpm_zam_Sulf_comment = htmlspecialchars($_POST['Rpm_zam_Sulf_comment']);
    $Rpm_bbs_Sulf_comment = htmlspecialchars($_POST['Rpm_bbs_Sulf_comment']);
    $reserve->set_charset("utf8");
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `Safety_KPI` 
      (`id`, 
      `date`,
      `Incedents`,
      `NearMiss`,
      `Bbswa`,
      `Kol_vo_zam`,
      
      `Kol_zam_teamA`,
        `Bbs_teamA`,
        `Rpm_zam_teamA`,
        `Rpm_bbs_teamA`,
        
      `Kol_zam_Sulf`,
      `Bbs_Sulf`,
      `Rpm_zam_Sulf`,
      `Rpm_bbs_Sulf`,
      
      `Incedents_comment`,
      `NearMiss_comment`,
      `Bbswa_comment`,
      `Kol_vo_zam_comment`,
      
      `Kol_zam_teamA_comment`,
      `Bbs_teamA_comment`,
      `Rpm_zam_teamA_comment`,
      `Rpm_bbs_teamA_comment`,
      
      `Kol_zam_Sulf_comment`,
      `Bbs_Sulf_comment`,
      `Rpm_zam_Sulf_comment`,
      `Rpm_bbs_Sulf_comment`) 
      VALUES (NULL,
      '$dateTime',
      '$Incedents',
      '$NearMiss',
      '$Bbswa',
      '$Kol_vo_zam',
      
      '$Kol_zam_teamA',
      '$Bbs_teamA',
      '$Rpm_zam_teamA',
      '$Rpm_bbs_teamA',
      
      '$Kol_zam_Sulf',
      '$Bbs_Sulf',
      '$Rpm_zam_Sulf',
      '$Rpm_bbs_Sulf',
      
      '$Incedents_comment',
      '$NearMiss_comment',
      '$Bbswa_comment',
      '$Kol_vo_zam_comment',
      
      '$Kol_zam_teamA_comment',
      '$Bbs_teamA_comment',
      '$Rpm_zam_teamA_comment',
      '$Rpm_bbs_teamA_comment',
      
        '$Kol_zam_Sulf_comment',
      '$Bbs_Sulf_comment',
      '$Rpm_zam_Sulf_comment',
      '$Rpm_bbs_Sulf_comment')");
      mysqli_query($reserve, "INSERT INTO `Safety_KPI` 
      (`id`, 
      `date`,
      `Incedents`,
      `NearMiss`,
      `Bbswa`,
      `Kol_vo_zam`,
      
      `Kol_zam_teamA`,
        `Bbs_teamA`,
        `Rpm_zam_teamA`,
        `Rpm_bbs_teamA`,
        
      `Kol_zam_Sulf`,
      `Bbs_Sulf`,
      `Rpm_zam_Sulf`,
      `Rpm_bbs_Sulf`,
      
      `Incedents_comment`,
      `NearMiss_comment`,
      `Bbswa_comment`,
      `Kol_vo_zam_comment`,
      
      `Kol_zam_teamA_comment`,
      `Bbs_teamA_comment`,
      `Rpm_zam_teamA_comment`,
      `Rpm_bbs_teamA_comment`,
      
      `Kol_zam_Sulf_comment`,
      `Bbs_Sulf_comment`,
      `Rpm_zam_Sulf_comment`,
      `Rpm_bbs_Sulf_comment`) 
      VALUES (NULL,
      '$dateTime',
      '$Incedents',
      '$NearMiss',
      '$Bbswa',
      '$Kol_vo_zam',
      
      '$Kol_zam_teamA',
      '$Bbs_teamA',
      '$Rpm_zam_teamA',
      '$Rpm_bbs_teamA',
      
      '$Kol_zam_Sulf',
      '$Bbs_Sulf',
      '$Rpm_zam_Sulf',
      '$Rpm_bbs_Sulf',
      
      '$Incedents_comment',
      '$NearMiss_comment',
      '$Bbswa_comment',
      '$Kol_vo_zam_comment',
      
      '$Kol_zam_teamA_comment',
      '$Bbs_teamA_comment',
      '$Rpm_zam_teamA_comment',
      '$Rpm_bbs_teamA_comment',
      
        '$Kol_zam_Sulf_comment',
      '$Bbs_Sulf_comment',
      '$Rpm_zam_Sulf_comment',
      '$Rpm_bbs_Sulf_comment')");
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);

// Возвращаем данные в виде JSON-объекта с id
echo json_encode(array('id' => $id, 'dateTime' => $dateTime, 
'Incedents' => $Incedents, 
'NearMiss' => $NearMiss, 
'Bbswa' => $Bbswa, 
'Kol_vo_zam' => $Kol_vo_zam, 

'Kol_zam_teamA' => $Kol_zam_teamA, 

'Kol_zam_Sulf' => $Kol_zam_Sulf, 
'Bbs_teamA' => $Bbs_teamA, 


'Bbs_Sulf' => $Bbs_Sulf, 
'Rpm_zam_teamA' => $Rpm_zam_teamA, 


'Rpm_zam_Sulf' => $Rpm_zam_Sulf, 
'Rpm_bbs_teamA' => $Rpm_bbs_teamA, 

'Rpm_bbs_Sulf' => $Rpm_bbs_Sulf,

'Incedents_comment' => $Incedents_comment, 
'NearMiss_comment' => $NearMiss_comment, 
'Bbswa_comment' => $Bbswa_comment, 
'Kol_vo_zam_comment' => $Kol_vo_zam_comment, 

'Kol_zam_teamA_comment' => $Kol_zam_teamA_comment, 

'Kol_zam_Sulf_comment' => $Kol_zam_Sulf_comment, 
'Bbs_teamA_comment' => $Bbs_teamA_comment, 


'Bbs_Sulf_comment' => $Bbs_Sulf_comment, 
'Rpm_zam_teamA_comment' => $Rpm_zam_teamA_comment, 


'Rpm_zam_Sulf_comment' => $Rpm_zam_Sulf_comment, 
'Rpm_bbs_teamA_comment' => $Rpm_bbs_teamA_comment, 

'Rpm_bbs_Sulf_comment' => $Rpm_bbs_Sulf_comment));
?>