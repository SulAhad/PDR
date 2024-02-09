<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $avtomat = htmlspecialchars($_POST['bunker']);
    $bunker_user = htmlspecialchars($_POST['bunker_user']);

    $message_all = "SELECT * FROM operator WHERE id = $bunker_user";
    $link->set_charset("utf8");
    $result_all = mysqli_query($link, $message_all);
    while ($row_all = mysqli_fetch_assoc($result_all)) 
    {
        $name_operator = $row_all['name'];
    }
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/paids/target_percent.php');
    if($avtomat >= $target_total_max)
    {
        $percent = $max_percent;
    }
    if($avtomat < $target_total_max)
    {
        $percent = $medium_percent;
    }
    if($avtomat < $target_total_min)
    {
        $percent = $min_percent;
    }
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `bunker`
      (`id`,
      `date`,
      `team`,
      `name_operator`, `id_user`,
      `oee`, `percent`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$name_operator', '$bunker_user',
      '$avtomat', '$percent')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $bunker_user,
'oee' => $avtomat));
?>
