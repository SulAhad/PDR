<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $BrakQuality = htmlspecialchars($_POST['BrakQuality']);
    $Kol_zam_him_sostav_teamA = htmlspecialchars($_POST['Kol_zam_him_sostav_teamA']);
    $Kol_zam_upakovka_teamA = htmlspecialchars($_POST['Kol_zam_upakovka_teamA']);
    $Kol_pretenziy_teamA = htmlspecialchars($_POST['Kol_pretenziy_teamA']);
    $Zabrakov_mat_teamA = htmlspecialchars($_POST['Zabrakov_mat_teamA']);
    $Kol_zam_him_sostav_teamB = htmlspecialchars($_POST['Kol_zam_him_sostav_teamB']);
    $Kol_zam_upakovka_teamB = htmlspecialchars($_POST['Kol_zam_upakovka_teamB']);
    $Kol_pretenziy_teamB = htmlspecialchars($_POST['Kol_pretenziy_teamB']);
    $Zabrakov_mat_teamB = htmlspecialchars($_POST['Zabrakov_mat_teamB']);
    $Kol_zam_him_sostav_Sulf = htmlspecialchars($_POST['Kol_zam_him_sostav_Sulf']);
    $Kol_zam_upakovka_Sulf = htmlspecialchars($_POST['Kol_zam_upakovka_Sulf']);
    $Kol_pretenziy_Sulf = htmlspecialchars($_POST['Kol_pretenziy_Sulf']);
    $Zabrakov_mat_Sulf = htmlspecialchars($_POST['Zabrakov_mat_Sulf']);
    $idQuality = htmlspecialchars($_POST['idQuality']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE Quality_KPI 
      SET date = '$dateTime', BrakQuality = '$BrakQuality',
      Kol_zam_him_sostav_teamA = '$Kol_zam_him_sostav_teamA',
      Kol_zam_upakovka_teamA = '$Kol_zam_upakovka_teamA',
      Kol_pretenziy_teamA = '$Kol_pretenziy_teamA',
      Kol_zam_him_sostav_teamB = '$Kol_zam_him_sostav_teamB',
      Kol_zam_upakovka_teamB = '$Kol_zam_upakovka_teamB',
      Kol_pretenziy_teamB = '$Kol_pretenziy_teamB',
      Zabrakov_mat_teamB = '$Zabrakov_mat_teamB',
      Kol_zam_him_sostav_Sulf = '$Kol_zam_him_sostav_Sulf',
      Kol_zam_upakovka_Sulf = '$Kol_zam_upakovka_Sulf',
      Kol_pretenziy_Sulf = '$Kol_pretenziy_Sulf',
      Zabrakov_mat_Sulf = '$Zabrakov_mat_Sulf'
      
      WHERE id = '$idQuality'");
?>
