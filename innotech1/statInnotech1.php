<?php require('connect_db.php');
if(isset($_SESSION['login']) == "")
{header('Location: bridge.php');}
if($_SESSION['palletizer'] == 0){
    require('accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
    <head><?php require('head.php')?></head>
    <body class="container-fluid">
        <div class="row card shadow-sm mt-4">
            <style>
                table{
                    font-size:12px;
                }
            </style>
            <fieldset class="form-group border card shadow-sm">
                <div style="height:500px;" class="table-responsive">
                    Весь список
                    <table id="myTable" class="mt-2 table-hover table-bordered table table-sm ">
                        <thead>
                                <tr>
                                <th class="col-1">Время</th>
                                <th class="col-1">Перекос шва (боковая часть пакета на линии сгиба)</th>
                                <th class="col-1">Клапана (не более 3 мм, при эстетичном товарном виде)</th>
                                <th class="col-1">Прожоги (продукт не высыпается), складки (не более 10 мм)</th>
                                <th class="col-1">Смещение рапорта(менее 10мм)</th>
                                <th class="col-1">Отверстие для ручки(непроруб 10-20мм)</th>
                                <th class="col-1">Внешний вид порошка</th>
                                <th class="col-1">Маркировка(нечеткая,некорректная или смещение)</th>
                                <th class="col-1">Соответствие IDN упаковки IDN ГП</th>
                                <th class="col-1">Дефекты упаковки после проведения дроп-теста</th>
                                <th class="col-1">Заклейка клапанов гофроящика</th>
                                <th class="col-1">Надрыв клапанов (до 10мм)</th>
                                <th class="col-1">Перекос клапанов (от 3-5мм)</th>
                                <th class="col-1">Угловая этикетка (соответствие ассортимента, слабая проклейка, складки)</th>
                                <th class="col-1">Маркировка гофроящика (нечеткая, некорректная или смещение)</th>
                                <th class="col-1">Примечания</th>
                                </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php
                                $message = "SELECT 
                                    date AS date,
                                    SUM(seam_distortion) AS seam_distortion, 
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
                                WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())
                                GROUP BY date ORDER BY date desc";
                                $link->set_charset("utf8");
                                $result = mysqli_query($link, $message);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                        echo "<td>".$row['date']."</td>";
                                        echo "<td".($row['seam_distortion']>0 ? " style='background-color: lightcoral;'" : "").">".$row['seam_distortion']."</td>";
                                        echo "<td".($row['valve']>0 ? " style='background-color: lightcoral;'" : "").">".$row['valve']."</td>";
                                        echo "<td".($row['burn_through']>0 ? " style='background-color: lightcoral;'" : "").">".$row['burn_through']."</td>";
                                        echo "<td".($row['report_offset']>0 ? " style='background-color: lightcoral;'" : "").">".$row['report_offset']."</td>";
                                        echo "<td".($row['pen_hole']>0 ? " style='background-color: lightcoral;'" : "").">".$row['pen_hole']."</td>";
                                        echo "<td".($row['appearance_of_the_powder']>0 ? " style='background-color: lightcoral;'" : "").">".$row['appearance_of_the_powder']."</td>";
                                        echo "<td".($row['marking']>0 ? " style='background-color: lightcoral;'" : "").">".$row['marking']."</td>";
                                        echo "<td".($row['correspondence']>0 ? " style='background-color: lightcoral;'" : "").">".$row['correspondence']."</td>";
                                        echo "<td".($row['packaging_defects']>0 ? " style='background-color: lightcoral;'" : "").">".$row['packaging_defects']."</td>";
                                        echo "<td".($row['sealing_the_valves']>0 ? " style='background-color: lightcoral;'" : "").">".$row['sealing_the_valves']."</td>";
                                        echo "<td".($row['valve_tear']>0 ? " style='background-color: lightcoral;'" : "").">".$row['valve_tear']."</td>";
                                        echo "<td".($row['valve_misalignment']>0 ? " style='background-color: lightcoral;'" : "").">".$row['valve_misalignment']."</td>";
                                        echo "<td".($row['corner_label']>0 ? " style='background-color: lightcoral;'" : "").">".$row['corner_label']."</td>";
                                        echo "<td".($row['corrugated_box_marking']>0 ? " style='background-color: lightcoral;'" : "").">".$row['corrugated_box_marking']."</td>";
                                        echo "<td>".$row['notes_total']."</td>";
                                        echo "</tr>";
                                }
                                echo "</table>";
                                    ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <fieldset class="form-group border card shadow-sm mt-2">
                <div class="table-responsive">
                    <table id="myTable" class="mt-2 table-hover table-bordered table table-sm ">
                        <thead>
                                <tr>
                                <th class="col-1">Месяц</th>
                                <th class="col-1">Перекос шва (боковая часть пакета на линии сгиба)</th>
                                <th class="col-1">Клапана (не более 3 мм, при эстетичном товарном виде)</th>
                                <th class="col-1">Прожоги (продукт не высыпается), складки (не более 10 мм)</th>
                                <th class="col-1">Смещение рапорта(менее 10мм)</th>
                                <th class="col-1">Отверстие для ручки(непроруб 10-20мм)</th>
                                <th class="col-1">Внешний вид порошка</th>
                                <th class="col-1">Маркировка(нечеткая,некорректная или смещение)</th>
                                <th class="col-1">Соответствие IDN упаковки IDN ГП</th>
                                <th class="col-1">Дефекты упаковки после проведения дроп-теста</th>
                                <th class="col-1">Заклейка клапанов гофроящика</th>
                                <th class="col-1">Надрыв клапанов (до 10мм)</th>
                                <th class="col-1">Перекос клапанов (от 3-5мм)</th>
                                <th class="col-1">Угловая этикетка (соответствие ассортимента, слабая проклейка, складки)</th>
                                <th class="col-1">Маркировка гофроящика (нечеткая, некорректная или смещение)</th>
                                <th class="col-1">Примечания</th>
                                </tr>
                        </thead>
                        <tbody style="height:200px;" id="tableBody">
                            <?php
                               $message = "SELECT 
                                    date AS date,
                                    SUM(seam_distortion) AS seam_distortion, 
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
                                WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())
                                GROUP BY YEAR(date), MONTH(date), DAY(date)";
                                $link->set_charset("utf8");
                                $result = mysqli_query($link, $message);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row['date']."</td>";
                                    echo "<td>".$row['seam_distortion']."</td>";
                                        echo "<td>".$row['valve']."</td>";
                                        echo "<td>".$row['burn_through']."</td>";
                                        echo "<td>".$row['report_offset']."</td>";
                                        echo "<td>".$row['pen_hole']."</td>";
                                        echo "<td>".$row['appearance_of_the_powder']."</td>";
                                        echo "<td>".$row['marking']."</td>";
                                        echo "<td>".$row['correspondence']."</td>";
                                        echo "<td>".$row['packaging_defects']."</td>";
                                        echo "<td>".$row['sealing_the_valves']."</td>";
                                        echo "<td>".$row['valve_tear']."</td>";
                                        echo "<td>".$row['valve_misalignment']."</td>";
                                        echo "<td>".$row['corner_label']."</td>";
                                        echo "<td>".$row['corrugated_box_marking']."</td>";
                                    echo "<td>".$row['notes_total']."</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                    ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <fieldset class="form-group border card shadow-sm mt-2">
                <div class="table-responsive">
                    <table id="myTable" class="mt-2 table-hover table-bordered table table-sm ">
                        <thead>
                                <tr>
                                    <th class="col-1">Год</th>
                                <th class="col-1">Месяц</th>
                                <th class="col-1">Перекос шва (боковая часть пакета на линии сгиба)</th>
                                <th class="col-1">Клапана (не более 3 мм, при эстетичном товарном виде)</th>
                                <th class="col-1">Прожоги (продукт не высыпается), складки (не более 10 мм)</th>
                                <th class="col-1">Смещение рапорта(менее 10мм)</th>
                                <th class="col-1">Отверстие для ручки(непроруб 10-20мм)</th>
                                <th class="col-1">Внешний вид порошка</th>
                                <th class="col-1">Маркировка(нечеткая,некорректная или смещение)</th>
                                <th class="col-1">Соответствие IDN упаковки IDN ГП</th>
                                <th class="col-1">Дефекты упаковки после проведения дроп-теста</th>
                                <th class="col-1">Заклейка клапанов гофроящика</th>
                                <th class="col-1">Надрыв клапанов (до 10мм)</th>
                                <th class="col-1">Перекос клапанов (от 3-5мм)</th>
                                <th class="col-1">Угловая этикетка (соответствие ассортимента, слабая проклейка, складки)</th>
                                <th class="col-1">Маркировка гофроящика (нечеткая, некорректная или смещение)</th>
                                <th class="col-1">Примечания</th>
                                </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php
                                $message = "SELECT 
                                    YEAR(date) AS year,
                                    MONTH(date) AS month,
                                    SUM(seam_distortion) AS seam_distortion, 
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
                                WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())
                                GROUP BY YEAR(date), MONTH(date)";
                                $link->set_charset("utf8");
                                $result = mysqli_query($link, $message);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row['year']."</td>";
                                    echo "<td>".$row['month']."</td>";
                                        echo "<td>".$row['seam_distortion']."</td>";
                                        echo "<td>".$row['valve']."</td>";
                                        echo "<td>".$row['burn_through']."</td>";
                                        echo "<td>".$row['report_offset']."</td>";
                                        echo "<td>".$row['pen_hole']."</td>";
                                        echo "<td>".$row['appearance_of_the_powder']."</td>";
                                        echo "<td>".$row['marking']."</td>";
                                        echo "<td>".$row['correspondence']."</td>";
                                        echo "<td>".$row['packaging_defects']."</td>";
                                        echo "<td>".$row['sealing_the_valves']."</td>";
                                        echo "<td>".$row['valve_tear']."</td>";
                                        echo "<td>".$row['valve_misalignment']."</td>";
                                        echo "<td>".$row['corner_label']."</td>";
                                        echo "<td>".$row['corrugated_box_marking']."</td>";
                                    echo "<td>".$row['notes_total']."</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                    ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
    </body>
    <?php require('footer/footer.php') ?>
</html>