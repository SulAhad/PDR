<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);

    $BrakQuality = htmlspecialchars($_POST['BrakQuality']);
    $Kol_zam_him_sostav_teamA = htmlspecialchars($_POST['Kol_zam_him_sostav_teamA']);
    $Kol_zam_upakovka_teamA = htmlspecialchars($_POST['Kol_zam_upakovka_teamA']);
    $Kol_pretenziy_teamA = htmlspecialchars($_POST['Kol_pretenziy_teamA']);
    $Zabrakov_mat_teamA = htmlspecialchars($_POST['Zabrakov_mat_teamA']);
    
    $Kol_zam_him_sostav_Sulf = htmlspecialchars($_POST['Kol_zam_him_sostav_Sulf']);
    $Kol_zam_upakovka_Sulf = htmlspecialchars($_POST['Kol_zam_upakovka_Sulf']);
    $Kol_pretenziy_Sulf = htmlspecialchars($_POST['Kol_pretenziy_Sulf']);
    $Zabrakov_mat_Sulf = htmlspecialchars($_POST['Zabrakov_mat_Sulf']);
    
    $BrakQuality_comment = htmlspecialchars($_POST['BrakQuality_comment']);
    
    $Kol_zam_him_sostav_teamA_comment = htmlspecialchars($_POST['Kol_zam_him_sostav_teamA_comment']);
    $Kol_zam_upakovka_teamA_comment = htmlspecialchars($_POST['Kol_zam_upakovka_teamA_comment']);
    $Kol_pretenziy_teamA_comment = htmlspecialchars($_POST['Kol_pretenziy_teamA_comment']);
    $Zabrakov_mat_teamA_comment = htmlspecialchars($_POST['Zabrakov_mat_teamA_comment']);
    
    $Kol_zam_him_sostav_Sulf_comment = htmlspecialchars($_POST['Kol_zam_him_sostav_Sulf_comment']);
    $Kol_zam_upakovka_Sulf_comment = htmlspecialchars($_POST['Kol_zam_upakovka_Sulf_comment']);
    $Kol_pretenziy_Sulf_comment = htmlspecialchars($_POST['Kol_pretenziy_Sulf_comment']);
    $Zabrakov_mat_Sulf_comment = htmlspecialchars($_POST['Zabrakov_mat_Sulf_comment']);
    
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `Quality_KPI` 
      (`id`, 
      `date`,

      `BrakQuality`,
      `Kol_zam_him_sostav_teamA`,
      `Kol_zam_upakovka_teamA`,
      `Kol_pretenziy_teamA`,
      `Zabrakov_mat_teamA`,
      
      `Kol_zam_him_sostav_Sulf`,
      `Kol_zam_upakovka_Sulf`,
      `Kol_pretenziy_Sulf`,
      `Zabrakov_mat_Sulf`,
      
      `BrakQuality_comment`,
      
      `Kol_zam_him_sostav_teamA_comment`,
      `Kol_zam_upakovka_teamA_comment`,
      `Kol_pretenziy_teamA_comment`,
      `Zabrakov_mat_teamA_comment`,
      
      `Kol_zam_him_sostav_Sulf_comment`,
      `Kol_zam_upakovka_Sulf_comment`,
      `Kol_pretenziy_Sulf_comment`,
      `Zabrakov_mat_Sulf_comment`)
      VALUES (NULL,
      '$dateTime',

      '$BrakQuality',
      '$Kol_zam_him_sostav_teamA',
      '$Kol_zam_upakovka_teamA',
      '$Kol_pretenziy_teamA',
      '$Zabrakov_mat_teamA',
      
      '$Kol_zam_him_sostav_Sulf',
      '$Kol_zam_upakovka_Sulf',
      '$Kol_pretenziy_Sulf',
      '$Zabrakov_mat_Sulf',
      
      '$BrakQuality_comment',
      
      '$Kol_zam_him_sostav_teamA_comment',
      '$Kol_zam_upakovka_teamA_comment',
      '$Kol_pretenziy_teamA_comment',
      '$Zabrakov_mat_teamA_comment',
  
      '$Kol_zam_him_sostav_Sulf_comment',
      '$Kol_zam_upakovka_Sulf_comment',
      '$Kol_pretenziy_Sulf_comment',
      '$Zabrakov_mat_Sulf_comment')");
      
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 'date' => $dateTime, 

'BrakQuality' => $BrakQuality, 

'Kol_zam_him_sostav_teamA' => $Kol_zam_him_sostav_teamA, 
'Kol_zam_upakovka_teamA' => $Kol_zam_upakovka_teamA, 
'Kol_pretenziy_teamA' => $Kol_pretenziy_teamA, 
'Zabrakov_mat_teamA' => $Zabrakov_mat_teamA, 

'Kol_zam_him_sostav_Sulf' => $Kol_zam_him_sostav_Sulf, 
'Kol_zam_upakovka_Sulf' => $Kol_zam_upakovka_Sulf, 
'Kol_pretenziy_Sulf' => $Kol_pretenziy_Sulf, 
'Zabrakov_mat_Sulf' => $Zabrakov_mat_Sulf,

'BrakQuality_comment' => $BrakQuality, 

'Kol_zam_him_sostav_teamA_comment' => $Kol_zam_him_sostav_teamA_comment, 
'Kol_zam_upakovka_teamA_comment' => $Kol_zam_upakovka_teamA_comment, 
'Kol_pretenziy_teamA_comment' => $Kol_pretenziy_teamA_comment, 
'Zabrakov_mat_teamA_comment' => $Zabrakov_mat_teamA_comment, 

'Kol_zam_him_sostav_Sulf_comment' => $Kol_zam_him_sostav_Sulf_comment, 
'Kol_zam_upakovka_Sulf_comment' => $Kol_zam_upakovka_Sulf_comment, 
'Kol_pretenziy_Sulf_comment' => $Kol_pretenziy_Sulf_comment, 
'Zabrakov_mat_Sulf_comment' => $Zabrakov_mat_Sulf_comment));
?>