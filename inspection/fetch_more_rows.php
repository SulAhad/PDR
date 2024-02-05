<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');

$offset = $_POST['offset'];

$message = "SELECT * FROM InspectionList ORDER BY date DESC LIMIT 25 OFFSET $offset";
$link->set_charset("utf8");
$result = mysqli_query($link, $message);

$html = '';
while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<tr>";
    $date = $row['date'];
    $html .= "<td><p>$row[id]</p></td>";
    $html .= "<td><p>" . date('d.m.Y', strtotime($date)) . "</p></td>";
    $html .= "<td><p>$row[name]</p></td>";
    $html .= "<td><p>$row[textForList]</p></td>";
    if ($row['typeSafety'] == 'Небезопасно') {
        $html .= "<td style='background:lightcoral;'><p>$row[typeSafety]</p></td>";
    } else {
        $html .= "<td><p>$row[typeSafety]</p></td>";
    }
    $html .= "<td><p>$row[comment]</p></td>";
    $html .= "<td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' id='input_intervention1' value='$row[intervention1]' " . ($row['intervention1'] == 1 ? 'checked' : 'unchecked') . " ></td>";
    $html .= "<td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' id='input_intervention2' value='$row[intervention2]' " . ($row['intervention2'] == 1 ? 'checked' : 'unchecked') . " ></td>";
    $html .= "<td><p>$row[duration]</p></td>";
    $html .= "<td><p>$row[staff]</p></td>";
    $html .= "<td><p>$row[contract]</p></td>";
    $html .= "<td><p>$row[production]</p></td>";
    $html .= "<td><p>$row[area]</p></td>";
    $html .= "</tr>";
}
echo $html;
mysqli_close($link);
?>