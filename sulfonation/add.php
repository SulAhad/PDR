<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $team = htmlspecialchars($_POST['team']);
    $user = htmlspecialchars($_POST['user']);
    $plan = htmlspecialchars($_POST['plan']);
    $fact = htmlspecialchars($_POST['fact']);
    $plan_output_cars = htmlspecialchars($_POST['plan_output_cars']);
    $fact_output_cars = htmlspecialchars($_POST['fact_output_cars']);
    $comment = htmlspecialchars($_POST['comment']);
    $link->set_charset("utf8");

    mysqli_query($link, "INSERT INTO `sulfirovanie`
      (`id`,
      `date`,
      `team`,
      `plan_output_cars`, `fact_output_cars`,
      `plan`, `fact`,
      `comment`, `user`)
      VALUES (NULL,
      '$dateTime',
      '$team',
      '$plan_output_cars', '$fact_output_cars',
      '$plan', '$fact',
      '$comment', '$user')");
      // Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id,
'datetime' => $datetime,
'team' => $team,
'plan_output_cars' => $plan_output_cars, 'fact_output_cars' => $fact_output_cars,
'plan' => $plan, 'fact' => $fact,
'comment' => $comment, 'user' => $user));
?>
