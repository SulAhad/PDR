<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');

    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $innotech1 = htmlspecialchars($_POST['innotech1']);
    $innotech1_user = htmlspecialchars($_POST['innotech1_user']);

    $link->set_charset("utf8");

    mysqli_query($link, "INSERT INTO `innotech1`
      (`id`,
      `date`,
      `team`,
      `name_operator`,
      `oee`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$innotech1_user',
      '$innotech1')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $innotech1_user,
'oee' => $innotech1));
?>
