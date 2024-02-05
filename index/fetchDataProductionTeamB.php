<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');
}
$messageOEE = "SELECT * FROM Settings_KPI ORDER BY id DESC LIMIT 1";
$link->set_charset("utf8");
$resultOEE = mysqli_query($link, $messageOEE);
while ($row = mysqli_fetch_assoc($resultOEE))
{
    $oee = $row['targetOEE'];
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
require_once '../names.php';
$app_names = new App_names();
$messageOEE = "SELECT * FROM Settings_KPI ORDER BY id DESC LIMIT 1";
    $link->set_charset("utf8");
    $resultOEE = mysqli_query($link, $messageOEE);
    while ($row = mysqli_fetch_assoc($resultOEE))
    {
      $target = $row['targetOEE'];
    }
$date = $_GET['date'];
if (isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT DATE(datetime) AS day,
SUM(plan_team) AS plan_team,
SUM(fact_team) AS fact_team,
SUM(deviation) AS deviation,
SUM(oee_team) AS oee_team,
SUM(innotech1_trek) AS innotech1_trek,
SUM(innotech2_trek) AS innotech2_trek,
SUM(innotech3_trek) AS innotech3_trek,
SUM(uva4_trek) AS uva4_trek,
SUM(uva5_trek) AS uva5_trek,
SUM(acma_trek) AS acma_trek,
SUM(innotech1) AS innotech1,
SUM(innotech2) AS innotech2,
SUM(innotech3) AS innotech3,
SUM(uva4) AS uva4,
SUM(uva5) AS uva5,
SUM(acma) AS acma,
GROUP_CONCAT(innotech1_comment SEPARATOR '\t') AS innotech1_comment,
GROUP_CONCAT(innotech2_comment SEPARATOR '\t') AS innotech2_comment,
GROUP_CONCAT(innotech3_comment SEPARATOR '\t') AS innotech3_comment,
GROUP_CONCAT(uva4_comment SEPARATOR '\t') AS uva4_comment,
GROUP_CONCAT(uva5_comment SEPARATOR '\t') AS uva5_comment,
GROUP_CONCAT(acma_comment SEPARATOR '\t') AS acma_comment
                              FROM productionsms
                              WHERE DATE(datetime) = '$date' AND team = 'Смена Б'";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
    if($row['innotech1'] != 0 || $row['innotech2'] != 0 || $row['innotech3'] != 0 || $row['uva4'] != 0 || $row['uva5'] != 0 || $row['acma'] != 0)
    {
          $color1_class = ($row['innotech1'] < $target) ? 'red-bar' : 'lightgreen-bar';
          $color2_class = ($row['innotech2'] < $target) ? 'red-bar' : 'lightgreen-bar';
          $color3_class = ($row['innotech3'] < $target) ? 'red-bar' : 'lightgreen-bar';
          $color4_class = ($row['uva4'] < $target) ? 'red-bar' : 'lightgreen-bar';
          $color5_class = ($row['uva5'] < $target) ? 'red-bar' : 'lightgreen-bar';
          $color6_class = ($row['acma'] < $target) ? 'red-bar' : 'lightgreen-bar';
          $oee_class = ($row['oee_team'] < $target) ? 'red-bar' : 'lightgreen-bar';
          $color7_class = ($row['plan_team'] < $target) ? 'red-bar' : 'lightgreen-bar';
          $color8_class = ($row['fact_team'] < $target) ? 'red-bar' : 'lightgreen-bar';
          $color9_class = ($row['plan_team'] > $row['fact_team']) ? 'red-bar' : 'lightgreen-bar';
            echo "<tr class='trIndex'>";
                echo "<td colspan='10'>СМС - Смена Б</td>";
            echo "</tr>";
// _____________________________________________________________________________________________________________
            echo "<tr class='trIndex'>";
                echo "    <td class='td_Index'>инн1</td>";
                echo "    <td class='td_Index'>инн2</td>";
                echo "    <td class='td_Index'>инн3</td>";
                echo "    <td class='td_Index'>uva4</td>";
                echo "    <td class='td_Index'>uva5</td>";
                echo "    <td class='td_Index'>acma4</td>";
                echo "    <td class='td_Index'>общее</td>";
                echo "    <td class='td_Index' style='background:DarkSlateGray; color:gold; border:none;'>план</td>";
                echo "    <td class='td_Index' style='background:DarkSlateGray; color:gold; border:none;'>факт</td>";
            echo "</tr>";
// _____________________________________________________________________________________________________________
            
    echo "<tr class='trIndex'>";
    if($row['innotech1'] != 0){
      echo "    <td title='Потери OEE=" . number_format(abs($row['innotech1']-100), 2) . "%, Количество переходов= " .$row['innotech1_trek'] . "' class='td_Index deviationOEE'>" .number_format(abs($row['innotech1']-100), 2)."</td>";
    }
    else{
      echo "    <td class='td_Index'></td>";
    }
    if($row['innotech2'] != 0){
      echo "    <td title='Потери OEE=" . number_format(abs($row['innotech2']-100), 2) . "%, Количество переходов= " .$row['innotech2_trek'] . "' class='td_Index deviationOEE'>" .number_format(abs($row['innotech2']-100), 2)."</td>";
    }
    else{
      echo "    <td class='td_Index'></td>";
    }
    if($row['innotech3'] != 0){
      echo "    <td title='Потери OEE=" . number_format(abs($row['innotech3']-100), 2) . "%, Количество переходов= " .$row['innotech3_trek'] . "' class='td_Index deviationOEE'>" .number_format(abs($row['innotech3']-100), 2)."</td>";
    }
    else{
      echo "    <td class='td_Index'></td>";
    }
    if($row['uva4'] != 0){
      echo "    <td title='Потери OEE=" . number_format(abs($row['uva4']-100), 2) . "%, Количество переходов= " .$row['uva4_trek'] . "' class='td_Index deviationOEE'>" .number_format(abs($row['uva4']-100), 2)."</td>";
    }
    else{
      echo "    <td class='td_Index'></td>";
    }
    if($row['uva5'] != 0){
      echo "    <td title='Потери OEE=" . number_format(abs($row['uva5']-100), 2) . "%, Количество переходов= " .$row['uva5_trek'] . "' class='td_Index deviationOEE'>" .number_format(abs($row['uva5']-100), 2)."</td>";
    }
    else{
      echo "    <td class='td_Index'></td>";
    }
    if($row['acma'] != 0){
      echo "    <td title='Потери OEE=" . number_format(abs($row['acma']-100), 2) . "%, Количество переходов= " .$row['acma_trek'] . "' class='td_Index deviationOEE'>" .number_format(abs($row['acma']-100), 2)."</td>";
    }
    else{
      echo "    <td class='td_Index'></td>";
    }
    if($row['oee_team'] != 0){
      echo "    <td title='Потери OEE=" . number_format(abs($row['oee_team']-100), 2) . "' class='td_Index deviationOEE'>" .number_format(abs($row['oee_team']-100), 2)."</td>";
    }
    else{
      echo "    <td class='td_Index'></td>";
    }
        echo "    <td class='td_Index' colspan='2'>Отклонение: " .number_format($row['deviation'], 2)."</td>";
echo "</tr>";
// // ________________________________________________________________________________________________________________________

echo "<tr class='trIndex'>";
if($row['innotech1'] != 0){
  echo "    <td class='td_Index'><div title='OEE Иннотех 1 = ".round($row['innotech1'],2)." %.'  class='progres'><div class='progress-bar $color1_class' role='progressbar' aria-valuenow='$row[innotech1]' aria-valuemin='0' aria-valuemax='100' style='height: " . round($row['innotech1'] / 100 * 100, 2) . "%'>" . round($row['innotech1'], 2) . "</div></div></td>";
}
else{
  echo "    <td class='td_Index'></td>";
}
if($row['innotech2'] != 0){
  echo "    <td class='td_Index'><div title='OEE Иннотех 2 = ".round($row['innotech2'],2)." %.'  class='progres'><div class='progress-bar $color2_class' role='progressbar' aria-valuenow='$row[innotech2]' aria-valuemin='0' aria-valuemax='100' style='height: " . round($row['innotech2'] / 100 * 100, 2) . "%'>" . round($row['innotech2'], 2) . "</div></div></td>";
}
else{
  echo "    <td class='td_Index'></td>";
}
if($row['innotech3'] != 0){
  echo "    <td class='td_Index'><div title='OEE Иннотех 3 = ".round($row['innotech3'],2)." %.'  class='progres'><div class='progress-bar $color3_class' role='progressbar' aria-valuenow='$row[innotech3]' aria-valuemin='0' aria-valuemax='100' style='height: " . round($row['innotech3'] / 100 * 100, 2) . "%'>" . round($row['innotech3'], 2) . "</div></div></td>";
}
else{
  echo "    <td class='td_Index'></td>";
}
if($row['uva4'] != 0){
  echo "    <td class='td_Index'><div title='OEE UVA-4 = ".round($row['uva4'],2)." %.'  class='progres'><div class='progress-bar $color4_class' role='progressbar' aria-valuenow='$row[uva4]'      aria-valuemin='0' aria-valuemax='100' style='height: " . round($row['uva4'] / 100 * 100, 2) . "%'>" . round($row['uva4'], 2) . "</div></div></td>";

}
else{
  echo "    <td class='td_Index'></td>";
}
if($row['uva5'] != 0){
  echo "    <td class='td_Index'><div title='OEE UVA-5 = ".round($row['uva5'],2)." %.' class='progres'><div class='progress-bar $color5_class' role='progressbar' aria-valuenow='$row[uva5]'      aria-valuemin='0' aria-valuemax='100' style='height: " . round($row['uva5'] / 100 * 100, 2) . "%'>" . round($row['uva5'], 2) . "</div></div></td>";
}
else{
  echo "    <td class='td_Index'></td>";
}
if($row['acma'] != 0){
  echo "    <td class='td_Index'><div title='OEE АКМА = ".round($row['acma'],2)." %.' class='progres'><div class='progress-bar $color6_class' role='progressbar' aria-valuenow='$row[acma]'      aria-valuemin='0' aria-valuemax='100' style='height: " . round($row['acma'] / 100 * 100, 2) . "%'>" . round($row['acma'], 2) . "</div></div></td>";
}
else{
  echo "    <td class='td_Index'></td>";
}
if($row['oee_team'] != 0){
  echo "    <td class='td_Index'><div title='OEE TOTAL = ".round($row['oee_team'],2)." %.' class='progres'><div class='progress-bar $oee_class     role='progressbar' aria-valuenow='$row[oee_team]'       aria-valuemin='0' aria-valuemax='100' style='height: " . round($row['oee_team'] / 100 * 100, 2) . "%'>" . round($row['oee_team'], 2) . "</div></div></td>";
}
else{
  echo "    <td class='td_Index'></td>";
}



    echo "<td class='td_Index' style='background:DarkSlateGray; color:gold; border:none;'>";
    echo "<div class='progress'>";
      echo "<div class='progress-bar $color9_class' role='progressbar' aria-valuemin='0' aria-valuemax='100' aria-valuenow='$row[plan_team]' style='background:DarkCyan; height: " . round($row['plan_team'] / 280 * 100, 2) . "%'>" . round($row['plan_team'], 2) . "</div>";
      echo "</div>";
      echo "</td>";

    echo "<td class='td_Index' style='background:DarkSlateGray; color:gold; border:none;'>";
    echo "<div class='progress'>";
    echo "<div class='progress-bar $color9_class' role='progressbar' aria-valuemin='0' aria-valuemax='100' aria-valuenow='$row[fact_team]' style='height: " . round($row['fact_team'] / 280 * 100, 2) . "%'>" . round($row['fact_team'], 2) . "</div>";
    echo "</div>";
    echo "</td>";


//     }


//     echo "</td>";


// echo "</tr>";

// ________________________________________________________________________________________________________________________
echo "<tr class='trIndex'>";

echo "    <td class='td_Index'>" .number_format($row['innotech1'], 2). "</td>";

echo "    <td class='td_Index'>" .number_format($row['innotech2'], 2)."</td>";

echo "    <td class='td_Index'>" .number_format($row['innotech3'], 2)."</td>";

echo "    <td class='td_Index'>" .number_format($row['uva4'], 2)."</td>";

echo "    <td class='td_Index'>" .number_format($row['uva5'], 2). "</td>";

echo "    <td class='td_Index'>" .number_format($row['acma'], 2). "</td>";

echo "    <td class='td_Index'>" .number_format($row['oee_team'], 2)."</td>";

echo "    <td class='td_Index' style='background:DarkSlateGray; color:gold; border:none;'>" .number_format($row['plan_team'], 2)."</td>";

echo "    <td class='td_Index' style='background:DarkSlateGray; color:gold; border:none;'>" .number_format($row['fact_team'], 2)."</td>";

echo "</tr>";
// ________________________________________________________________________________________________________________________
if(strlen($row['innotech1_comment']) > 2)
{
  echo "<tr class='trIndex'>";
  echo "<td>$app_names->innotech1 </td>    <td class='td_Index' style='text-align:left; background-color: orange;' colspan='9'>$row[innotech1_comment]</td>";
  echo "</tr>";
}
if(strlen($row['innotech2_comment']) > 2)
{
  echo "<tr class='trIndex'>";
  echo "    <td>$app_names->innotech2 </td><td  class='td_Index' style='text-align:left; background-color: orange;' colspan='9'>$row[innotech2_comment]</td>";
  echo "</tr>";
}
if(strlen($row['innotech3_comment']) > 2)
{
  echo "<tr class='trIndex'>";
  echo "  <td>$app_names->innotech3 </td>  <td class='td_Index' style='text-align:left; background-color: orange;' colspan='9'>$row[innotech3_comment]</td>";
  echo "</tr>";
}
if(strlen($row['uva4_comment']) > 2)
{
  echo "<tr class='trIndex'>";
  echo "   <td>$app_names->uva4 </td>   <td class='td_Index' style='text-align:left; background-color: orange;' colspan='9'>$row[uva4_comment]</td>";
  echo "</tr>";
}
if(strlen($row['uva5_comment']) > 2)
{
  echo "<tr class='trIndex'>";
  echo "  <td>$app_names->uva5 </td>    <td class='td_Index' style='text-align:left; background-color: orange;' colspan='9'>$row[uva5_comment]</td>";
  echo "</tr>";
}
if(strlen($row['acma_comment']) > 2)
{
  echo "<tr class='trIndex'>";
  echo "  <td>$app_names->acma </td>   <td class='td_Index' style='text-align:left; background-color: orange;' colspan='9'>$row[acma_comment]</td>";
  echo "</tr>";
}

}
    else{
      echo "<tr class='trIndex'>";
          echo "<td class='td_Index'></td>";
      echo "</tr>";
    }
  }
}
        
?>
