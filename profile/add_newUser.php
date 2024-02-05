<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $main = '1';
    $top5problem = '1';
    $inspection = '1';
    // Генерация случайной соли
    $salt = bin2hex(random_bytes(16));
    $login = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars($_POST['pass']);
    // Добавление соли к паролю
    $hashed_password = hash('sha256', $pass . $salt);

    $surName = htmlspecialchars($_POST['surName']);
    $name = htmlspecialchars($_POST['name']);
    $position = htmlspecialchars($_POST['position']);


   
    $access = htmlspecialchars($_POST['access']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `Users_KPI` 
      (`id`, 
      `name`,
      `pass`,
      `salt`,
      `access`,
      `surName`,
      `nameUser`,
      `main`,
      `top5problem`,
      `inspection`,
      `position`)
      VALUES (NULL,
      '$login',
      '$hashed_password',
      '$salt',
      '$access',
      '$surName',
      '$name',
      '$main',
      '$top5problem',
      '$inspection',
      '$position')");
      
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 
'name' => $login, 
'pass' => $hashed_password, 
'access' => $access, 
'surName' => $surName, 
'nameUser' => $name, 
'position' => $position));
?>