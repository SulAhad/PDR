<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/paids/target_percent.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $innotech1 = htmlspecialchars($_POST['innotech1']);
    $innotech1_user = htmlspecialchars($_POST['innotech1_user']);
    
    $message_all = "SELECT * FROM operator WHERE id = $innotech1_user";
    $link->set_charset("utf8");
    $result_all = mysqli_query($link, $message_all);
    while ($row_all = mysqli_fetch_assoc($result_all)) 
    {
        $name_operator = $row_all['name'];
    }

    if($innotech1 >= $target_inn1_2_max)
    {
        $percent = $max_percent;
    }
    if($innotech1 < $target_inn1_2_max)
    {
        $percent = $medium_percent;
    }
    if($innotech1 < $target_inn1_2_min)
    {
        $percent = $min_percent;
    }
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `innotech1`
      (`id`,
      `date`,
      `team`,
      `name_operator`, `id_user`,
      `oee`, `percent`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$name_operator', '$innotech1_user',
      '$innotech1', '$percent')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $name_operator, 'id_user' => $innotech1_user,
'oee' => $innotech1));
?>
