<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $user = htmlspecialchars($_POST['user']);
    $name_event = htmlspecialchars($_POST['name_event']);
    $text_event = htmlspecialchars($_POST['text_event']);
    $date_start_event = htmlspecialchars($_POST['date_start_event']);
    $date_end_event = htmlspecialchars($_POST['date_end_event']);
    $id = htmlspecialchars($_POST['id']);
    $status = htmlspecialchars($_POST['status']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE calendarfortechnical
  SET user = '$user', 
  status = '$status',
  name_event = '$name_event',
  text_event = '$text_event',
  date_start_event = '$date_start_event', 
  date_end_event = '$date_end_event'
  WHERE id = '$id'");
  // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id,
'user' => $user, 'status' => $status,
'wname_event1' => $name_event,
'text_event' => $text_event,
'date_start_event' => $date_start_event,
'date_end_event' => $date_end_event));
?>
