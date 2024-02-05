<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $avtomat = htmlspecialchars($_POST['avtomat']);
    $format = htmlspecialchars($_POST['format']);
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $con = htmlspecialchars($_POST['con']);
    $pcs_min = htmlspecialchars($_POST['pcs_min']);
    $pcs_h = htmlspecialchars($_POST['pcs_h']);
    $name = htmlspecialchars($_POST['name']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `plansms`
      (`id`,
      `avtomat`,
      `format`,
      `date_start`,
      `con`,
      `pcs_min`,
      `date_end`,
      `name`)
      VALUES (NULL,
      '$avtomat',
      '$format',
      '$dateTime',
      '$con',
      '$pcs_min',
      '$pcs_h',
      '$name')");

// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id,
'automat' => $avtomat,
'format' => $format,
'date_start' => $dateTime,
'con' => $con,
'pcs_min' => $pcs_min, 'name' => $name,
'pcs_h' => $pcs_h));
?>
