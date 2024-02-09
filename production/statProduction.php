<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['production'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="container">
        <div class="row blur card shadow-sm">
            <div class="col-md-12">
                <div class="row">
                <p style="font-size:30px;">Объём выпуска, т</p>
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Месяц</th>
                                <th>План, т</th>
                                <th>Факт, т</th>
                                <th>Отклонение, т</th>
                                <th>Отклонение, %</th>
                                <th>Брак, т</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                                $message = "SELECT 
                                CASE 
                                    WHEN MONTH(p.datetime) = 1 THEN 'январь'
                                    WHEN MONTH(p.datetime) = 2 THEN 'февраль'
                                    WHEN MONTH(p.datetime) = 3 THEN 'март'
                                    WHEN MONTH(p.datetime) = 4 THEN 'апрель'
                                    WHEN MONTH(p.datetime) = 5 THEN 'май'
                                    WHEN MONTH(p.datetime) = 6 THEN 'июнь'
                                    WHEN MONTH(p.datetime) = 7 THEN 'июль'
                                    WHEN MONTH(p.datetime) = 8 THEN 'август'
                                    WHEN MONTH(p.datetime) = 9 THEN 'сентябрь'
                                    WHEN MONTH(p.datetime) = 10 THEN 'октябрь'
                                    WHEN MONTH(p.datetime) = 11 THEN 'ноябрь'
                                    WHEN MONTH(p.datetime) = 12 THEN 'декабрь'
                                END AS date,
                                ROUND(SUM(p.plan_team), 3) as plan, 
                                ROUND(SUM(p.fact_team), 3) as fact, 
                                ROUND((SUM(p.fact_team) - SUM(p.plan_team)) / SUM(p.plan_team) * 100, 2) as deviation_pct,
                                q.total_requests
                            FROM productionsms p
                            JOIN (
                                SELECT MONTH(date) AS month, ROUND(SUM(BrakQuality), 3) AS total_requests
                                FROM Quality_KPI
                                GROUP BY MONTH(date)
                            ) q ON MONTH(p.datetime) = q.month
                            GROUP BY MONTH(p.datetime)";
                                $link->set_charset("utf8");
                                $result = mysqli_query($link, $message);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['plan'] . "</td>";
                                    echo "<td>" . $row['fact'] . "</td>";
                                    echo "<td>" . ($row['fact'] - $row['plan']) . "</td>";
                                    echo "<td>" . $row['deviation_pct'] . " %" . "</td>";
                                    echo "<td>" . $row['total_requests'] . " т" . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row blur card shadow-sm mt-2">
            <p style="font-size:30px;">Недельный объём выпуска, т</p>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Календарная неделя</th>
                                            <th>План, т</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $message = "SELECT WEEK(datetime, 1) as calendar_week, ROUND(SUM(plan_team), 3) as total_plan FROM productionsms GROUP BY calendar_week;";
                                        $link->set_charset("utf8");
                                        $result = mysqli_query($link, $message);
                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['calendar_week'] . "</td>";
                                            echo "<td>" . $row['total_plan'] . "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Календарная неделя</th>
                                            <th>Факт, т</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $message = "SELECT WEEK(datetime, 1) as calendar_week, ROUND(SUM(fact_team), 3) as total_fact FROM productionsms GROUP BY calendar_week;";
                                        $link->set_charset("utf8");
                                        $result = mysqli_query($link, $message);
                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['calendar_week'] . "</td>";
                                            echo "<td>" . $row['total_fact'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row blur card shadow-sm mt-2">
            <div class="col-md-12">
                    <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">Объем выпуска, т.
                        <?php
                            $message_acma = "SELECT datetime, SUM(plan_team) as plan FROM productionsms GROUP BY datetime ORDER BY datetime";
                            $message_fact = "SELECT datetime, SUM(fact_team) as fact FROM productionsms GROUP BY datetime ORDER BY datetime";
                            $link->set_charset("utf8");
                            $result_acma = mysqli_query($link, $message_acma);
                            $label_acma = array();
                            $data_acma = array();
                            if ($result_acma->num_rows > 0) {
                                while ($row = $result_acma->fetch_assoc()) {
                                    array_push($label_acma, $row["datetime"]);
                                    if ($row["plan"] != 0) {
                                        array_push($data_acma, $row["plan"]);
                                    } else {
                                        array_push($data_acma, null);
                                    }
                                }
                            }
                            $result_fact = mysqli_query($link, $message_fact);
                            $label_fact = array();
                            $data_fact = array();
                            if ($result_fact->num_rows > 0) {
                                while ($row = $result_fact->fetch_assoc()) {
                                    array_push($label_fact, $row["datetime"]);
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
                                        backgroundColor: 'rgb(135, 206, 235)',
                                        borderColor: 'rgb(135, 206, 235)',
                                        fill: false
                                    }, {
                                        label: 'Факт',
                                        data: data_fact,
                                        backgroundColor: 'rgb(50, 205, 50)',
                                        borderColor: 'rgb(50, 205, 50)',
                                        fill: false
                                    }]
                                },
                                options: {}
                            });
                        </script>
                    </fieldset>
            </div>
        </div>
        <div class="row blur card shadow-sm mt-2">
            <p style="font-size:30px;">OEE, %</p>
            <div class="col-md-12">
                <fieldset class="form-group border p-2 card shadow-sm">
                            <?php
                                $message = "SELECT DATE(datetime) AS day, SUM(CAST(OEE_team AS DECIMAL(9,2))) AS total_requests
                                    FROM productionsms WHERE OEE_team > 0 GROUP BY day";
                                $link->set_charset("utf8");
                                $result =  mysqli_query( $link,  $message);
                                $row = mysqli_fetch_assoc($result);
                                // Создаем массивы для меток и данных
                                $labels = array();
                                $data = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                                        array_push($labels, $row["day"]);
                                        array_push($data, $row["total_requests"]);
                                    }
                                }
                            ?>
                            <script>
                                var labels = <?php echo json_encode($labels); ?>;
                                var data = <?php echo json_encode($data); ?>;
                                
                                var balance = Array(data.length).fill(96.0);
                            </script>
                            <canvas id="myChartOEE"></canvas>
                            <script>
                                var ctx = document.getElementById('myChartOEE').getContext('2d');
                                var chart = new Chart(ctx,
                                {
                                  type: 'line',
                                  data: {
                                    labels: labels,
                                    datasets: [
                                        {
                                            label: 'СМС',
                                            data: data,
                                            backgroundColor:'rgb(154, 205, 50)',
                                            borderColor: 'rgb(154, 205, 50)',
                                            fill: false

                                        },
                                       
                                        {
                                            label: 'цель OEE',
                                            data: balance,
                                            type: 'line',
                                            backgroundColor:'rgb(0, 255, 255)',
                                            borderColor: 'rgb(0, 255, 255)',
                                            fill: false

                                        }]
                                  },
                                  options: {}
                                });
                            </script>

                        </fieldset>
                        </div>
                    </div>
        <div class="row blur card shadow-sm mt-2">
            <p style="font-size:30px;">OEE по автоматам, %</p>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <?php
                            $message_innotech1_teamA = "SELECT DISTINCT datetime, innotech1 FROM productionsms WHERE innotech1 > 0 ORDER By datetime";
                            $link->set_charset("utf8");
                            $result_innotech1_teamA = mysqli_query($link, $message_innotech1_teamA);
                            $row_innotech1_teamA = mysqli_fetch_assoc($result_innotech1_teamA);
                            // Создаем массивы для меток и данных
                            $label_innotech1_teamA = array();
                            $data_innotech1_teamA = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result_innotech1_teamA->num_rows > 0)
                            {
                                while ($row_innotech1_teamA = $result_innotech1_teamA->fetch_assoc())
                                {
                                    array_push($label_innotech1_teamA, $row_innotech1_teamA["datetime"]);
                                    if ($row_innotech1_teamA["innotech1"] != 0)
                                    {
                                        array_push($data_innotech1_teamA, $row_innotech1_teamA["innotech1"]);
                                    } else
                                    {
                                        array_push($data_innotech1_teamA, null);
                                    }
                                }
                            }
                            ?>
                            <script>
                                var labels = <?php echo json_encode($label_innotech1_teamA); ?>;
                                var data_innotech1_teamA = <?php echo json_encode($data_innotech1_teamA); ?>;
                                var balance = Array(data.length).fill(96.0);
                            </script>
                            <canvas id="myChart_innotech1_teamA"></canvas>
                            <script>
                                var ctx = document.getElementById('myChart_innotech1_teamA').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                                label: 'Иннотех 1',
                                                data: data_innotech1_teamA,
                                                backgroundColor: 'rgb(233, 150, 122)',
                                                borderColor: 'rgb(233, 150, 122)',
                                                fill: false
                                            },
                                            {
                                                label: 'цель OEE',
                                                data: balance,
                                                type: 'line',
                                                backgroundColor: 'rgb(0, 255, 255)',
                                                borderColor: 'rgb(0, 255, 255)',
                                                fill: false
                                            }
                                        ]
                                    },
                                    options: {}
                                });
                            </script>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <?php
                            $message_innotech2_teamA = "SELECT DISTINCT datetime, innotech2 FROM productionsms WHERE innotech2 > 0 ORDER By datetime";
                                $link->set_charset("utf8");
                                $result_innotech2_teamA =  mysqli_query( $link,  $message_innotech2_teamA);
                                $row_innotech2_teamA = mysqli_fetch_assoc($result_innotech2_teamA);
                                // Создаем массивы для меток и данных
                                $label_innotech2_teamA = array();
                                $data_innotech2_teamA = array();
                                if ($result_innotech2_teamA->num_rows != 0)
                                {
                                    while ($row_innotech2_teamA = $result_innotech2_teamA->fetch_assoc())
                                    {
                                        array_push($label_innotech2_teamA, $row_innotech2_teamA["datetime"]);
                                        if ($row_innotech2_teamA["innotech2"] > 0)
                                        {
                                            array_push($data_innotech2_teamA, $row_innotech2_teamA["innotech2"]);
                                        }
                                        else
                                        {
                                            array_push($data_innotech2_teamA, null);
                                        }
                                    }
                                }
                            ?>
                            <script>
                                 var label_innotech2_teamA = <?php echo json_encode($label_innotech2_teamA); ?>;
                                var data_innotech2_teamA = <?php echo json_encode($data_innotech2_teamA); ?>;
                                var balance = Array(data.length).fill(96.0);
                            </script>
                            <canvas id="myChart_innotech2_teamA"></canvas>
                            <script>
                                var ctx = document.getElementById('myChart_innotech2_teamA').getContext('2d');
                                var chart = new Chart(ctx,
                                {
                                  type: 'line',
                                  data: {
                                    labels: label_innotech2_teamA,
                                    datasets: [
                                        {
                                            label: 'Иннотех 2',
                                            data: data_innotech2_teamA,
                                            backgroundColor:'rgb(255, 105, 180)',
                                            borderColor: 'rgb(255, 105, 180)',
                                            fill: false

                                        },
                                        {
                                            label: 'цель OEE',
                                            data: balance,
                                            type: 'line',
                                            backgroundColor:'rgb(0, 255, 255)',
                                            borderColor: 'rgb(0, 255, 255)',
                                            fill: false

                                        }]
                                  },
                                  options: {}
                                });
                            </script>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <?php
                            $message_innotech3_teamA = "SELECT DISTINCT datetime, innotech3 FROM productionsms WHERE innotech3 > 0 ORDER By datetime";
                                $link->set_charset("utf8");
                                $result_innotech3_teamA =  mysqli_query( $link,  $message_innotech3_teamA);
                                $row_innotech3_teamA = mysqli_fetch_assoc($result_innotech3_teamA);
                                // Создаем массивы для меток и данных
                                $label_innotech3_teamA = array();
                                $data_innotech3_teamA = array();
                                if ($result_innotech3_teamA->num_rows > 0)
                                {
                                    while ($row_innotech3_teamA = $result_innotech3_teamA->fetch_assoc())
                                    {
                                        array_push($label_innotech3_teamA, $row_innotech3_teamA["datetime"]);
                                        if ($row_innotech3_teamA["innotech3"] != 0)
                                        {
                                            array_push($data_innotech3_teamA, $row_innotech3_teamA["innotech3"]);
                                        }
                                        else
                                        {
                                            array_push($data_innotech3_teamA, null);
                                        }
                                    }
                                }
                            ?>
                            <script>
                                 var label_innotech3_teamA = <?php echo json_encode($label_innotech3_teamA); ?>;
                                var data_innotech3_teamA = <?php echo json_encode($data_innotech3_teamA); ?>;
                                var balance = Array(data.length).fill(96.0);
                            </script>
                            <canvas id="myChart_innotech3_teamA"></canvas>
                            <script>
                                var ctx = document.getElementById('myChart_innotech3_teamA').getContext('2d');
                                var chart = new Chart(ctx,
                                {
                                  type: 'line',
                                  data: {
                                    labels: label_innotech3_teamA,
                                    datasets: [
                                        {
                                            label: 'Иннотех 3',
                                            data: data_innotech3_teamA,
                                            backgroundColor:'rgb(255, 165, 0)',
                                            borderColor: 'rgb(255, 165, 0)',
                                            fill: false

                                        },
                                        {
                                            label: 'цель OEE',
                                            data: balance,
                                            type: 'line',
                                            backgroundColor:'rgb(0, 255, 255)',
                                            borderColor: 'rgb(0, 255, 255)',
                                            fill: false

                                        }]
                                  },
                                  options: {}
                                });
                            </script>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <?php
                            $message_uva4_teamA = "SELECT DISTINCT datetime, uva4 FROM productionsms WHERE uva4 > 0 ORDER By datetime";
                                $link->set_charset("utf8");
                                $result_uva4_teamA =  mysqli_query( $link,  $message_uva4_teamA);
                                $row_uva4_teamA = mysqli_fetch_assoc($result_uva4_teamA);
                                // Создаем массивы для меток и данных
                                $label_uva4_teamA = array();
                                $data_uva4_teamA = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($result_uva4_teamA->num_rows > 0)
                                {
                                    while ($row_uva4_teamA = $result_uva4_teamA->fetch_assoc())
                                    {
                                        array_push($label_uva4_teamA, $row_uva4_teamA["datetime"]);
                                        if ($row_uva4_teamA["uva4"] != 0)
                                        {
                                            array_push($data_uva4_teamA, $row_uva4_teamA["uva4"]);
                                        }
                                        else
                                        {
                                            array_push($data_uva4_teamA, null);
                                        }
                                    }
                                }
                            ?>
                            <script>
                                var label_uva4_teamA = <?php echo json_encode($label_uva4_teamA); ?>;
                                var data_uva4_teamA = <?php echo json_encode($data_uva4_teamA); ?>;
                                var balance = Array(data.length).fill(96.0);
                            </script>
                            <canvas id="myChart_uva4_teamA"></canvas>
                            <script>
                                var ctx = document.getElementById('myChart_uva4_teamA').getContext('2d');
                                var chart = new Chart(ctx,
                                {
                                  type: 'line',
                                  data: {
                                    labels: label_uva4_teamA,
                                    datasets: [
                                        {
                                            label: 'UVA 4',
                                            data: data_uva4_teamA,
                                            backgroundColor:'rgb(153, 50, 204)',
                                            borderColor: 'rgb(153, 50, 204)',
                                            fill: false

                                        },
                                        {
                                            label: 'цель OEE',
                                            data: balance,
                                            type: 'line',
                                            backgroundColor:'rgb(0, 255, 255)',
                                            borderColor: 'rgb(0, 255, 255)',
                                            fill: false

                                        }]
                                  },
                                  options: {}
                                });
                            </script>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <?php
                            $message_uva5_teamA = "SELECT DISTINCT datetime, uva5 FROM productionsms WHERE uva5 > 0 ORDER By datetime";
                                $link->set_charset("utf8");
                                $result_uva5_teamA =  mysqli_query( $link,  $message_uva5_teamA);
                                $row_uva5_teamA = mysqli_fetch_assoc($result_uva5_teamA);
                                // Создаем массивы для меток и данных
                                $label_uva5_teamA = array();
                                $data_uva5_teamA = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($result_uva5_teamA->num_rows > 0)
                                {
                                    while ($row_uva5_teamA = $result_uva5_teamA->fetch_assoc())
                                    {
                                        array_push($label_uva5_teamA, $row_uva5_teamA["datetime"]);
                                        if ($row_uva5_teamA["uva5"] != 0) {
                                            array_push($data_uva5_teamA, $row_uva5_teamA["uva5"]);
                                        }
                                        else
                                        {
                                            array_push($data_uva5_teamA, null);
                                        }
                                    }
                                }
                            ?>
                            <script>
                                var labels = <?php echo json_encode($label_uva5_teamA); ?>;
                                var data_uva5_teamA = <?php echo json_encode($data_uva5_teamA); ?>;
                                var balance = Array(data.length).fill(96.0);
                            </script>
                            <canvas id="myChart_uva5_teamA"></canvas>
                            <script>
                                var ctx = document.getElementById('myChart_uva5_teamA').getContext('2d');
                                var chart = new Chart(ctx,
                                {
                                  type: 'line',
                                  data: {
                                    labels: labels,
                                    datasets: [
                                        {
                                            label: 'UVA 5',
                                            data: data_uva5_teamA,
                                            backgroundColor:'rgb(0, 250, 154)',
                                            borderColor: 'rgb(0, 250, 154)',
                                            fill: false

                                        },
                                        {
                                            label: 'цель OEE',
                                            data: balance,
                                            type: 'line',
                                            backgroundColor:'rgb(0, 255, 255)',
                                            borderColor: 'rgb(0, 255, 255)',
                                            fill: false

                                        }]
                                  },
                                  options: {}
                                });
                            </script>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <?php
                            $message_acma_teamA = "SELECT DISTINCT datetime, acma FROM productionsms WHERE acma > 0 ORDER By datetime";
                                $link->set_charset("utf8");
                                $result_acma_teamA =  mysqli_query( $link,  $message_acma_teamA);
                                $row_acma_teamA = mysqli_fetch_assoc($result_acma_teamA);
                                // Создаем массивы для меток и данных
                                $label_acma_teamA = array();
                                $data_acma_teamA = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($result_acma_teamA->num_rows > 0)
                                {
                                    while ($row_acma_teamA = $result_acma_teamA->fetch_assoc())
                                    {
                                        array_push($label_acma_teamA, $row_acma_teamA["datetime"]);
                                        if ($row_acma_teamA["acma"] != 0)
                                        {
                                            array_push($data_acma_teamA, $row_acma_teamA["acma"]);
                                        }
                                        else
                                        {
                                            array_push($data_acma_teamA, null);
                                        }
                                    }
                                }
                            ?>
                            <script>
                                var labels = <?php echo json_encode($label_acma_teamA); ?>;
                                var data_acma_teamA = <?php echo json_encode($data_acma_teamA); ?>;
                                var balance = Array(data.length).fill(96.0);
                            </script>
                            <canvas id="myChart_acma_teamA"></canvas>
                            <script>
                                var ctx = document.getElementById('myChart_acma_teamA').getContext('2d');
                                var chart = new Chart(ctx,
                                {
                                  type: 'line',
                                  data: {
                                    labels: labels,
                                    datasets: [
                                        {
                                            label: 'АКМА',
                                            data: data_acma_teamA,
                                            backgroundColor:'rgb(85, 107, 47)',
                                            borderColor: 'rgb(85, 107, 47)',
                                            fill: false

                                        },
                                        {
                                            label: 'цель OEE',
                                            data: balance,
                                            type: 'line',
                                            backgroundColor:'rgb(0, 255, 255)',
                                            borderColor: 'rgb(0, 255, 255)',
                                            fill: false

                                        }]
                                  },
                                  options: {}
                                });
                            </script>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
                        