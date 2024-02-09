<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $innotech3 = htmlspecialchars($_POST['innotech3']);
    $innotech3_user = htmlspecialchars($_POST['innotech3_user']);
    
    $message_all = "SELECT * FROM operator WHERE id = $innotech3_user";
    $link->set_charset("utf8");
    $result_all = mysqli_query($link, $message_all);
    while ($row_all = mysqli_fetch_assoc($result_all)) 
    {
        $name_operator = $row_all['name'];
    }
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/paids/target_percent.php');
    if($innotech3 >= $target_inn3_4_max)
    {
        $percent = $max_percent;
    }
    if($innotech3 < $target_inn3_4_max)
    {
        $percent = $medium_percent;
    }
    if($innotech3 < $target_inn3_4_min)
    {
        $percent = $min_percent;
    }
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `innotech3`
      (`id`,
      `date`,
      `team`,
      `name_operator`, `id_user`,
      `oee`, `percent`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$name_operator', '$innotech3_user',
      '$innotech3', '$percent')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $innotech3_user,
'oee' => $innotech3));
?>
