<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $w1 = htmlspecialchars($_POST['w1']);
    $w2 = htmlspecialchars($_POST['w2']);
    $w3 = htmlspecialchars($_POST['w3']);
    $w4 = htmlspecialchars($_POST['w4']);
    $w5 = htmlspecialchars($_POST['w5']);
    $w6 = htmlspecialchars($_POST['w6']);
    $w7 = htmlspecialchars($_POST['w7']);
    $w8 = htmlspecialchars($_POST['w8']);
    $w9 = htmlspecialchars($_POST['w9']);
    $w10 = htmlspecialchars($_POST['w10']);
    $user = htmlspecialchars($_POST['user']);
    $date = htmlspecialchars($_POST['date']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `Active_water_KPI`
      (`id`,
      `date`,
      `w1`,
      `w2`,
      `w3`,
      `w4`,
      `w5`,
      `w6`,
      `w7`,
      `w8`,
      `w9`,
      `w10`,
      `user`)
      VALUES (NULL,
      '$date',
      '$w1',
      '$w2',
      '$w3',
      '$w4',
      '$w5',
      '$w6',
      '$w7',
      '$w8',
      '$w9',
      '$w10', '$user')");

// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id,
'date' => $date,
'w1' => $w1,
'w2' => $w2,
'w3' => $w3,
'w4' => $w4,
'w5' => $w5,
'w6' => $w6, 'w7' => $w7, 'w8' => $w8, 'w9' => $w9, 'w10' => $w10, 'user' => $user));
?>
