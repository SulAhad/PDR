<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    
    $Params_limits = htmlspecialchars($_POST['Params_limits']);
    $Compositsia = htmlspecialchars($_POST['Compositsia']);
    $Compaund = htmlspecialchars($_POST['Compaund']);
    $Postdobavki = htmlspecialchars($_POST['Postdobavki']);
    $Fasovka = htmlspecialchars($_POST['Fasovka']);
    $Slivnaya = htmlspecialchars($_POST['Slivnaya']);
    $Uch_sirya = htmlspecialchars($_POST['Uch_sirya']);
    
    $Udeln_potr_gaza_teamA = htmlspecialchars($_POST['Udeln_potr_gaza_teamA']);
    $Udeln_potr_gaza_gotoviy_prod_teamA = htmlspecialchars($_POST['Udeln_potr_gaza_gotoviy_prod_teamA']);
    
    $Udeln_potr_gaza_teamB = htmlspecialchars($_POST['Udeln_potr_gaza_teamB']);
    $Udeln_potr_gaza_gotoviy_prod_teamB = htmlspecialchars($_POST['Udeln_potr_gaza_gotoviy_prod_teamB']);
    
    $Udeln_potr_gaza_total = htmlspecialchars($_POST['Udeln_potr_gaza_total']);
    $Udeln_potr_gaza_gotoviy_prod_total = htmlspecialchars($_POST['Udeln_potr_gaza_gotoviy_prod_total']);
    
    $Params_limits_comment = htmlspecialchars($_POST['Params_limits_comment']);
    $Compositsia_comment = htmlspecialchars($_POST['Compositsia_comment']);
    $Compaund_comment = htmlspecialchars($_POST['Compaund_comment']);
    $Postdobavki_comment = htmlspecialchars($_POST['Postdobavki_comment']);
    $Fasovka_comment = htmlspecialchars($_POST['Fasovka_comment']);
    $Slivnaya_comment = htmlspecialchars($_POST['Slivnaya_comment']);
    $Uch_sirya_comment = htmlspecialchars($_POST['Uch_sirya_comment']);
    
    $Udeln_potr_gaza_teamA_comment = htmlspecialchars($_POST['Udeln_potr_gaza_teamA_comment']);
    $Udeln_potr_gaza_gotoviy_prod_teamA_comment = htmlspecialchars($_POST['Udeln_potr_gaza_gotoviy_prod_teamA_comment']);
    
    $Udeln_potr_gaza_teamB_comment = htmlspecialchars($_POST['Udeln_potr_gaza_teamB_comment']);
    $Udeln_potr_gaza_gotoviy_prod_teamB_comment = htmlspecialchars($_POST['Udeln_potr_gaza_gotoviy_prod_teamB_comment']);
    
    $Udeln_potr_gaza_total_comment = htmlspecialchars($_POST['Udeln_potr_gaza_total_comment']);
    $Udeln_potr_gaza_gotoviy_prod_total_comment = htmlspecialchars($_POST['Udeln_potr_gaza_gotoviy_prod_total_comment']);

    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `technology_kpi` 
      (`id`, 
      `date`,
      
      `Params_limits`,
      `Compositsia`,
      `Compaund`,
      `Postdobavki`,
      `Fasovka`,
      `Slivnaya`,
      `Uch_sirya`,
      
      `Udeln_potr_gaza_teamA`,
      `Udeln_potr_gaza_gotoviy_prod_teamA`,
      
      `Udeln_potr_gaza_teamB`,
      `Udeln_potr_gaza_gotoviy_prod_teamB`,
      
      `Udeln_potr_gaza_total`,
      `Udeln_potr_gaza_gotoviy_prod_total`,
      
      `Params_limits_comment`,
      `Compositsia_comment`,
      `Compaund_comment`,
      `Postdobavki_comment`,
      `Fasovka_comment`,
      `Slivnaya_comment`,
      `Uch_sirya_comment`,
      
      `Udeln_potr_gaza_teamA_comment`,
      `Udeln_potr_gaza_gotoviy_prod_teamA_comment`,
      
      `Udeln_potr_gaza_teamB_comment`,
      `Udeln_potr_gaza_gotoviy_prod_teamB_comment`,
      
      `Udeln_potr_gaza_total_comment`,
      `Udeln_potr_gaza_gotoviy_prod_total_comment`)
      VALUES (NULL,
      '$dateTime',
      
      '$Params_limits',
      '$Compositsia',
      '$Compaund',
      '$Postdobavki',
      '$Fasovka',
      '$Slivnaya',
      '$Uch_sirya',
      
      '$Udeln_potr_gaza_teamA',
      '$Udeln_potr_gaza_gotoviy_prod_teamA',
      
      '$Udeln_potr_gaza_teamB',
      '$Udeln_potr_gaza_gotoviy_prod_teamB',
      
      '$Udeln_potr_gaza_total',
      '$Udeln_potr_gaza_gotoviy_prod_total',
      
      '$Params_limits_comment',
      '$Compositsia_comment',
      '$Compaund_comment',
      '$Postdobavki_comment',
      '$Fasovka_comment',
      '$Slivnaya_comment',
      '$Uch_sirya_comment',
      
      '$Udeln_potr_gaza_teamA_comment',
      '$Udeln_potr_gaza_gotoviy_prod_teamA_comment',
      
      '$Udeln_potr_gaza_teamB_comment',
      '$Udeln_potr_gaza_gotoviy_prod_teamB_comment',
      
      '$Udeln_potr_gaza_total_comment',
      '$Udeln_potr_gaza_gotoviy_prod_total_comment')");
      
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 'date' => $dateTime, 

