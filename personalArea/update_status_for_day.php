<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = mysqli_real_escape_string($link, $_POST['date']);
    $green = mysqli_real_escape_string($link, $_POST['green']);
    $user = mysqli_real_escape_string($link, $_POST['user']);
   
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO statusforuserscalendar (id, date, 
    green, user) 
    VALUES (NULL, '$date', '$green', '$user')");

// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id,
'date' => $date,
'green' => $green,
'user' => $user));
?>
