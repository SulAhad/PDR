<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $innotech2 = htmlspecialchars($_POST['innotech2']);
    $innotech2_user = htmlspecialchars($_POST['innotech2_user']);

    $link->set_charset("utf8");

    mysqli_query($link, "INSERT INTO `innotech2`
      (`id`,
      `date`,
      `team`,
      `name_operator`,
      `oee`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$innotech2_user',
      '$innotech2')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $innotech2_user,
'oee' => $innotech2));
?>
