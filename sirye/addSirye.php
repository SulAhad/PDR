<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $user = mysqli_real_escape_string($link, $_POST['user']);
    $brak_sms_bilo = empty($_POST['brak_sms_bilo']) ? 0 : htmlspecialchars($_POST['brak_sms_bilo']);
    $brak_sms_prihod = empty($_POST['brak_sms_prihod']) ? 0 : htmlspecialchars($_POST['brak_sms_prihod']);
    $brak_sms_rashod = empty($_POST['brak_sms_rashod']) ? 0 : htmlspecialchars($_POST['brak_sms_rashod']);
    $brak_sms_ostatok = empty($_POST['brak_sms_ostatok']) ? 0 : htmlspecialchars($_POST['brak_sms_ostatok']);

    $brak_sulf_bilo = empty($_POST['brak_sulf_bilo']) ? 0 : htmlspecialchars($_POST['brak_sulf_bilo']);
    $brak_sulf_prihod = empty($_POST['brak_sulf_prihod']) ? 0 : htmlspecialchars($_POST['brak_sulf_prihod']);
    $brak_sulf_rashod = empty($_POST['brak_sulf_rashod']) ? 0 : htmlspecialchars($_POST['brak_sulf_rashod']);
    $brak_sulf_ostatok = empty($_POST['brak_sulf_ostatok']) ? 0 : htmlspecialchars($_POST['brak_sulf_ostatok']);

    $brak_sulf_rastvor_bilo = empty($_POST['brak_sulf_rastvor_bilo']) ? 0 : htmlspecialchars($_POST['brak_sulf_rastvor_bilo']);
    $brak_sulf_rastvor_prihod = empty($_POST['brak_sulf_rastvor_prihod']) ? 0 : htmlspecialchars($_POST['brak_sulf_rastvor_prihod']);
    $brak_sulf_rastvor_rashod = empty($_POST['brak_sulf_rastvor_rashod']) ? 0 : htmlspecialchars($_POST['brak_sulf_rastvor_rashod']);
    $brak_sulf_rastvor_ostatok = empty($_POST['brak_sulf_rastvor_ostatok']) ? 0 : htmlspecialchars($_POST['brak_sulf_rastvor_ostatok']);

    $isolator_bilo = empty($_POST['isolator_bilo']) ? 0 : htmlspecialchars($_POST['isolator_bilo']);
    $isolator_prihod = empty($_POST['isolator_prihod']) ? 0 : htmlspecialchars($_POST['isolator_prihod']);
    $isolator_rashod = empty($_POST['isolator_rashod']) ? 0 : htmlspecialchars($_POST['isolator_rashod']);
    $isolator_ostatok = empty($_POST['isolator_ostatok']) ? 0 : htmlspecialchars($_POST['isolator_ostatok']);

    $pil_bilo = empty($_POST['pil_bilo']) ? 0 : htmlspecialchars($_POST['pil_bilo']);
    $pil_prihod = empty($_POST['pil_prihod']) ? 0 : htmlspecialchars($_POST['pil_prihod']);
    $pil_rashod = empty($_POST['pil_rashod']) ? 0 : htmlspecialchars($_POST['pil_rashod']);
    $pil_ostatok = empty($_POST['pil_ostatok']) ? 0 : htmlspecialchars($_POST['pil_ostatok']);

    $otsev_bilo = empty($_POST['otsev_bilo']) ? 0 : htmlspecialchars($_POST['otsev_bilo']);
    $otsev_prihod = empty($_POST['otsev_prihod']) ? 0 : htmlspecialchars($_POST['otsev_prihod']);
    $otsev_rashod = empty($_POST['otsev_rashod']) ? 0 : htmlspecialchars($_POST['otsev_rashod']);
    $otsev_ostatok = empty($_POST['otsev_ostatok']) ? 0 : htmlspecialchars($_POST['otsev_ostatok']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `sirye_kpi`
      (`id`, 
      `date`,
      `brak_sms_bilo`,
      `brak_sms_prihod`,
      `brak_sms_rashod`,
      `brak_sms_ostatok`,
      
      `brak_sulf_bilo`,
      `brak_sulf_prihod`,
      `brak_sulf_rashod`,
      `brak_sulf_ostatok`,
      
      `brak_sulf_rastvor_bilo`,
      `brak_sulf_rastvor_prihod`,
      `brak_sulf_rastvor_rashod`,
      `brak_sulf_rastvor_ostatok`,
      
      `isolator_bilo`,
      `isolator_prihod`,
      `isolator_rashod`,
      `isolator_ostatok`,
      
      `pil_bilo`,
      `pil_prihod`,
      `pil_rashod`,
      `pil_ostatok`,
      
      `otsev_bilo`,
      `otsev_prihod`,
      `otsev_rashod`,
      `otsev_ostatok`,
      `user`) 
      VALUES (NULL,
      '$dateTime',
      '$brak_sms_bilo',
      '$brak_sms_prihod',
      '$brak_sms_rashod',
      '$brak_sms_ostatok',
      
      '$brak_sulf_bilo',
      '$brak_sulf_prihod',
      '$brak_sulf_rashod',
      '$brak_sulf_ostatok',
      
      '$brak_sulf_rastvor_bilo',
      '$brak_sulf_rastvor_prihod',
      '$brak_sulf_rastvor_rashod',
      '$brak_sulf_rastvor_ostatok',
      
      '$isolator_bilo',
      '$isolator_prihod',
      '$isolator_rashod',
      '$isolator_ostatok',
      
      '$pil_bilo',
      '$pil_prihod',
      '$pil_rashod',
      '$pil_ostatok',
      
      '$otsev_bilo',
      '$otsev_prihod',
      '$otsev_rashod',
      '$otsev_ostatok', '$user')");
      
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);

// Возвращаем данные в виде JSON-объекта с id
echo json_encode(array('id' => $id, 'date' => $dateTime, 'brak_sms_bilo' => $brak_sms_bilo, 
'brak_sms_prihod' => $brak_sms_prihod, 
'brak_sms_prihod' => $brak_sms_rashod, 
'brak_sms_ostatok' => $brak_sms_ostatok, 

'brak_sulf_bilo' => $brak_sulf_bilo, 
'brak_sulf_prihod' => $brak_sulf_prihod, 
'brak_sulf_rashod' => $brak_sulf_rashod, 
'brak_sulf_ostatok' => $brak_sulf_ostatok, 

'brak_sulf_rastvor_bilo' => $brak_sulf_rastvor_bilo, 
'brak_sulf_rastvor_prihod' => $brak_sulf_rastvor_prihod, 
'brak_sulf_rastvor_rashod' => $brak_sulf_rastvor_rashod, 
'brak_sulf_rastvor_ostatok' => $brak_sulf_rastvor_ostatok, 

'isolator_bilo' => $isolator_bilo, 
'isolator_prihod' => $isolator_prihod, 
'isolator_rashod' => $isolator_rashod, 
'isolator_ostatok' => $isolator_ostatok, 

'pil_bilo' => $pil_bilo, 
'pil_prihod' => $pil_prihod, 
'pil_rashod' => $pil_rashod, 
'pil_ostatok' => $pil_ostatok, 

'otsev_bilo' => $otsev_bilo, 
'otsev_prihod' => $otsev_prihod, 
'otsev_rashod' => $otsev_rashod, 'otsev_ostatok' => $otsev_ostatok));
?>