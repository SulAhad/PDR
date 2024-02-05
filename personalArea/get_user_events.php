<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$link->set_charset("utf8");
$user = $_GET['user'];
$result = mysqli_query($link, "SELECT *, TIMESTAMPDIFF(MINUTE, date_start_event, date_end_event) AS event_duration FROM calendarfortechnical WHERE user='$user' AND ((date_start_event <= CURDATE() AND date_end_event >= CURDATE()) OR (DATE(date_start_event) = CURDATE())) AND status != 'Выполнено' ORDER BY date_start_event ASC");
while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<div class='card-body card m-1";
    if ($row['status'] == 'Всё сложно') {
        $html .= "' style='background:PeachPuff;";
    } else {
        $html .= "' style='background:OldLace;";
    }
    $html .= "'>";
    $html .= "<small class='text-muted' style='font-size:8px;'>№" . $row['id'] . "</small>";
    $html .= "<small class='text-muted'>" . $row['name_event'] . "</small>";
    $html .= "<p class='card-text'>" . $row['text_event'] . "</p>";
    $html .= "<div class='d-flex justify-content-between align-items-center'>";
    $html .= "<div class='btn-group'>";
    $html .= "<input style='font-size:10px; max-width:40px; min-width:20px; background:transparent;' readonly type='text' class='form-control form-control-sm border-0' value='" . date('H:i', strtotime($row['date_start_event'])) . "'>-</input>";
    $html .= "<input style='font-size:10px; max-width:40px; min-width:20px; background:transparent;' readonly type='text' class='form-control form-control-sm border-0' value='" . date('H:i', strtotime($row['date_end_event'])) . "'></input>";
    $html .= "</div>";
    $hours = floor($row['event_duration'] / 60);
    $minutes = $row['event_duration'] % 60;
    if ($hours == 0) {
        $html .= "</br><small class='text-muted' style='font-size:10px; max-width:80px; min-width:20px;'>" . $minutes . " мин</small>";
    } else {
        $html .= "</br><small class='text-muted' style='font-size:10px; max-width:80px; min-width:20px;'>" . $hours . " час " . $minutes . " мин</small>";
    }
    $html .= "</div>";
    $html .= "</div>";
}
echo $html;
?>