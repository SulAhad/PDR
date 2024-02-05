<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $dateTechnology = htmlspecialchars($_POST['dateTechnology']);
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
    
    $proizvidit_bashni = htmlspecialchars($_POST['proizvidit_bashni']);
    
    $idTechnology = htmlspecialchars($_POST['idTechnology']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE Technology_KPI 
      SET date = '$dateTechnology', 
      Params_limits = '$Params_limits',
      Compositsia = '$Compositsia',
      Compaund = '$Compaund',
      Postdobavki = '$Postdobavki',
      Fasovka = '$Fasovka',
      Slivnaya = '$Slivnaya',
      Uch_sirya = '$Uch_sirya',
      
      Udeln_potr_gaza_teamA = '$Udeln_potr_gaza_teamA',
      Udeln_potr_gaza_gotoviy_prod_teamA = '$Udeln_potr_gaza_gotoviy_prod_teamA',
      
      Udeln_potr_gaza_teamB = '$Udeln_potr_gaza_teamB',
      Udeln_potr_gaza_gotoviy_prod_teamB = '$Udeln_potr_gaza_gotoviy_prod_teamB',
      
      Udeln_potr_gaza_total = '$Udeln_potr_gaza_total',
      Udeln_potr_gaza_gotoviy_prod_total = '$Udeln_potr_gaza_gotoviy_prod_total',
      
      proizvidit_bashni = '$proizvidit_bashni'
      WHERE id = '$idTechnology'");
?>
