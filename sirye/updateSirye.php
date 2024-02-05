<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $dateSirye = htmlspecialchars($_POST['dateSirye']);
    $brak_sms_bilo = htmlspecialchars($_POST['brak_sms_bilo']);
    $brak_sms_prihod = htmlspecialchars($_POST['brak_sms_prihod']);
    $brak_sms_rashod = htmlspecialchars($_POST['brak_sms_rashod']);
    $brak_sms_ostatok = htmlspecialchars($_POST['brak_sms_ostatok']);
    $brak_sulf_bilo = htmlspecialchars($_POST['brak_sulf_bilo']);
    $brak_sulf_prihod = htmlspecialchars($_POST['brak_sulf_prihod']);
    $brak_sulf_rashod = htmlspecialchars($_POST['brak_sulf_rashod']);
    $brak_sulf_ostatok = htmlspecialchars($_POST['brak_sulf_ostatok']);
    $brak_sulf_rastvor_bilo = htmlspecialchars($_POST['brak_sulf_rastvor_bilo']);
    $brak_sulf_rastvor_prihod = htmlspecialchars($_POST['brak_sulf_rastvor_prihod']);
    $brak_sulf_rastvor_rashod = htmlspecialchars($_POST['brak_sulf_rastvor_rashod']);
    $brak_sulf_rastvor_ostatok = htmlspecialchars($_POST['brak_sulf_rastvor_ostatok']);
    $isolator_bilo = htmlspecialchars($_POST['isolator_bilo']);
    $isolator_prihod = htmlspecialchars($_POST['isolator_prihod']);
    $isolator_rashod = htmlspecialchars($_POST['isolator_rashod']);
    $isolator_ostatok = htmlspecialchars($_POST['isolator_ostatok']);
    $pil_bilo = htmlspecialchars($_POST['pil_bilo']);
    $pil_prihod = htmlspecialchars($_POST['pil_prihod']);
    $pil_rashod = htmlspecialchars($_POST['pil_rashod']);
    $pil_ostatok = htmlspecialchars($_POST['pil_ostatok']);
    $otsev_bilo = htmlspecialchars($_POST['otsev_bilo']);
    $otsev_prihod = htmlspecialchars($_POST['otsev_prihod']);
    $otsev_rashod = htmlspecialchars($_POST['otsev_rashod']);
    $otsev_ostatok = htmlspecialchars($_POST['otsev_ostatok']);
    $idSirye = htmlspecialchars($_POST['idSirye']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE Sirye_KPI 
      SET date = '$dateSirye', 
      brak_sms_bilo = '$brak_sms_bilo',
      brak_sms_prihod = '$brak_sms_prihod',
      brak_sms_rashod = '$brak_sms_rashod',
      brak_sms_ostatok = '$brak_sms_ostatok',
      brak_sulf_bilo = '$brak_sulf_bilo',
      brak_sulf_prihod = '$brak_sulf_prihod',
      brak_sulf_rashod = '$brak_sulf_rashod',
      brak_sulf_ostatok = '$brak_sulf_ostatok',
      brak_sulf_rastvor_bilo = '$brak_sulf_rastvor_bilo',
      brak_sulf_rastvor_prihod = '$brak_sulf_rastvor_prihod',
      brak_sulf_rastvor_rashod = '$brak_sulf_rastvor_rashod',
      brak_sulf_rastvor_ostatok = '$brak_sulf_rastvor_ostatok',
      isolator_bilo = '$isolator_bilo',
      isolator_prihod = '$isolator_prihod',
      isolator_rashod = '$isolator_rashod',
      isolator_ostatok = '$isolator_ostatok',
      pil_bilo = '$pil_bilo',
      pil_prihod = '$pil_prihod',
      pil_rashod = '$pil_rashod',
      pil_ostatok = '$pil_ostatok',
      otsev_bilo = '$otsev_bilo',
      otsev_prihod = '$otsev_prihod',
      otsev_rashod = '$otsev_rashod',
      otsev_ostatok = '$otsev_ostatok'
      WHERE id = '$idSirye'");
?>
