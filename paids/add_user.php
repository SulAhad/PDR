<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $user = htmlspecialchars($_POST['user']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `operator`
      (`id`, `name`) VALUES (NULL, '$user')");
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 'user' => $user));
?>
