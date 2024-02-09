<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['premirovanie'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
// $message_max_percent = "SELECT * FROM settings_for_paids ORDER BY id DESC LIMIT 1";
// $link->set_charset("utf8");
// $result_max_percent = mysqli_query($link, $message_max_percent);
// while ($row = mysqli_fetch_assoc($result_max_percent))
// {
//     $max_percent = $row['max_percent'];
// }
$messageOEE = "SELECT * FROM Settings_KPI ORDER BY id DESC LIMIT 1";
$link->set_charset("utf8");
$resultOEE = mysqli_query($link, $messageOEE);
while ($row = mysqli_fetch_assoc($resultOEE))
{
    $oee = $row['targetOEE'];
}

$max_percent = 9;
$medium_percent = 6;
$min_percent = 3;

$target_inn1_2_max = 95.1;
$target_inn1_2_min = 94.1;

$target_inn3_4_max = 95.5;
$target_inn3_4_min = 94.5;

$target_uva5_max = 95.4;
$target_uva5_min = 94.4;

$target_acma_max = 91;
$target_acma_min = 90;

$target_total_max = 95.1;
$target_total_min = 94.1;
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="container">
        <div class="row blur card shadow-sm mt-2">
            <p style="font-size:30px;">Статистика по автоматам</p>
            <div class="col-md-12">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Год</th>
                                        <th>Месяц</th>
                                        <th>Автомат</th>
                                        <th>OEE, %</th>
                                        <th>Процент премии</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM innotech1
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Иннотех 1</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_inn1_2_max)
                                        {
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_inn1_2_max)
                                        {
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_inn1_2_min)
                                        {
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM innotech2
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Иннотех 2</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_inn1_2_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_inn1_2_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_inn1_2_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM innotech3
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Иннотех 3</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_inn3_4_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_inn3_4_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_inn3_4_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM uva4
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>UVA-4</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_inn3_4_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_inn3_4_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_inn3_4_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM uva5
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>UVA-5</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_uva5_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_uva5_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_uva5_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                     <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM acma
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>АКМА</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_acma_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_acma_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_acma_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                     <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM shrink
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Prasmatic</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_acma_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_acma_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_acma_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                     <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM pallet
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Паллетайзер</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_total_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_total_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_total_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                      <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM bunker
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Бункера</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_total_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_total_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_total_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                      <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM sushka
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Сушильная башня</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_total_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_total_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_total_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                      <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM bashnya
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Сухая нейтрализация</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_total_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_total_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_total_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                      <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM gazgen
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Газогенерация</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_total_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_total_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_total_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                      <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM prigotovlenie
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Приготовление</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_total_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_total_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_total_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                      <?php
                                    $message = "SELECT date, MONTH(date) as month, YEAR(date) as year, AVG(CASE WHEN oee <> 0 THEN oee END) as total_oee FROM postdobavki
                                    GROUP BY YEAR(date), MONTH(date)
                                    ORDER BY year, month;";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['year'] . "</td>";
                                        echo "<td>" . $row['month'] . "</td>";
                                        echo "<td>Постдобавки</td>";
                                        echo "<td>" . number_format($row['total_oee'], 2) . "</td>";
                                        if($row['total_oee'] >= $target_total_max){
                                            $adjusted_oee = $max_percent;
                                        }
                                        if($row['total_oee'] < $target_total_max){
                                            $adjusted_oee = $medium_percent;
                                        }
                                        if($row['total_oee'] < $target_total_min){
                                            $adjusted_oee = $min_percent;
                                        }
                                        echo "<td>" . number_format($adjusted_oee, 2) . " %</td>";
                                        echo "</tr>";
                                    }
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
