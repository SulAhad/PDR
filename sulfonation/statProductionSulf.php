<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['sulfirovanie'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
    <head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <body class="container">
        <div class="row">
            <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">Объем выпуска, т.
                <?php
                $message_acma = "SELECT DISTINCT date, SUM(plan) as plan FROM sulfirovanie WHERE plan > 0 GROUP BY date ORDER BY date";
                $message_fact = "SELECT DISTINCT date, SUM(fact) as fact FROM sulfirovanie WHERE fact > 0 GROUP BY date ORDER BY date";
                
                $link->set_charset("utf8");
                
                // Получение данных для графика "АКМА"
                $result_acma = mysqli_query($link, $message_acma);
                $label_acma = array();
                $data_acma = array();
                if ($result_acma->num_rows > 0) {
                    while ($row = $result_acma->fetch_assoc()) {
                        array_push($label_acma, $row["date"]);
                        if ($row["plan"] != 0) {
                            array_push($data_acma, $row["plan"]);
                        } else {
                            array_push($data_acma, null);
                        }
                    }
                }
                
                // Получение данных для графика "Факт"
                $result_fact = mysqli_query($link, $message_fact);
                $label_fact = array();
                $data_fact = array();
                if ($result_fact->num_rows > 0) {
                    while ($row = $result_fact->fetch_assoc()) {
                        array_push($label_fact, $row["date"]);
                        if ($row["fact"] != 0) {
                            array_push($data_fact, $row["fact"]);
                        } else {
                            array_push($data_fact, null);
                        }
                    }
                }
                ?>
                
                <script>
                    var labels_acma = <?php echo json_encode($label_acma); ?>;
                    var data_acma = <?php echo json_encode($data_acma); ?>;
                    var labels_fact = <?php echo json_encode($label_fact); ?>;
                    var data_fact = <?php echo json_encode($data_fact); ?>;
                </script>
                
                <canvas id="myChart"></canvas>
                
                <script>    
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_acma,
                            datasets: [{
                                label: 'План',
                                data: data_acma,
                                backgroundColor: 'rgb(85, 107, 47)',
                                borderColor: 'rgb(85, 107, 47)',
                                fill: false
                            }, {
                                label: 'Факт',
                                data: data_fact,
                                backgroundColor: 'rgb(255, 0, 0)',
                                borderColor: 'rgb(255, 0, 0)',
                                fill: false
                            }]
                        },
                        options: {}
                    });
                </script>
            </fieldset>
            <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                <div class="row">
                    <div class="col-md-6">
                        
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Неделя</th>
                                            <th>План, т</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $message = "SELECT WEEK(date) as week_num, ROUND(SUM(plan), 3) as total_plan FROM sulfirovanie GROUP BY week_num;";
                                        $link->set_charset("utf8");
                                        $result = mysqli_query($link, $message);
                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['week_num'] . "</td>";
                                            echo "<td>" . $row['total_plan'] . "</td>";
                                            
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Неделя</th>
                                            <th>Факт, т</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $message = "SELECT WEEK(date) as week_num, ROUND(SUM(fact), 3) as total_fact FROM sulfirovanie GROUP BY week_num;";
                                        $link->set_charset("utf8");
                                        $result = mysqli_query($link, $message);
                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['week_num'] . "</td>";
                                            echo "<td>" . $row['total_fact'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
                </div>   
            </fieldset>
            <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">Объём выпуска, т
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Месяц</th>
                                <th>План, т</th>
                                <th>Факт, т</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $message = "SELECT MONTH(date) AS datetime, 
                            ROUND(SUM(plan), 3) as plan_total, 
                            ROUND(SUM(fact), 3) as fact_total 
                        FROM sulfirovanie 
                        GROUP BY MONTH(date)";
                            $link->set_charset("utf8");
                            $result = mysqli_query($link, $message);
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>" . $row['datetime'] . "</td>";
                                echo "<td>" . $row['plan_total'] . "</td>";
                                echo "<td>" . $row['fact_total'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
            </fieldset>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
