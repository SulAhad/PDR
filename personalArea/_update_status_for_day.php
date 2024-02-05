<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $color_value = mysqli_real_escape_string($link, $_POST['color_value']);
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE statusforuserscalendar SET $name = '$color_value'
    WHERE id = '$id'");

// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id,
'color_value' => $color_value));
?>
