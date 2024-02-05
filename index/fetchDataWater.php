<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');
}
$message = "SELECT DATE(date) AS day,
SUM(w1) AS w1,
SUM(w2) AS w2,
SUM(w3) AS w3,
SUM(w4) AS w4,
SUM(w5) AS w5,
SUM(w6) AS w6,
SUM(w7) AS w7,
SUM(w8) AS w8,
SUM(w9) AS w9,
SUM(w10) AS w10
    FROM Active_water_KPI
WHERE DATE(date) = '$date'
GROUP BY day";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $maxValue1 = 79; // Максимальное значение для нормализации цвета
    $maxValue2 = 250; // Максимальное значение для нормализации цвета
    $maxValue3 = 75; // Максимальное значение для нормализации цвета
    $color1 = ($row['w1'] < $maxValue1 * 0.1) ? 'red' : 'lightcoral';
    $color2 = ($row['w2'] < $maxValue2 * 0.1) ? 'red' : 'lightcoral';
    $color3 = ($row['w3'] < $maxValue3 * 0.1) ? 'red' : 'lightcoral';
    $color4 = ($row['w4'] < $maxValue1 * 0.1) ? 'red' : 'lightcoral';
    $color5 = ($row['w5'] < $maxValue2 * 0.1) ? 'red' : 'lightcoral';
    $color6 = ($row['w6'] < $maxValue3 * 0.1) ? 'red' : 'lightcoral';
    $color6 = ($row['w7'] < $maxValue3 * 0.1) ? 'red' : 'lightcoral';
    echo "<tr class='trIndex'>";
    echo "    <td class='td_Index'></td>";

    echo " <td class='td_Index'>63 +16 м3 </td>";
    echo " <td class='td_Index'>250 м3</td>";
    echo " <td class='td_Index'>75 м3 (ХР)</td>";
    echo " <td class='td_Index' style='width: 5px;'></td>";
    echo "</tr>";

// _______________________________________________________________________________
echo "<tr class='trIndex'>";
echo "    <td class='td_Index'>приход, м3</td>";

echo " <td class='td_Index'>$row[w8]</td>";
echo " <td class='td_Index'>$row[w9]</td>";
echo " <td class='td_Index'>$row[w10]</td>";
echo " <td class='td_Index'>$row[w7]</td>";
echo "</tr>";

// _______________________________________________________________________________
    echo "<tr class='trIndex'>";
    echo "    <td class='td_Index'>использовано, м3</td>";

    echo " <td class='td_Index'>$row[w4]</td>";
    echo " <td class='td_Index'>$row[w5]</td>";
    echo " <td class='td_Index'>$row[w6]</td>";
    echo " <td class='td_Index' style='width: 5px;'></td>";
    echo "</tr>";
    // _______________________________________________________________________________
    echo "<tr class='trIndex'>";
    echo "    <td class='td_Index'>остаток, м3</td>";
    echo " <td class='td_Index'>$row[w1]</td>";
    echo " <td class='td_Index'>$row[w2]</td>";
    echo " <td class='td_Index'>$row[w3]</td>";
    echo " <td class='td_Index' style='width: 5px;'></td>";
    echo "</tr>";
    // _______________________________________________________________________________
    echo "<tr class='trIndex'>";
    echo "    <td class='td_Index'>м3</td>";
    echo "    <td class='td_Index' style='width: 39.5px;'>";
      echo "<div class='progress'>";
      echo "<div title='Приход &asymp; " .$row['w8'] . " м3' class='progress-bar progress-bar-striped red' role='progressbar' style='height: " . ($row['w4'] / 79 * 100 + ($row['w1'] / 79 * 100) + ($row['w8'] / 79 * 100)) . "%'><p style='margin-top: -50px;'>$row[w8]</p></div>";
        echo "<div title='Использовано &asymp; " .$row['w4'] . " м3' class='progress-bar progress-bar-striped warning' role='progressbar' style='height: " . ($row['w4'] / 79 * 100 + ($row['w1'] / 79 * 100)) . "%'><p style='margin-top: -50px;'>$row[w4]</p></div>";
        echo "<div title='Остаток &asymp; " .$row['w1'] . " м3' class='progress-bar progress-bar-striped info' role='progressbar' style='height: " . ($row['w1'] / 79 * 100) . "%'>$row[w1]</div>";
      echo "</div>";
    echo "</td>";

    echo "    <td class='td_Index' style='width: 125px;'>";
      echo "<div class='progress'>";
      echo "<div title='Приход &asymp; " .$row['w9'] . " м3' class='progress-bar progress-bar-striped red' role='progressbar' style='height: " . ($row['w5'] / 250 * 100 + ($row['w2'] / 250 * 100) + ($row['w9'] / 250 * 100)) . "%'><p style='margin-top: -50px;'>$row[w9]</p></div>";
        echo "<div title='Использовано &asymp; " .$row['w5'] . " м3' class='progress-bar progress-bar-striped warning' role='progressbar' style=' height: " . ($row['w5'] / 250 * 100 + ($row['w2'] / 250 * 100)) . "%'><p style='margin-top: -50px;'>$row[w5]</p></div>";
        echo "<div title='Остаток &asymp; " .$row['w2'] . " м3' class='progress-bar progress-bar-striped info' role='progressbar' style='height: " . ($row['w2'] / 250 * 100) . "%'>$row[w2]</div>";
      echo "</div>";
    echo "</td>";
    echo "    <td class='td_Index' style='width: 37.5px;'>";
      echo "<div class='progress'>";
      echo "<div title='Приход &asymp; " .$row['w10'] . " м3' class='progress-bar progress-bar-striped red' role='progressbar' style='height: " . ($row['w6'] / 75 * 100 + ($row['w3'] / 75 * 100) + ($row['w10'] / 75 * 100)) . "%'><p style='margin-top: -50px;'>$row[w10]</p></div>";
        echo "<div title='Использовано &asymp; " .$row['w6'] . " м3' class='progress-bar progress-bar-striped warning' role='progressbar' style='height: " . ($row['w6'] / 75 * 100 + ($row['w3'] / 75 * 100)) . "%'><p style='margin-top: -50px;'>$row[w6]</p></div>";
        echo "<div title='Остаток &asymp; " .$row['w3'] . " м3' class='progress-bar progress-bar-striped info' role='progressbar' style='height: " . ($row['w3'] / 75 * 100) . "%'>$row[w3]</div>";
        echo "</td>";

        echo "    <td class='td_Index'  >";
          echo "<div class='progress' style='width: 15px;'>";
            echo "<div title='Поступило из участка Сульфирования &asymp; " .$row['w7'] . " м3' class='progress-bar progress-bar-striped info' role='progressbar' style='height: " . ($row['w7'] / 30 * 100) . "%'><p>$row[w7]</p></div>";
          echo "</div>";
        echo "</td>";
    echo "</tr>";
  }
}
else
{
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>нет заполненных данных...</td>";
    echo"</tr>";
}
?>
<style>
  .progress {
    width: 100%; /* Ширина ячейки таблицы */
    height: 125px; /* Высота ячейки таблицы */
    position: relative;
    background-color: #c9ecc5; /* Цвет фона (зеленый) */

  }
  .progress-bar {
    position: absolute;
    width: 100%;
    bottom: 0;
    background-color: Crimson;

  }
  .warning{
    background: Orange;
  }
  .info{
    background: MediumTurquoise;
  }
  .red{
    background: LightCoral;
  }
</style>