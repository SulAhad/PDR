<?php require($_SERVER['DOCUMENT_ROOT'].'/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /bridge.php');}
if($_SESSION['palletizer'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
    <head><?php require($_SERVER['DOCUMENT_ROOT'].'/head.php');?></head>
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
                                <th class="col-1">Открытые коробки</th>
                                <th class="col-1">Смещение этикеток</th>
                                <th class="col-1">Некачественные углы этикеток</th>
                                <th class="col-1">Смещение уголков</th>
                                <th class="col-1">Некачественные уголки</th>
                                <th class="col-1">Некорректное чтение угловых этикеток</th>
                                <th class="col-1">Отсутствие верхнего листа на паллете</th>
                                <th class="col-1">Несоответствие этикеток Pago</th>
                                <th class="col-1">Брак стретч плёнки</th>
                                <th class="col-1">Дефекты паллет</th>
                                <th class="col-1">Некорректные весы Pago</th>
                                <th class="col-1">Продукт,соответствует нарабатываемому на автоматах</th>
                                <th class="col-1">Отклонение веса</th>
                                <th class="col-1">Примечания</th>
                                </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php
                                $message = "SELECT 
                                    date AS date,
                                    SUM(open_box) AS total_open_box, 
                                    SUM(label_offset) AS total_label_offset,
                                    SUM(bad_corner_label) AS total_bad_corner_label,
                                    SUM(corner_offset) AS total_corner_offset,
                                    SUM(bad_corner) AS total_bad_corner,
                                    SUM(bad_read_corner_label) AS total_bad_read_corner_label,
                                    SUM(missing_top_sheet_on_pallet) AS total_missing_top_sheet_on_pallet,
                                    SUM(pago_label_inconsistency) AS total_pago_label_inconsistency,
                                    SUM(brak_stretch) AS total_brak_stretch,
                                    SUM(pallet_defects) AS total_pallet_defects,
                                    SUM(incorrect_pago_scales) AS total_incorrect_pago_scales,
                                    SUM(coming_pallets_correct) AS total_coming_pallets_correct,
                                    SUM(weight_deviation) AS total_weight_deviation,
                                    GROUP_CONCAT(CASE WHEN notes <> '' THEN notes END SEPARATOR ', ') AS notes_total
                                FROM palletizer_quality
                                WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())
                                GROUP BY date ORDER BY date desc";
                                $link->set_charset("utf8");
                                $result = mysqli_query($link, $message);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                        echo "<td>".$row['date']."</td>";
                                        echo "<td".($row['total_open_box']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_open_box']."</td>";
                                        echo "<td".($row['total_label_offset']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_label_offset']."</td>";
                                        echo "<td".($row['total_bad_corner_label']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_bad_corner_label']."</td>";
                                        echo "<td".($row['total_corner_offset']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_corner_offset']."</td>";
                                        echo "<td".($row['total_bad_corner']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_bad_corner']."</td>";
                                        echo "<td".($row['total_bad_read_corner_label']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_bad_read_corner_label']."</td>";
                                        echo "<td".($row['total_missing_top_sheet_on_pallet']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_missing_top_sheet_on_pallet']."</td>";
                                        echo "<td".($row['total_pago_label_inconsistency']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_pago_label_inconsistency']."</td>";
                                        echo "<td".($row['total_brak_stretch']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_brak_stretch']."</td>";
                                        echo "<td".($row['total_pallet_defects']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_pallet_defects']."</td>";
                                        echo "<td".($row['total_incorrect_pago_scales']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_incorrect_pago_scales']."</td>";
                                        echo "<td".($row['total_coming_pallets_correct']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_coming_pallets_correct']."</td>";
                                        echo "<td".($row['total_weight_deviation']>0 ? " style='background-color: lightcoral;'" : "").">".$row['total_weight_deviation']."</td>";
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
                                <th class="col-1">Открытые коробки</th>
                                <th class="col-1">Смещение этикеток</th>
                                <th class="col-1">Некачественные углы этикеток</th>
                                <th class="col-1">Смещение уголков</th>
                                <th class="col-1">Некачественные уголки</th>
                                <th class="col-1">Некорректное чтение угловых этикеток</th>
                                <th class="col-1">Отсутствие верхнего листа на паллете</th>
                                <th class="col-1">Несоответствие этикеток Pago</th>
                                <th class="col-1">Брак стретч плёнки</th>
                                <th class="col-1">Дефекты паллет</th>
                                <th class="col-1">Некорректные весы Pago</th>
                                <th class="col-1">Продукт,соответствует нарабатываемому на автоматах</th>
                                <th class="col-1">Отклонение веса</th>
                                <th class="col-1">Примечания</th>
                                </tr>
                        </thead>
                        <tbody style="height:200px;" id="tableBody">
                            <?php
                               $message = "SELECT 
                                    date AS date,
                                    SUM(open_box) AS total_open_box, 
                                    SUM(label_offset) AS total_label_offset,
                                    SUM(bad_corner_label) AS total_bad_corner_label,
                                    SUM(corner_offset) AS total_corner_offset,
                                    SUM(bad_corner) AS total_bad_corner,
                                    SUM(bad_read_corner_label) AS total_bad_read_corner_label,
                                    SUM(missing_top_sheet_on_pallet) AS total_missing_top_sheet_on_pallet,
                                    SUM(pago_label_inconsistency) AS total_pago_label_inconsistency,
                                    SUM(brak_stretch) AS total_brak_stretch,
                                    SUM(pallet_defects) AS total_pallet_defects,
                                    SUM(incorrect_pago_scales) AS total_incorrect_pago_scales,
                                    SUM(coming_pallets_correct) AS total_coming_pallets_correct,
                                    SUM(weight_deviation) AS total_weight_deviation,
                                    GROUP_CONCAT(CASE WHEN notes <> '' THEN notes END SEPARATOR ', ') AS notes_total
                                FROM palletizer_quality
                                WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())
                                GROUP BY YEAR(date), MONTH(date), DAY(date)";
                                $link->set_charset("utf8");
                                $result = mysqli_query($link, $message);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row['date']."</td>";
                                    echo "<td>".$row['total_open_box']."</td>";
                                    echo "<td>".$row['total_label_offset']."</td>";
                                    echo "<td>".$row['total_bad_corner_label']."</td>";
                                    echo "<td>".$row['total_corner_offset']."</td>";
                                    echo "<td>".$row['total_bad_corner']."</td>";
                                    echo "<td>".$row['total_bad_read_corner_label']."</td>";
                                    echo "<td>".$row['total_missing_top_sheet_on_pallet']."</td>";
                                    echo "<td>".$row['total_pago_label_inconsistency']."</td>";
                                    echo "<td>".$row['total_brak_stretch']."</td>";
                                    echo "<td>".$row['total_pallet_defects']."</td>";
                                    echo "<td>".$row['total_incorrect_pago_scales']."</td>";
                                    echo "<td>".$row['total_coming_pallets_correct']."</td>";
                                    echo "<td>".$row['total_weight_deviation']."</td>";
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
                                <th class="col-1">Открытые коробки</th>
                                <th class="col-1">Смещение этикеток</th>
                                <th class="col-1">Некачественные углы этикеток</th>
                                <th class="col-1">Смещение уголков</th>
                                <th class="col-1">Некачественные уголки</th>
                                <th class="col-1">Некорректное чтение угловых этикеток</th>
                                <th class="col-1">Отсутствие верхнего листа на паллете</th>
                                <th class="col-1">Несоответствие этикеток Pago</th>
                                <th class="col-1">Брак стретч плёнки</th>
                                <th class="col-1">Дефекты паллет</th>
                                <th class="col-1">Некорректные весы Pago</th>
                                <th class="col-1">Продукт,соответствует нарабатываемому на автоматах</th>
                                <th class="col-1">Отклонение веса</th>
                                <th class="col-1">Примечания</th>
                                </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php
                                $message = "SELECT 
                                    YEAR(date) AS year,
                                    MONTH(date) AS month,
                                    SUM(open_box) AS total_open_box, 
                                    SUM(label_offset) AS total_label_offset,
                                    SUM(bad_corner_label) AS total_bad_corner_label,
                                    SUM(corner_offset) AS total_corner_offset,
                                    SUM(bad_corner) AS total_bad_corner,
                                    SUM(bad_read_corner_label) AS total_bad_read_corner_label,
                                    SUM(missing_top_sheet_on_pallet) AS total_missing_top_sheet_on_pallet,
                                    SUM(pago_label_inconsistency) AS total_pago_label_inconsistency,
                                    SUM(brak_stretch) AS total_brak_stretch,
                                    SUM(pallet_defects) AS total_pallet_defects,
                                    SUM(incorrect_pago_scales) AS total_incorrect_pago_scales,
                                    SUM(coming_pallets_correct) AS total_coming_pallets_correct,
                                    SUM(weight_deviation) AS total_weight_deviation,
                                    GROUP_CONCAT(CASE WHEN notes <> '' THEN notes END SEPARATOR ', ') AS notes_total
                                FROM palletizer_quality
                                WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())
                                GROUP BY YEAR(date), MONTH(date)";
                                $link->set_charset("utf8");
                                $result = mysqli_query($link, $message);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row['year']."</td>";
                                    echo "<td>".$row['month']."</td>";
                                    echo "<td>".$row['total_open_box']."</td>";
                                    echo "<td>".$row['total_label_offset']."</td>";
                                    echo "<td>".$row['total_bad_corner_label']."</td>";
                                    echo "<td>".$row['total_corner_offset']."</td>";
                                    echo "<td>".$row['total_bad_corner']."</td>";
                                    echo "<td>".$row['total_bad_read_corner_label']."</td>";
                                    echo "<td>".$row['total_missing_top_sheet_on_pallet']."</td>";
                                    echo "<td>".$row['total_pago_label_inconsistency']."</td>";
                                    echo "<td>".$row['total_brak_stretch']."</td>";
                                    echo "<td>".$row['total_pallet_defects']."</td>";
                                    echo "<td>".$row['total_incorrect_pago_scales']."</td>";
                                    echo "<td>".$row['total_coming_pallets_correct']."</td>";
                                    echo "<td>".$row['total_weight_deviation']."</td>";
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
    <?php require($_SERVER['DOCUMENT_ROOT'].'/footer/footer.php'); ?>
</html>