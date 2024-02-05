<?php
require('connect_db.php');
$messageOEE = "SELECT emailResponce FROM Settings_KPI ORDER BY id DESC LIMIT 1";
$link->set_charset("utf8");
$resultOEE = mysqli_query($link, $messageOEE);
while ($row = mysqli_fetch_assoc($resultOEE)) 
{
    $emailResponce = $row['emailResponce'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $emailResponce;
  $message = $_POST['message'];

  $to = $address; // Замените на фактический адрес получателя
  $subject = $name;
  $body = $message;

  $headers = "From: $email";
    // Формирование тела письма с вложением



  // Отправка письма с вложением
  if (mail($to, $subject, $body, $headers)) {
    echo "Сообщение успешно отправлено руководителю!";
  } else {
    echo "Ошибка при отправке сообщения.";
  }
}
?>