<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $dateSafety = htmlspecialchars($_POST['dateSafety']);
    $Incedents = htmlspecialchars($_POST['Incedents']);
    $NearMiss = htmlspecialchars($_POST['NearMiss']);
    
    $Bbswa = htmlspecialchars($_POST['Bbswa']);
    $Kol_vo_zam = htmlspecialchars($_POST['Kol_vo_zam']);
    
    $Kol_zam_teamA = htmlspecialchars($_POST['Kol_zam_teamA']);
    $Bbs_teamA = htmlspecialchars($_POST['Bbs_teamA']);
    $Rpm_zam_teamA = htmlspecialchars($_POST['Rpm_zam_teamA']);
    $Rpm_bbs_teamA = htmlspecialchars($_POST['Rpm_bbs_teamA']);
    
    $Kol_zam_teamB = htmlspecialchars($_POST['Kol_zam_teamB']);
    $Bbs_teamB = htmlspecialchars($_POST['Bbs_teamB']);
    $Rpm_zam_teamB = htmlspecialchars($_POST['Rpm_zam_teamB']);
    $Rpm_bbs_teamB = htmlspecialchars($_POST['Rpm_bbs_teamB']);
    
    $Kol_zam_Sulf = htmlspecialchars($_POST['Kol_zam_Sulf']);
    $Bbs_Sulf = htmlspecialchars($_POST['Bbs_Sulf']);
    $Rpm_zam_Sulf = htmlspecialchars($_POST['Rpm_zam_Sulf']);
    $Rpm_bbs_Sulf = htmlspecialchars($_POST['Rpm_bbs_Sulf']);
    
    $idSafety = htmlspecialchars($_POST['idSafety']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE Safety_KPI 
      SET date = '$dateSafety', Incedents = '$Incedents',
      NearMiss = '$NearMiss',
      Bbswa = '$Kol_vo_zam',
      
      Kol_zam_teamA = '$Kol_zam_teamA',
      Bbs_teamA = '$Bbs_teamA',
      Rpm_zam_teamA = '$Rpm_zam_teamA',
      Rpm_bbs_teamA = '$Rpm_bbs_teamA',
      
      Kol_zam_teamB = '$Kol_zam_teamB',
      Bbs_teamB = '$Bbs_teamB',
      Rpm_zam_teamB = '$Rpm_zam_teamB',
      Rpm_bbs_teamB = '$Rpm_bbs_teamB',
      
      Kol_zam_Sulf = '$Kol_zam_Sulf',
      Bbs_Sulf = '$Bbs_Sulf',
      Rpm_zam_Sulf = '$Rpm_zam_Sulf',
      Rpm_bbs_Sulf = '$Rpm_bbs_Sulf'
      WHERE id = '$idSafety'");
?>
