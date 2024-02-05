<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $gazgen = htmlspecialchars($_POST['gazgen']);
    $gazgen_user = htmlspecialchars($_POST['gazgen_user']);

    $link->set_charset("utf8");

    mysqli_query($link, "INSERT INTO `gazgen`
      (`id`,
      `date`,
      `team`,
      `name_operator`,
      `oee`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$gazgen_user',
      '$gazgen')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $gazgen_user,
'oee' => $gazgen));
?>
