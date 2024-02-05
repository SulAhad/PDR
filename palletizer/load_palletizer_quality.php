<?php
require($_SERVER['DOCUMENT_ROOT'].'/connect_db.php');
$message = "SELECT SUM(open_box) AS total_open_box, 
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
        WHERE DATE(date) = CURDATE()";
$link->set_charset("utf8");
$result = mysqli_query($link, $message);
while($row = mysqli_fetch_assoc($result))
{
    echo"<tr>";
        echo "<td>Плохая проклейка короба, открытые бандероли</td>";
        echo "<td>$row[total_open_box]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Смещение угловой этикетки</td>";
        echo "<td>$row[total_label_offset]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Плохая проклейка угловой этикетки</td>";
        echo "<td>$row[total_bad_corner_label]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Смещение уголков</td>";
        echo "<td>$row[total_corner_offset]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Кривые/замятые уголки (в упаковке)</td>";
        echo "<td>$row[total_bad_corner]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Плохо считывается угловая этикетка</td>";
        echo "<td>$row[total_bad_read_corner_label]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Отсутствие верхнего листа на паллете</td>";
        echo "<td>$row[total_missing_top_sheet_on_pallet]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Несоответствие данных на этикетке PAGO</td>";
        echo "<td>$row[total_pago_label_inconsistency]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Брак стретч пленки</td>";
        echo "<td>$row[total_brak_stretch]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Дефекты поддона</td>";
        echo "<td>$row[total_pallet_defects]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Некорректная работа весов PAGO</td>";
        echo "<td>$row[total_incorrect_pago_scales]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Продукт,приходящий на паллетайзер соответствует нарабатываемому на автоматах</td>";
        echo "<td>$row[total_coming_pallets_correct]</td>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>Отклонение веса</td>";
        echo "<td>$row[total_weight_deviation]</td>";
    echo"</tr>";
    
    
    echo"<tr>";
    echo"    <th>Примечание</th>";
    echo"</tr>";
    echo"<tr>";
        echo "<td>$row[notes_total]</td>";
    echo"</tr>";
}
    ?>