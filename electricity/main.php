<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['safety'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
    <head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <style>
       .fontTr
       {
           font-size:12px;
       }
       p{
            margin: 1px;
            margin: 1em;
            font-size:12px;
        }
   </style>
    <body class="container-fluid">
        <div class="row card shadow-sm blur">
                <fieldset class="border card shadow-sm">
                    <div class="table-responsive">
                        <table class="table-hover table table-sm table-bordered">
                            <thead>
                                    <td class="col-1">Общее энергопотребление</td>
                                    <td class="col-1">Компрессорная</td>
                                    <td class="col-1">Котельная</td>
                                    <td class="col-1">Сульфирование</td>
                                    <td class="col-1">Лаборатория</td>
                                    <td class="col-1">СГП</td>
                                    <td class="col-1">Столовая</td>
                                    <td class="col-1">Сливная</td>
                                    <td class="col-1">Медпункт, РМЦ, мат склад</td>
                                    <td class="col-1">Кондиционеры АБК</td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>нет данных</td>
                                <?php
                                    $message = "SELECT SUM(xls5 + xls19 + xls20 + xls22) as total FROM electricity ORDER BY date ASC";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td style='font-size:30px;'>" . $row['total'] . "</td>";
                                    }
                                    $message = "SELECT SUM(xls14 + xls15) as total2 FROM electricity ORDER BY date ASC";
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td style='font-size:30px;'>" . $row['total2'] . "</td>";
                                    }
                                    $message = "SELECT SUM(xls6 + xls7 + xls8 + xls9 + xls10 + xls11 + xls12 + xls23) as sulf FROM electricity ORDER BY date ASC";
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td style='font-size:30px;'>" . $row['sulf'] . "</td>";
                                    }
                                    $message = "SELECT SUM(xls4) as laboratory FROM electricity ORDER BY date ASC";
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td style='font-size:30px;'>" . $row['laboratory'] . "</td>";
                                    }
                                    $message = "SELECT SUM(xls12 + xls13 + xls16) as sgp FROM electricity ORDER BY date ASC";
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td style='font-size:30px;'>" . $row['sgp'] . "</td>";
                                    }
                                    $message = "SELECT SUM(xls3) as stolovaya FROM electricity ORDER BY date ASC";
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td style='font-size:30px;'>" . $row['stolovaya'] . "</td>";
                                    }
                                    $message = "SELECT SUM(xls1 + xls2) as slivnaya FROM electricity ORDER BY date ASC";
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td style='font-size:30px;'>" . $row['slivnaya'] . "</td>";
                                    }
                                    $message = "SELECT SUM(xls18) as other FROM electricity ORDER BY date ASC";
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td style='font-size:30px;'>" . $row['other'] . "</td>";
                                    }
                                    $message = "SELECT SUM(xls17) as abk FROM electricity ORDER BY date ASC";
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td style='font-size:30px;'>" . $row['abk'] . "</td>";
                                    }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            <!-- ____________________________________________________________________________________________________________________________________ -->
            <div class="col-md-12">
                <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <fieldset class="form-group border card shadow-sm">
                    <div class="table-responsive">
                        <table id="myTable"class="table-hover table table-sm table-bordered">
                            <thead>
                            <tr style='font-size:12px;'>
                                        <td style='width:80px;'>1</td>
                                        <td style='width:80px;'>2</td>
                                        <td style='width:80px;'>3</td>
                                        <td style='width:80px;'>4</td>
                                        <td style='width:80px;'>5</td>
                                        <td style='width:80px;'>6</td>
                                        <td style='width:80px;'>7</td>
                                        <td style='width:80px;'>8</td>
                                        <td style='width:80px;'>9</td>
                                        <td style='width:80px;'>10</td>
                                        <td style='width:80px;'>11</td>
                                        <td style='width:80px;'>12</td>
                                        <td style='width:80px;'>13</td>
                                        <td style='width:80px;'>14</td>
                                        <td style='width:80px;'>15</td>
                                        <td style='width:80px;'>16</td>
                                        <td style='width:80px;'>17</td>
                                        <td style='width:80px;'>18</td>
                                        <td style='width:80px;'>19</td>
                                        <td style='width:80px;'>20</td>
                                        <td style='width:80px;'>21</td>
                                        <td style='width:80px;'>22</td>
                                        <td style='width:80px;'>23</td>
                                        <td style='width:80px;'>24</td>
                                    
                                </tr>
                                <tr style='font-size:12px;'>
                                        <td style='width:80px;'>Дата</td>
                                        <td style='width:80px;'>сливная ПР-9</td>
                                        <td style='width:80px;'>сливная ПР-10</td>
                                        <td style='width:80px;'>столовая ПР-1.2</td>
                                        <td style='width:80px;'>лаборатория</td>
                                        <td style='width:80px;'>компрессор 3.1.1</td>
                                        <td style='width:80px;'>воздуходувка 11К1</td>
                                        <td style='width:80px;'>ЗПП ввод1</td>
                                        <td style='width:80px;'>ЗПП ввод2</td>
                                        <td style='width:80px;'>1ПП водооборотка сульф</td>
                                        <td style='width:80px;'>2ПП водооборотка сульф</td>
                                        <td style='width:80px;'>воздуходувка 11К4</td>
                                        <td style='width:80px;'>СГП1-2 питание с ввода 1</td>
                                        <td style='width:80px;'>СГП1-2 питание с ввода 3</td>
                                        <td style='width:80px;'>учет котельная 1</td>
                                        <td style='width:80px;'>учет котельная 2</td>
                                        <td style='width:80px;'>ЗУ СГП</td>
                                        <td style='width:80px;'>Кондиционеры АБК</td>
                                        <td style='width:80px;'>мед пункт склад РМЦ</td>
                                        <td style='width:80px;'>3.1.3</td>
                                        <td style='width:80px;'>3.1.4</td>
                                        <td style='width:80px;'>4ПП</td>
                                        <td style='width:80px;'>осушитель</td>
                                        <td style='width:80px;'>холодильник </td>
                                    
                                </tr>
                            </thead>
                            <tbody onload="myFunction()" class="animate-bottom">
                                <?php
                                    $message = "SELECT * FROM electricity ORDER BY date ASC";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr >";
                                            echo "<td>$row[date]</td>";
                                            echo "<td>" . $row['xls1'] . "</td>";
                                            echo "<td>" . $row['xls2'] . "</td>";
                                            echo "<td>" . $row['xls3'] . "</td>";
                                            echo "<td>" . $row['xls4']  . "</td>";
                                            echo "<td>" . $row['xls5']  . "</td>";
                                            echo "<td>" . $row['xls6']  . "</td>";
                                            echo "<td>" . $row['xls7']  . "</td>";
                                            echo "<td>" . $row['xls8']  . "</td>";
                                            echo "<td>" . $row['xls9']  . "</td>";
                                            echo "<td>" . $row['xls10']  . "</td>";
                                            echo "<td>" . $row['xls11']  . "</td>";
                                            echo "<td>" . $row['xls12']  . "</td>";
                                            echo "<td>" . $row['xls13']  . "</td>";
                                            echo "<td>" . $row['xls14']  . "</td>";
                                            echo "<td>" . $row['xls15']  . "</td>";
                                            echo "<td>" . $row['xls16']  . "</td>";
                                            echo "<td>" . $row['xls17']  . "</td>";
                                            echo "<td>" . $row['xls18']  . "</td>";
                                            echo "<td>" . $row['xls19']  . "</td>";
                                            echo "<td>" . $row['xls20']  . "</td>";
                                            echo "<td>" . $row['xls21']  . "</td>";
                                            echo "<td>" . $row['xls22']  . "</td>";
                                            echo "<td>" . $row['xls23']  . "</td>";
                                        echo "</tr>";
                                        }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
