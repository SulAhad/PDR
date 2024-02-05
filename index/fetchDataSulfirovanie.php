<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');
}
?>
<style>
  td.deviationOEE{
    background: orange;
  }

  tr{
    table-layout: fixed;
    width:40px;
  }
  .progres {
    width: 100%; /* Ширина ячейки таблицы */
    height: 120px; /* Высота ячейки таблицы */
    position: relative;
    background-color: orange;
    font-size:10px;
  }
  .progress {
    width: 100%; /* Ширина ячейки таблицы */
    height: 120px; /* Высота ячейки таблицы */
    position: relative;
    background-color: #c9ecc5; /* Цвет фона (зеленый) */
    font-size:10px;
  }
  .red-bar {
    position: absolute;
    width: 100%;
    bottom: 0;
    background-color: Crimson; /* Красная полоса прогресса */
    font-size:10px;
  }
  .lightgreen-bar {
    position: absolute;
    width: 100%;
    bottom: 0;
    background-color: LawnGreen; /* Зеленая полоса прогресса */
    color:black;
    font-size:10px;
  }
</style>
<?php
$date = $_GET['date'];
$message = "SELECT DATE(date) AS day,
SUM(plan) AS plan,
SUM(fact) AS fact,
SUM(plan_output_cars) AS plan_output_cars,
SUM(fact_output_cars) AS fact_output_cars,
GROUP_CONCAT(comment SEPARATOR ', ') AS comment
                              FROM sulfirovanie
                              WHERE DATE(date) = '$date'";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
if (mysqli_num_rows($result) > 0)
{
    
    while ($row = mysqli_fetch_assoc($result))
    {
        if($row['plan'] != 0 || $row['fact'] != 0 || $row['plan_output_cars'] != 0 || $row['plan_output_cars'] != 0) 
        {   
          echo "<thead class='theadIndex'>";
          echo "<tr class='trIndex'><th colspan='13'>Сульфирование</th></tr>";
          echo "</thead>";
            echo "<tr class='trIndex'>";
                echo "    <td class='td_Index'>Выпуск - план</td>";
                echo "    <td class='td_Index'>Выпуск - факт</td>";
                echo "    <td class='td_Index'>Отгрузка машин, план</td>";
                echo "    <td class='td_Index'>Отгрузка машин, факт</td>";
                echo "    <td class='td_Index'>Комментарии</td>";
            echo "</tr>";
            echo "<tr class='trIndex'>";
                echo "<td class='td_Index'>" .number_format($row['plan'], 2). "</td>";
                echo "<td class='td_Index'>" .number_format($row['fact'], 2)."</td>";
                echo "<td class='td_Index'>$row[plan_output_cars]</td>";
                echo "<td class='td_Index'>$row[fact_output_cars]</td>";
                echo "<td class='td_Index' colspan='9'>$row[comment]</td>";
            echo "</tr>";
        }

    }
    
}
        
?>
