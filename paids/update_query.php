<?php
$a = $_SESSION['login'];
$message_max_percent = "SELECT * FROM settings_for_paids ORDER BY id DESC LIMIT 1";
$link->set_charset("utf8");
$result_max_percent = mysqli_query($link, $message_max_percent);
while ($row = mysqli_fetch_assoc($result_max_percent))
{
    $max_percent = $row['max_percent'];
}
$message_max_value_for_quality = "SELECT * FROM settings_for_paids ORDER BY id DESC LIMIT 1";
$link->set_charset("utf8");
$result_max_value_for_quality = mysqli_query($link, $message_max_value_for_quality);
while ($row = mysqli_fetch_assoc($result_max_value_for_quality))
{
    $max_value_for_quality = $row['max_value_for_quality'];
}
$messageOEE = "SELECT * FROM Settings_KPI ORDER BY id DESC LIMIT 1";
$link->set_charset("utf8");
$resultOEE = mysqli_query($link, $messageOEE);
while ($row = mysqli_fetch_assoc($resultOEE))
{
    $oee = $row['targetOEE'];
}
$value = mysqli_real_escape_string($link, $_GET['selectedValue']); // экранирование входных данных для защиты от SQL-инъекций
$message = "SELECT name_operator, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee, 
SUM(quality1) as total_quality1, 
SUM(quality2) as total_quality2, SUM(quality3) as total_quality3, SUM(quality4) as total_quality4,
GROUP_CONCAT(comment SEPARATOR '\t') AS comment
FROM (SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM innotech1 UNION ALL SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM innotech2 UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM innotech3 UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM uva4 UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM uva5 UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM acma UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM shrink UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM pallet UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM bunker UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM sushka UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM bashnya UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM gazgen UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM prigotovlenie UNION ALL 
    SELECT name_operator, date, oee, quality1, quality2, quality3, quality4, comment FROM postdobavki
) AS all_tables  WHERE name_operator = '$value'
GROUP BY name_operator, YEAR(date), MONTH(date)
ORDER BY year, month, name_operator;";
$link->set_charset("utf8");
$result = mysqli_query($link, $message);
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['total_oee'] > $oee) {
        echo "<tr  style='background:PaleGreen;'>";
    } else {
        echo "<tr  style='background:PeachPuff;'>";
    }
    echo "<td>" . $row['year'] . "</td>";
    echo "<td>" . $row['month'] . "</td>";
    echo "<td>" . $row['name_operator'] . "</td>";
    echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
    echo "<td title='" . htmlspecialchars($row['comment']) . "'>" . $row['total_quality1'] . "</td>";
    echo "<td title='" . htmlspecialchars($row['comment']) . "'>" . $row['total_quality2'] . "</td>";
    echo "<td title='" . htmlspecialchars($row['comment']) . "'>" . $row['total_quality3'] . "</td>";
    echo "<td title='" . htmlspecialchars($row['comment']) . "'>" . $row['total_quality4'] . "</td>";
    $adjusted_oee = $row['total_oee'] * $max_percent / 100 - (($row['total_quality1'] + $row['total_quality2'] + $row['total_quality3'] + $row['total_quality4']) * $max_value_for_quality);
    echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
    echo "</tr>";
}
echo "</table>";
?>