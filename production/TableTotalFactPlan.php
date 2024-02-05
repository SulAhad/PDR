<?php
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
echo "<div class='table-responsive'>";
echo "    <table class='table-hover table table-sm'>";
echo "        <thead>";
echo "            <tr>";
echo "                <th></th>";
while ($row = mysqli_fetch_assoc($result)) 
{
    if ($row['date'] == 8) {
        echo "<th>Август</th>";
    }
    if ($row['date'] == 9) {
        echo "<th>Сентябрь</th>";
    }
    if ($row['date'] == 10) {
        echo "<th>Октябрь</th>";
    }
    if ($row['date'] == 11) {
        echo "<th>Ноябрь</th>";
    }
    if ($row['date'] == 12) {
        echo "<th>Декабрь</th>";
    }
    if ($row['date'] == '') {
        echo "<th>Месяц</th>";
    }
}
echo "           </tr>";
echo "       </thead>";
echo "       <tbody>";
mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>план</td>";
    echo "<td>" . number_format($row['plan'], 3) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>факт</td>";
    if ($row['fact'] > $row['plan']) {
        echo "<td class='trgreen'>" . number_format($row['fact'], 3) . "</td>";
    } else {
        echo "<td class='trcoral'>" . number_format($row['fact'], 3) . "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>отклонение</td>";
    echo "<td>" . (number_format($row['fact'] - $row['plan'], 3)) . "</td>";
    echo "</tr>";
}
echo "       </tbody>";
echo "    </table>";
echo "</div>";
?>