<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $user = htmlspecialchars($_POST['user']);
    $ip = htmlspecialchars($_POST['ip']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `ip_adress_users`
      (`id`,
      `ip_adress`,
      `user_name`)
      VALUES (NULL,
      '$ip', '$user')");
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id,
'ip_adress' => $ip_adress, 'user' => $user));
?>
