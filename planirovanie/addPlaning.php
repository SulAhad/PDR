<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $avtomat = htmlspecialchars($_POST['avtomat']);
    $format = htmlspecialchars($_POST['format']);
    $oee = htmlspecialchars($_POST['oee']);
    $pcs_min = htmlspecialchars($_POST['pcs_min']);
    $pcs_h = htmlspecialchars($_POST['pcs_h']);
    $oh = htmlspecialchars($_POST['oh']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `planing`
      (`id`,
      `automat`,
      `format`,
      `oee`,
      `pcs_min`,
      `pcs_h`,
      `oh`)
      VALUES (NULL,
      '$avtomat',
      '$format',
      '$oee',
      '$pcs_min',
      '$pcs_h',
      '$oh')");

// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id,
'automat' => $avtomat,
'format' => $format,
'oee' => $oee,
'pcs_min' => $pcs_min,
'pcs_h' => $pcs_h,
'oh' => $oh));
?>
