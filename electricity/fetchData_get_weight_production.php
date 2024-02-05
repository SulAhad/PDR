<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(empty($_SESSION['login'])) { // Check if the login session is empty
  header('Location: /Engels/bridge.php');
  exit; // Stop further execution
}

$date = $_GET['date'];
$today = date('Y-m-d');

$link->set_charset("utf8");

$message = "SELECT DATE(datetime) AS day, ROUND(SUM(fact_team), 3) AS fact_team FROM productionsms WHERE DATE(datetime) = '$date'";
$result = mysqli_query($link, $message);
while ($row = mysqli_fetch_assoc($result)) {
    $fact_team = $row['fact_team']; // Store the value in a variable for later use
}

$message_sulf = "SELECT DATE(date) AS day, ROUND(SUM(fact), 3) AS fact FROM sulfirovanie WHERE DATE(date) = '$date'";
$result_sulf = mysqli_query($link, $message_sulf);
while ($row_sulf = mysqli_fetch_assoc($result_sulf)) {
    $fact_sulf = $row_sulf['fact']; // Store the value in a variable for later use
}

// Output the values as JSON
echo json_encode(array('fact_team' => $fact_team, 'fact_sulf' => $fact_sulf));
?>