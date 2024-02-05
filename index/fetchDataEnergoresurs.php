<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
    
    $message = "SELECT * FROM target_energoresurs ORDER BY id DESC LIMIT 1";
    $link->set_charset("utf8");
    $result = mysqli_query($link, $message);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $target_total_energy = $row['target_total_energy'];
        $target_production_energy = $row['target_production_energy'];
        $target_sulfirovanie_energy = $row['target_sulfirovanie_energy'];
        $target_warehouse_energy = $row['target_warehouse_energy'];
        $target_utility_energy = $row['target_utility_energy'];
        $target_total_water = $row['target_total_water'];
        $target_production_water = $row['target_production_water'];
        $target_sulfirovanie_water = $row['target_sulfirovanie_water'];
        $target_warehouse_water = $row['target_warehouse_water'];
        $target_utility_water = $row['target_utility_water'];
    }
    
    $message_table_energoresurs = "SELECT DATE(date) AS day,
    sum(current_total_energy) AS current_total_energy,
    sum(day_total_energy) AS day_total_energy,
    sum(current_production_energy) AS current_production_energy,
    sum(day_production_energy) AS day_production_energy,
    sum(current_sulfirovanie_energy) AS current_sulfirovanie_energy,
    sum(day_sulfirovanie_energy) AS day_sulfirovanie_energy,
    sum(current_warehouse_energy) AS current_warehouse_energy,
    sum(day_warehouse_energy) AS day_warehouse_energy,
    sum(current_utility_energy) AS current_utility_energy,
    sum(current_utility_energy) AS day_utility_energy,

    sum(current_total_water) AS current_total_water,
    sum(day_total_water) AS day_total_water,
    sum(current_production_water) AS current_production_water,
    sum(day_production_water) AS day_production_water,
    sum(current_sulfirovanie_water) AS current_sulfirovanie_water,
    sum(day_sulfirovanie_water) AS day_sulfirovanie_water,
    sum(current_warehouse_water) AS current_warehouse_water,
    sum(day_warehouse_water) AS day_warehouse_water,
    sum(current_utility_water) AS current_utility_water,
    sum(current_utility_water) AS day_utility_water
    FROM energoresurs WHERE DATE(date) = '$date' GROUP BY day;";

    $message_table_energoresurs_sulf = "SELECT DATE(date) AS day,
    sum(fact) AS fact_sulf
    FROM sulfirovanie WHERE DATE(date) = '$date' GROUP BY day;";
    $result_table_energoresurs_sulf =  mysqli_query($link, $message_table_energoresurs_sulf);
    while ($row_sulf = mysqli_fetch_assoc($result_table_energoresurs_sulf)) {
        $fact_sulf = $row_sulf['fact_sulf'];
    }

    $message_productionsms = "SELECT DATE(datetime) AS day, SUM(fact_team) AS fact_team 
    FROM productionsms  WHERE DATE(datetime) = '$date'";
    
    $link->set_charset("utf8");
    $result_productionsms =  mysqli_query($link, $message_productionsms);
    
    while ($row_productionsms = mysqli_fetch_assoc($result_productionsms)) {
        $fact = $row_productionsms['fact_team'];
    }
    
    $result_table_energoresurs =  mysqli_query($link, $message_table_energoresurs);
    
    echo '<tr>';
    echo '<th></th>';
    echo '<th class="td_Index col-3" style="font-size:10px; width:80px;">Цель, КВт/т</th>';
    echo '<th class="td_Index col-3" style="font-size:10px; width:80px;">КВт/т, текущее</th>';
    echo '<th class="td_Index col-3" style="font-size:10px; width:80px;">КВт/т, за сутки</th>';
    echo '<th class="td_Index col-3" style="font-size:10px; width:80px;">КВт, за сутки</th>';
    echo '</tr>';
    
    while ($row_table_energoresurs = mysqli_fetch_assoc($result_table_energoresurs)) {
        if($fact_sulf == 0){
            $fact_sulf = 1;
        }
        if($fact == 0){
            $fact = 1;
        }
        echo '<tr class="trIndex">';
        echo '<td>общее энергопотребление</td>';
        echo '<td>' . $target_total_energy . '</td>';
        echo '<td>' . $row_table_energoresurs['current_total_energy'] . '</td>';
        echo '<td>' . round($row_table_energoresurs['day_total_energy'] / ($fact + $fact_sulf), 3). '</td>';
        echo '<td>' . $row_table_energoresurs['day_total_energy'] . '</td>';
        
        echo '</tr>';
        echo '<tr class="trIndex">';
        echo '<td>производство СМС</td>';
        echo '<td>' . $target_production_energy . '</td>';
        echo '<td>' . $row_table_energoresurs['current_production_energy'] . '</td>';
        echo '<td>' . round($row_table_energoresurs['day_production_energy'] / $fact, 3). '</td>';
        echo '<td>' . $row_table_energoresurs['day_production_energy'] . '</td>';
        echo '</tr>';
        echo '<tr class="trIndex">';
        echo '<td>производство сульфирования</td>';
        echo '<td>' . $target_sulfirovanie_energy . '</td>';
        echo '<td>' . $row_table_energoresurs['current_sulfirovanie_energy'] . '</td>';
        echo '<td>' . round($row_table_energoresurs['day_sulfirovanie_energy'] / $fact_sulf, 3). '</td>';
        echo '<td>' . $row_table_energoresurs['day_sulfirovanie_energy'] . '</td>';
        echo '</tr>';
        echo '<tr class="trIndex">';
        echo '<td>склад готовой продукции</td>';
        echo '<td>' . $target_warehouse_energy . '</td>';
        echo '<td>' . $row_table_energoresurs['current_warehouse_energy'] . '</td>';
        echo '<td>' . round($row_table_energoresurs['day_warehouse_energy'] , 3). '</td>';
        echo '<td>' . $row_table_energoresurs['day_warehouse_energy'] . '</td>';
        echo '</tr>';
        echo '<tr class="trIndex">';
        echo '<td>утилиты</td>';
        echo '<td>' . $target_utility_energy . '</td>';
        echo '<td>' . $row_table_energoresurs['current_utility_energy'] . '</td>';
        echo '<td>0,000</td>';
        echo '<td>' . $row_table_energoresurs['day_utility_energy'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th></th>';
        echo '<th class="td_Index col-3" style="font-size:10px; width:80px;">Цель, m3/т</th>';
        echo '<th class="td_Index col-3" style="font-size:10px; width:80px;">m3/т, текущее</th>';
        echo '<th class="td_Index col-3" style="font-size:10px; width:80px;">m3/т, за сутки</th>';
        echo '<th class="td_Index col-3" style="font-size:10px; width:80px;">m3, за сутки</th>';
        echo '</tr>';
        echo '<tr class="trIndex">';
        echo '<td>общее водопотребление</td>';
        echo '<td>' . $target_total_water . '</td>';
        echo '<td>' . $row_table_energoresurs['current_total_water'] . '</td>';
        echo '<td>' . round($row_table_energoresurs['day_total_water'] / ($fact + $fact_sulf), 3). '</td>';
        echo '<td>' . $row_table_energoresurs['day_total_water'] . '</td>';
        
        echo '</tr>';
        echo '<tr class="trIndex">';
        echo '<td>производство СМС</td>';
        echo '<td>' . $target_production_water . '</td>';
        echo '<td>' . $row_table_energoresurs['current_production_water'] . '</td>';
        echo '<td>0,000</td>';
        echo '<td>' . $row_table_energoresurs['day_production_water'] . '</td>';
        echo '</tr>';
        echo '<tr class="trIndex">';
        echo '<td>производство сульфирования</td>';
        echo '<td>' . $target_sulfirovanie_water . '</td>';
        echo '<td>' . $row_table_energoresurs['current_sulfirovanie_water'] . '</td>';
        echo '<td>0,000</td>';
        echo '<td>' . $row_table_energoresurs['day_sulfirovanie_water'] . '</td>';
        echo '</tr>';
        echo '<tr class="trIndex">';
        echo '<td>склад готовой продукции</td>';
        echo '<td>' . $target_warehouse_water . '</td>';
        echo '<td>' . $row_table_energoresurs['current_warehouse_water'] . '</td>';
        echo '<td>0,000</td>';
        echo '<td>' . $row_table_energoresurs['day_warehouse_water'] . '</td>';
        echo '</tr>';
        echo '<tr class="trIndex">';
        echo '<td>утилиты</td>';
        echo '<td>' . $target_utility_water . '</td>';
        echo '<td>' . $row_table_energoresurs['current_utility_water'] . '</td>';
        echo '<td>0,000</td>';
        echo '<td>' . $row_table_energoresurs['day_utility_water'] . '</td>';
        echo '</tr>';
    }
    