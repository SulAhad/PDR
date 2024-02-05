<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $id = htmlspecialchars($_POST['id']);
    $status = htmlspecialchars($_POST['status']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE calendarfortechnical
  SET status = '$status'
  WHERE id = '$id'");
  // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 'status' => $status));
?>
