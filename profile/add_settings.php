<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $targetOEE = htmlspecialchars($_POST['targetOEE']);
    $emailResponce = htmlspecialchars($_POST['emailResponce']);
    $accessForDelete = htmlspecialchars($_POST['accessForDelete']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `Settings_KPI` 
      (`id`, 
      `targetOEE`,
      `emailResponce`,
      `accessForDelete`)
      VALUES (NULL,
      '$targetOEE', '$emailResponce', '$accessForDelete')");
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 
'targetOEE' => $targetOEE, 'emailResponce' => $emailResponce,  'accessForDelete' => $accessForDelete));
?>