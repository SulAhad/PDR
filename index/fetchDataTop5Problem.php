<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');
}

$date = $_GET['date'];

if(isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT * 
    FROM Top5Problem 
WHERE DATE(date) = '$date'";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
if(mysqli_num_rows($result) > 0)
{
    echo"<tr class='trIndex'>";
        echo"    <th>Описание проблемы</th>";
        echo"    <th>Оператор линии</th>";
        echo"    <th>Причина</th>";
        echo"    <th>Непосредственное действие</th>";
        echo"    <th>Устранил</th>";
        echo"    <th>Коренная причина</th>";
        echo"    <th>Действие</th>";
        echo"    <th>Ответственный</th>";
        echo"    <th>Район\Участок</th>";
        echo"    <th>Простой, мин</th>";
        echo"</tr>";
    while($row = mysqli_fetch_assoc($result)) 
    {
        
        echo"<tr class='trIndex'>";
        echo"    <td class='td_Index'>$row[description_problem]</td>";
        echo"    <td class='td_Index'>$row[operator]</td>";
        echo"    <td class='td_Index'>$row[cause]</td>";
        echo"    <td class='td_Index'>$row[immediate_action]</td>";
        echo"    <td class='td_Index'>$row[eliminated]</td>";
        echo"    <td class='td_Index'>$row[root_cause]</td>";
        echo"    <td class='td_Index'>$row[action]</td>";
        echo"    <td class='td_Index'>$row[responce]</td>";
        echo"    <td class='td_Index'>$row[area]</td>";
        echo"    <td class='td_Index'>$row[downtime]</td>";
        echo"</tr>";
    }
}
else
{
    echo"<tr class='trIndex'>";
    echo"    <th>Описание проблемы</th>";
    echo"    <th>Оператор линии</th>";
    echo"    <th>Причина</th>";
    echo"    <th>Непосредственное действие</th>";
    echo"    <th>Устранил</th>";
    echo"    <th>Коренная причина</th>";
    echo"    <th>Действие</th>";
    echo"    <th>Ответственный</th>";
    echo"    <th>Район\Участок</th>";
    echo"    <th>Простой, мин</th>";
    echo"</tr>";
}

?>