<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$messageOEE = "SELECT emailResponce FROM Settings_KPI ORDER BY id DESC LIMIT 1";
$link->set_charset("utf8");
$resultOEE = mysqli_query($link, $messageOEE);
if (mysqli_num_rows($resultOEE) > 0) {
    $row = mysqli_fetch_assoc($resultOEE);
    $emailResponce = $row['emailResponce'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
  $address = $emailResponce;
  $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

  $to = $address; // Замените на фактический адрес получателя
  $subject = $name;
  $body = $message;

  $headers = "From: $email";
    
  // Отправка письма с вложением
  if (mail($to, $subject, $body, $headers)) {
    echo "Сообщение успешно отправлено руководителю!";
  } else {
    echo "Ошибка при отправке сообщения.";
  }
}
?>