<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $uva5 = htmlspecialchars($_POST['uva5']);
    $uva5_user = htmlspecialchars($_POST['uva5_user']);

    $link->set_charset("utf8");

    mysqli_query($link, "INSERT INTO `uva5`
      (`id`,
      `date`,
      `team`,
      `name_operator`,
      `oee`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$uva5_user',
      '$uva5')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $uva5_user,
'oee' => $uva5));
?>
