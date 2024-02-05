<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $max_percent = htmlspecialchars($_POST['max_percent']);
    $max_value_for_quality = htmlspecialchars($_POST['max_value_for_quality']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `settings_for_paids`
      (`id`, `max_percent`, `max_value_for_quality`) VALUES (NULL, '$max_percent', '$max_value_for_quality')");
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 'max_percent' => $max_percent, 'max_value_for_quality' => $max_value_for_quality));
?>
