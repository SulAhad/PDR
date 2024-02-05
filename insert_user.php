<?php
    require('../Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $login = $_SESSION['login'];
    $url = htmlspecialchars($_POST['url']);
    $reserve->set_charset("utf8");

      mysqli_query($reserve, "INSERT INTO `users_visit` 
      (`id`, `name`, `timeEnter`, `pagesVisit`)
      VALUES (NULL, '$login', '$date', '$url')");
      
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 'login' => $login, 'url' => $url));
?>