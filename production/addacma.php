<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $acma = htmlspecialchars($_POST['acma']);
    $acma_user = htmlspecialchars($_POST['acma_user']);

    $link->set_charset("utf8");

    mysqli_query($link, "INSERT INTO `acma`
      (`id`,
      `date`,
      `team`,
      `name_operator`,
      `oee`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$acma_user',
      '$acma')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $acma_user,
'oee' => $acma));
?>
