<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $name_event = mysqli_real_escape_string($link, $_POST['name_event']);
    $event_color = mysqli_real_escape_string($link, $_POST['event_color']);
    $date_start_event = mysqli_real_escape_string($link, $_POST['date_start_event']);
    $date_end_event = mysqli_real_escape_string($link, $_POST['date_end_event']);
    $date_time_event = mysqli_real_escape_string($link, $_POST['date_time_event']);
    $time_start = mysqli_real_escape_string($link, $_POST['time_start']);
    $time_end = mysqli_real_escape_string($link, $_POST['time_end']);
    $user = mysqli_real_escape_string($link, $_POST['user']);
    $status = mysqli_real_escape_string($link, $_POST['status']);
    $repeatDate = mysqli_real_escape_string($link, $_POST['repeatDate']);
    $repeat_event = mysqli_real_escape_string($link, $_POST['repeat_event']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO calendarfortechnical (id, name_event, 
    event_color, date_start_event, date_end_event, time_start, time_end, date_time_event, user, status, 
    repeatDate, repeat_event) 
    VALUES (NULL, '$name_event', '$event_color', '$date_start_event', '$date_end_event', '$time_start', '$time_end', '$date_time_event', 
    '$user', '$status', '$repeatDate', '$repeat_event')");

// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id,
'name_event' => $name_event,
'event_color' => $event_color,
'date_start_event' => $date_start_event,
'date_end_event' => $date_end_event, 'date_time_event' => $date_time_event,
'user' => $user, 'status' => $status, 'repeatDate' => $repeatDate, 'repeat_event' => $repeat_event));
?>
