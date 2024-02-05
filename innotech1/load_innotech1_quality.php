<?php
$link = mysqli_connect("127.0.0.1", "root", "root", "u1851636_default");
$message = "SELECT SUM(seam_distortion) AS seam_distortion, 
                SUM(valve) AS valve,
                SUM(burn_through) AS burn_through,
                SUM(report_offset) AS report_offset,
                SUM(pen_hole) AS pen_hole,
                SUM(appearance_of_the_powder) AS appearance_of_the_powder,
                SUM(marking) AS marking,
                SUM(correspondence) AS correspondence,
                SUM(packaging_defects) AS packaging_defects,
                SUM(sealing_the_valves) AS sealing_the_valves,
                SUM(valve_tear) AS valve_tear,
                SUM(valve_misalignment) AS valve_misalignment,
                SUM(corner_label) AS corner_label,
                SUM(corrugated_box_marking) AS corrugated_box_marking,
                GROUP_CONCAT(CASE WHEN notes <> '' THEN notes END SEPARATOR ', ') AS notes_total
        FROM innotech_quality
        WHERE DATE(date) = CURDATE()";
$link->set_charset("utf8");
$result = mysqli_query($link, $message);
while($row = mysqli_fetch_assoc($result))
{
    echo"<tr>";
        echo "<td>Перекос шва (боковая часть пакета на линии сгиба)</td>";
        echo "<td>$row[seam_distortion]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Клапана (не более 3 мм, при эстетичном товарном виде)</td>";
        echo "<td>$row[valve]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Прожоги (продукт не высыпается), складки (не более 10 мм)</td>";
        echo "<td>$row[burn_through]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Смещение рапорта(менее 10мм)</td>";
        echo "<td>$row[report_offset]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Отверстие для ручки(непроруб 10-20мм)</td>";
        echo "<td>$row[pen_hole]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Внешний вид порошка</td>";
        echo "<td>$row[appearance_of_the_powder]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Маркировка(нечеткая,некорректная или смещение)</td>";
        echo "<td>$row[marking]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Соответствие IDN упаковки IDN ГП</td>";
        echo "<td>$row[correspondence]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Дефекты упаковки после проведения дроп-теста</td>";
        echo "<td>$row[packaging_defects]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Заклейка клапанов гофроящика</td>";
        echo "<td>$row[sealing_the_valves]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Надрыв клапанов (до 10мм)</td>";
        echo "<td>$row[valve_tear]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Перекос клапанов (от 3-5мм)</td>";
        echo "<td>$row[valve_misalignment]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Угловая этикетка (соответствие ассортимента, слабая проклейка, складки)</td>";
        echo "<td>$row[corner_label]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Маркировка гофроящика (нечеткая, некорректная или смещение)</td>";
        echo "<td>$row[corrugated_box_marking]</td>";
    echo"</tr>";
    
    echo"<tr>";
    echo"    <th>Примечание</th>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>$row[notes_total]</td>";
    echo"</tr>";
}
    ?>