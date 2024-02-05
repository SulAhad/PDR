<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $user = htmlspecialchars($_POST['user']);
    $name_event = htmlspecialchars($_POST['name_event']);
    $event_color = htmlspecialchars($_POST['event_color']);
    $date_start_event = htmlspecialchars($_POST['date_start_event']);
    $date_end_event = htmlspecialchars($_POST['date_end_event']);
    $time_start = htmlspecialchars($_POST['time_start']);
    $time_end = htmlspecialchars($_POST['time_end']);
    $date_time_event = htmlspecialchars($_POST['date_time_event']);
    $repeatDate = htmlspecialchars($_POST['repeatDate']);
    $id = htmlspecialchars($_POST['id']);
    $status = htmlspecialchars($_POST['status']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE calendarfortechnical
  SET user = '$user', 
  status = '$status',
  name_event = '$name_event',
  event_color = '$event_color',
  date_start_event = '$date_start_event', 
  date_end_event = '$date_end_event',
  time_start = '$time_start', 
  time_end = '$time_end',
  date_time_event = '$date_time_event',
  repeatDate = '$repeatDate'
  WHERE id = '$id'");
  // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id,
'user' => $user, 'status' => $status,
'wname_event1' => $name_event,
'event_color' => $event_color,
'date_start_event' => $date_start_event, 'date_time_event' => $date_time_event, 'repeatdDate' => $repeatdDate,
'date_end_event' => $date_end_event));
?>
