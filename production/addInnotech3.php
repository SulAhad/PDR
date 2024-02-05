<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $innotech3 = htmlspecialchars($_POST['innotech3']);
    $innotech3_user = htmlspecialchars($_POST['innotech3_user']);

    $link->set_charset("utf8");

    mysqli_query($link, "INSERT INTO `innotech3`
      (`id`,
      `date`,
      `team`,
      `name_operator`,
      `oee`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$innotech3_user',
      '$innotech3')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $innotech3_user,
'oee' => $innotech3));
?>