'Params_limits' => $Params_limits, 
'Compositsia' => $Compositsia, 
'Compaund' => $Compaund, 
'Postdobavki' => $Postdobavki, 
'Fasovka' => $Fasovka, 
'Slivnaya' => $Slivnaya, 
'Uch_sirya' => $Uch_sirya, 

'Udeln_potr_gaza_teamA' => $Udeln_potr_gaza_teamA, 
'Udeln_potr_gaza_gotoviy_prod_teamA' => $Udeln_potr_gaza_gotoviy_prod_teamA, 

'Udeln_potr_gaza_teamB' => $Udeln_potr_gaza_teamB, 
'Udeln_potr_gaza_gotoviy_prod_teamB' => $Udeln_potr_gaza_gotoviy_prod_teamB, 

'Udeln_potr_gaza_total' => $Udeln_potr_gaza_total, 
'Udeln_potr_gaza_gotoviy_prod_total' => $Udeln_potr_gaza_gotoviy_prod_total,

'Params_limits_comment' => $Params_limits_comment, 
'Compositsia_comment' => $Compositsia_comment, 
'Compaund_comment' => $Compaund_comment, 
'Postdobavki_comment' => $Postdobavki_comment, 
'Fasovka_comment' => $Fasovka_comment, 
'Slivnaya_comment' => $Slivnaya_comment, 
'Uch_sirya_comment' => $Uch_sirya_comment, 

'Udeln_potr_gaza_teamA_comment' => $Udeln_potr_gaza_teamA_comment, 
'Udeln_potr_gaza_gotoviy_prod_teamA_comment' => $Udeln_potr_gaza_gotoviy_prod_teamA_comment, 

'Udeln_potr_gaza_teamB_comment' => $Udeln_potr_gaza_teamB_comment, 
'Udeln_potr_gaza_gotoviy_prod_teamB_comment' => $Udeln_potr_gaza_gotoviy_prod_teamB_comment, 

'Udeln_potr_gaza_total_comment' => $Udeln_potr_gaza_total_comment, 
'Udeln_potr_gaza_gotoviy_prod_total_comment' => $Udeln_potr_gaza_gotoviy_prod_total_comment));
?>