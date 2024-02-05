<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $bunker = htmlspecialchars($_POST['bunker']);
    $bunker_user = htmlspecialchars($_POST['bunker_user']);

    $link->set_charset("utf8");

    mysqli_query($link, "INSERT INTO `bunker`
      (`id`,
      `date`,
      `team`,
      `name_operator`,
      `oee`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$bunker_user',
      '$bunker')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $bunker_user,
'oee' => $bunker));
?>
