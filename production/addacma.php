<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/paids/target_percent.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $acma = htmlspecialchars($_POST['acma']);
    $acma_user = htmlspecialchars($_POST['acma_user']);

    $message_all = "SELECT * FROM operator WHERE id = $acma_user";
    $link->set_charset("utf8");
    $result_all = mysqli_query($link, $message_all);
    while ($row_all = mysqli_fetch_assoc($result_all)) 
    {
        $name_operator = $row_all['name'];
    }
    if($acma >= $target_acma_max)
    {
        $percent = $max_percent;
    }
    if($acma < $target_acma_max)
    {
        $percent = $medium_percent;
    }
    if($acma < $target_acma_min)
    {
        $percent = $min_percent;
    }
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `acma`
      (`id`,
      `date`,
      `team`,
      `name_operator`, `id_user`,
      `oee`, `percent`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$name_operator', '$acma_user',
      '$acma', '$percent')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'name_operator' => $acma_user,
'oee' => $acma));
?>
