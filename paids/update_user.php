<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $user = htmlspecialchars($_POST['user']);
    $id = htmlspecialchars($_POST['id']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE operator SET name = '$user' WHERE id = '$id'");
    // Получаем id последней обновленной строки
    $updated_id = mysqli_insert_id($link);
    // Возвращаем данные в виде JSON-объекта
    echo json_encode(array('id' => $updated_id, 'name' => $user));
?>
