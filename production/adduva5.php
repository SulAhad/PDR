<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $uva5 = htmlspecialchars($_POST['uva5']);
    $uva5_user = htmlspecialchars($_POST['uva5_user']);

    $message_all = "SELECT * FROM operator WHERE id = $uva5_user";
    $link->set_charset("utf8");
    $result_all = mysqli_query($link, $message_all);
    while ($row_all = mysqli_fetch_assoc($result_all)) 
    {
        $name_operator = $row_all['name'];
    }
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/paids/target_percent.php');
    if($uva5 >= $target_uva5_max)
    {
        $percent = $max_percent;
    }
    if($uva5 < $target_uva5_max)
    {
        $percent = $medium_percent;
    }
    if($uva5 < $target_uva5_min)
    {
        $percent = $min_percent;
    }
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `uva5`
      (`id`,
      `date`,
      `team`,
      `name_operator`, `id_user`,
      `oee`, `percent`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$name_operator', '$uva5_user',
      '$uva5', '$percent')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $uva5_user,
'oee' => $uva5));
?>
