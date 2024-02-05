<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yandex Calendar API Example</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Yandex Calendar Events</h1>
  <div id="events"></div>

<?php

// Замените YOUR_ACCESS_TOKEN на ваш OAuth-токен
$access_token = 'rcswfzscxocurmle';

// Запрос списка событий пользователя
$url = 'https://api.calendar.yandex.ru/v3/calendars/default/events';
$headers = array(
    'Authorization: OAuth ' . $access_token,
    'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Вывод списка событий
$events = json_decode($response, true)['items'];
foreach ($events as $event) {
    echo $event['summary'] . "\n";
}
?>
</body>
</html>
