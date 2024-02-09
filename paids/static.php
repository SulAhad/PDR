<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['premirovanie'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
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
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="container">
        <div class="row blur card shadow-sm mt-2">
            <p style="font-size:30px;">Статистика</p>
            <div class="col-md-12">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Год</th>
                                        <th>Месяц</th>
                                        <th>ФИО</th>
                                        <!-- <th><select class="form-select" onchange="updateQuery()">
                                            <?php 
                                            $message_name = "SELECT * FROM operator;";
                                            $link->set_charset("utf8");
                                            $result_name = mysqli_query($link, $message_name);
                                            while($row_name = mysqli_fetch_assoc($result_name))
                                            {
                                                echo "<option id='selectedValue' value='".$row_name['name']."'>".$row_name['name']."</option>";
                                            }
                                            ?>
                                        </select></th> -->
                                        <th>Процент премии</th>
                                        </tr>
                                    </thead>
                                    <script>
                                        function updateQuery(){
                                            var selectedValue = document.getElementById("selectedValue");
                                            var ajaxRequest = new XMLHttpRequest();
                                            ajaxRequest.onreadystatechange = function(){
                                                if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){
                                                    document.getElementById("tableStat").innerHTML = this.responceText;
                                                }
                                            };    
                                            ajaxRequest.open("GET", "update_query.php?selectedValue=" + selectedValue, true);
                                            ajaxRequest.send();
                                        }
                                        
                                        // var name = document.getElementById('name_operator');
                                        // alert(name.value);
                                    </script>
                                    <tbody id="tableStat" style="font-family: Calibri Light;">
                                        <?php
                                        $message = "SELECT name_operator, 
                                        CASE 
                                            WHEN MONTH(date) = 1 THEN 'январь'
                                            WHEN MONTH(date) = 2 THEN 'февраль'
                                            WHEN MONTH(date) = 3 THEN 'март'
                                            WHEN MONTH(date) = 4 THEN 'апрель'
                                            WHEN MONTH(date) = 5 THEN 'май'
                                            WHEN MONTH(date) = 6 THEN 'июнь'
                                            WHEN MONTH(date) = 7 THEN 'июль'
                                            WHEN MONTH(date) = 8 THEN 'август'
                                            WHEN MONTH(date) = 9 THEN 'сентябрь'
                                            WHEN MONTH(date) = 10 THEN 'октябрь'
                                            WHEN MONTH(date) = 11 THEN 'ноябрь'
                                            WHEN MONTH(date) = 12 THEN 'декабрь'
                                        END AS month, 
                                        YEAR(date) as year, AVG(CASE WHEN percent <> 0 THEN percent END) as total_percent
                                        FROM (
                                            SELECT name_operator, date, oee, percent FROM innotech1 
                                            UNION ALL
                                            SELECT name_operator, date, oee, percent FROM innotech2
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM innotech3
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM uva4
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM uva5
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM acma
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM shrink
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM pallet
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM bunker
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM sushka
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM bashnya
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM gazgen
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM prigotovlenie
                                            UNION ALL 
                                            SELECT name_operator, date, oee, percent FROM postdobavki
                                        ) AS all_tables
                                        GROUP BY name_operator, YEAR(date), MONTH(date)
                                        ORDER BY year, month, name_operator;";
                                        $link->set_charset("utf8");
                                        $result = mysqli_query($link, $message);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $percent = $row['total_percent'];
                                            if($percent == 9){
                                                echo "<tr style='background:lightgreen;'>";
                                            }
                                            if($percent < 9){
                                                echo "<tr style='background:lightyellow;'>";
                                            }
                                            if($percent < 6){
                                                echo "<tr style='background:lightcoral;'>";
                                            }
                                            echo "<td>" . $row['year'] . "</td>";
                                            echo "<td>" . $row['month'] . "</td>";
                                            echo "<td>" . $row['name_operator'] . "</td>";
                                            echo "<td>" . round($row['total_percent'], 2) . " %</td>";
                                            echo "</tr>";}echo "</table>";
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
            </div>
            
        </div>
        <script> $( function() { $( document ).tooltip(); });</script>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
