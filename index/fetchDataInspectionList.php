<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');
}
$message = "SELECT DATE(date) AS day, COUNT(name) AS count_name,
    SUM(CASE WHEN typeSafety = 'Небезопасно' THEN 1 ELSE 0 END) AS count_unsafe,
    comment, textForList, name, textForList
    FROM inspectionlist
    WHERE DATE(date) = '$date'
    GROUP BY day";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
echo "<table>"; // Add table tag
    while($row = mysqli_fetch_assoc($result))
    {
        echo"<tr class='trIndex col-1'>";
            echo"<td class='td_Index'><p>Количество замечаний после обходов</p></td>";
            echo"<td class='col-8 td_Index'>";
            if($row['count_name'] == 22) {
                echo "<div class='progress'  style='height:15px;'>";
                    echo "<div title='Количество замечаний после обходов = ".$row['count_name']." шт.' class='progress-bar progress-bar-animated progress-bar-striped bg-success' role='progressbar' style='width: " . round($row['count_name'] / 22 * 100, 2) . "%' aria-valuenow='" . round($row['count_name'], 2) . "' aria-valuemin='0' aria-valuemax='22'>$row[count_name]</div>";
                echo "</div>";
            } else {
                echo "<div class='progress'  style='height:15px;'>";
                    echo "<div title='Количество замечаний после обходов = ".$row['count_name']." шт.' class='progress-bar progress-bar-animated progress-bar-striped bg-danger' role='progressbar' style='width: " . round($row['count_name'] / 22 * 100, 2) . "%' aria-valuenow='" . round($row['count_name'], 2) . "' aria-valuemin='0' aria-valuemax='22'>$row[count_name]</div>";
                echo "</div>";
            }
            echo "</td>";
        echo"</tr>";
    }
?>
<?php
$message = "SELECT DATE(date) AS day, COUNT(name) AS count_name, name,
    SUM(CASE WHEN typeSafety = 'Небезопасно' THEN 1 ELSE 0 END) AS count_unsafe,
    comment, textForList, typeSafety
    FROM InspectionList
    WHERE DATE(date) = '$date'
    GROUP BY day, typeSafety, comment, textForList";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['typeSafety'] == 'Небезопасно'){
            echo"<tr class='trIndex'>";
                echo"    <td colspan='2' class='danger td_Index'><label>Обнаружено несоответствие</label</td>";
            echo"</tr>";
            echo"<tr class='trIndex'>";
                echo"    <td class='col-3 td_Index'><label>автор - $row[name]</label></td>";
                echo"    <td class='col-5 td_Index'><label>$row[textForList] / $row[comment]</label></td>";
            echo"</tr>";
        }

    }
}
?>
