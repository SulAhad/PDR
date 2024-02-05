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
                    <div class="col-md-3">
                        <?php
                            $message = "SELECT MONTH(date) AS date, SUM(plan_teamA) AS plan, SUM(fact_teamA) AS fact, SUM(deviation) AS deviation FROM Production_KPI WHERE MONTH(date) = 8";
                            require('../production/TableTotalFactPlan.php');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?php
                            $message = "SELECT MONTH(date) AS date, SUM(plan_teamA) AS plan, SUM(fact_teamA) AS fact, SUM(deviation) AS deviation FROM Production_KPI WHERE MONTH(date) = 9";
                            require('../production/TableTotalFactPlan.php');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?php
                            $message = "SELECT MONTH(date) AS date, SUM(plan_teamA) AS plan, SUM(fact_teamA) AS fact, SUM(deviation) AS deviation FROM Production_KPI WHERE MONTH(date) = 10";
                            require('../production/TableTotalFactPlan.php');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?php
                            $message = "SELECT MONTH(date) AS date, SUM(plan_teamA) AS plan, SUM(fact_teamA) AS fact, SUM(deviation) AS deviation FROM Production_KPI WHERE MONTH(date) = 11";
                            require('../production/TableTotalFactPlan.php');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?php
                            $message = "SELECT MONTH(date) AS date, SUM(plan_teamA) AS plan, SUM(fact_teamA) AS fact, SUM(deviation) AS deviation FROM Production_KPI WHERE MONTH(date) = 12";
                            require('../production/TableTotalFactPlan.php');
                        ?>
                    </div>
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
                                            <th>Неделя</th>
                                            <th>План, т</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $message = "SELECT WEEK(date) as week_num, ROUND(SUM(plan_teamA), 3) as total_plan FROM Production_KPI WHERE MONTH(date) IN (8, 9, 10, 11, 12) GROUP BY week_num;";
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
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
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
                                        $message = "SELECT WEEK(date) as week_num, ROUND(SUM(fact_teamA), 3) as total_fact FROM Production_KPI WHERE MONTH(date) IN (8, 9, 10, 11, 12) GROUP BY week_num;";
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
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row blur card shadow-sm mt-2">
            <p style="font-size:30px;">Объем выпуска СМС, т</p>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                                <?php
                                    $message_plan = "SELECT DISTINCT date, plan_teamA as plan FROM Production_KPI WHERE plan_teamA IS NOT NULL AND plan_teamA != 0";
                                    $link->set_charset("utf8");
                                    $result_plan =  mysqli_query( $link,  $message_plan);
                                    $row_plan = mysqli_fetch_assoc($result_plan);
                                    // Создаем массивы для меток и данных
                                    $label_plan = array();
                                    $data_plan = array();
                                if ($result_plan->num_rows > 0)
                                {while ($row_plan = $result_plan->fetch_assoc())
                                    {array_push($label_plan, $row_plan["date"]);
                                        if ($row_plan["plan"] != 0)
                                        {array_push($data_plan, $row_plan["plan"]);}
                                        else {array_push($data_plan, null);}}}?>
                                <script>
                                    var labels = <?php echo json_encode($label_plan); ?>;
                                    var data = <?php echo json_encode($data_plan); ?>;
                                </script>
                                <canvas id="myChartplan"></canvas>
                                <script>
                                  var ctx = document.getElementById('myChartplan').getContext('2d');
                                  var data = {
                                    labels: <?php echo json_encode($label_plan); ?>,
                                    datasets: [{
                                      label: 'План',
                                      data: <?php echo json_encode($data_plan); ?>,
                                      backgroundColor: 'rgb(240, 128, 128)',
                                      borderColor: 'rgb(240, 128, 128)',
                                      fill: false
                                    }]
                                  };
                                  var options = {
                                    scales: {
                                      yAxes: [{
                                        ticks: {
                                          beginAtZero: true
                                        }
                                      }]
                                    },
                                    plugins: {
                                      datalabels: {
                                        anchor: 'end',
                                        align: 'top',
                                        formatter: function(value, context) {
                                          if (value != null) {
                                            return value;
                                          } else {
                                            return '';
                                          }
                                        }
                                      }
                                    }
                                  };
                                  var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: data,
                                    options: options
                                  });
                                </script>
                            </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                                <?php
                                    $message = "SELECT DISTINCT date, fact_teamA as fact FROM Production_KPI WHERE fact_teamA IS NOT NULL AND fact_teamA != 0";
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
                                        array_push($labels, $row["date"]);
                                        array_push($data, floatval($row["fact"]));
                                      }
                                    }
                                ?>
                                <script>
                                    var labels = <?php echo json_encode($labels); ?>;
                                    var data = <?php echo json_encode($data); ?>;
                                </script>
                                <canvas id="myChartfact"></canvas>
                                <script>
                                    var ctx = document.getElementById('myChartfact').getContext('2d');
                                    var chart = new Chart(ctx,
                                    {
                                        type: 'line',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: 'Факт',
                                                data: data,
                                                backgroundColor:'rgb(50, 205, 50)',
                                                borderColor: 'rgb(50, 205, 50)',
                                                fill: false
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row blur card shadow-sm mt-2">
            <p style="font-size:30px;">Объем выпуска СМС, т</p>
            <fieldset class="form-group border p-2 card shadow-sm">
                <?php
                    $message = "SELECT DISTINCT date, plan_teamA as plan FROM Production_KPI WHERE plan_teamA > 0 ORDER BY date";
                    $link->set_charset("utf8");
                    $result = mysqli_query($link, $message);

                    $labels = array();
                    $data = array();

                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            array_push($labels, $row["date"]);
                            if ($row["plan"] > 0) {
                                array_push($data, $row["plan"]);
                            } else {
                                array_push($data, null);
                            }
                        }
                    }

                    $messages = "SELECT DISTINCT date, fact_teamA as fact FROM Production_KPI WHERE fact_teamA > 0 ORDER BY date";
                    $link->set_charset("utf8");
                    $results = mysqli_query($link, $messages);

                    $labelset = array();
                    $dataset = array();

                    if ($results->num_rows > 0) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            array_push($labelset, $rows["date"]);
                            if ($rows["fact"] > 0) {
                                array_push($dataset, $rows["fact"]);
                            } else {
                                array_push($dataset, null);
                            }
                        }
                    }
                    ?>

                    <canvas id="myChartALL"></canvas>

                    <script>
                        var labels = <?php echo json_encode($labels); ?>;
                        var data = <?php echo json_encode($data); ?>;
                        var labelset = <?php echo json_encode($labelset); ?>;
                        var dataset = <?php echo json_encode($dataset); ?>;
                        var balance = Array(data.length).fill(52200);

                        var ctx = document.getElementById('myChartALL').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labelset,
                                datasets: [
                                    {
                                        label: 'План',
                                        data: data,
                                        backgroundColor: 'rgb(135, 206, 235)',
                                        borderColor: 'rgb(135, 206, 235)',
                                        fill: false
                                    },
                                    {
                                        label: 'Факт',
                                        data: dataset,
                                        backgroundColor: 'rgb(50, 205, 50)',
                                        borderColor: 'rgb(50, 205, 50)',
                                        fill: false
                                    }
                                ]
                            },
                            options: {}
                        });
                    </script>
                    <div class="col-md-12">

                </div>
            </fieldset>
        </div>
        <div class="row blur card shadow-sm mt-2">
            <p style="font-size:30px;">OEE, %</p>
            <fieldset class="form-group border p-2 card shadow-sm">
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(CAST(OEE_teamA AS DECIMAL(9,2))) AS total_requests
                                    FROM Production_KPI WHERE OEE_teamA > 0 GROUP BY day";
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
                                $messages = "SELECT DATE(date) AS day, SUM(CAST(oee_teamB AS DECIMAL(9,2))) AS total_requests
                                    FROM Production_KPI  WHERE OEE_teamB > 0 GROUP BY day";
                                $link->set_charset("utf8");
                                $results =  mysqli_query( $link,  $messages);
                                $rows = mysqli_fetch_assoc($results);
                                // Создаем массивы для меток и данных
                                $labelset = array();
                                $dataset = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($results->num_rows > 0)
                                {
                                    while($rows = $results->fetch_assoc())
                                    {
                                        array_push($labelset, $rows["day"]);
                                        array_push($dataset, $rows["total_requests"]);
                                    }
                                }
                            ?>
                            <script>
                                var labels = <?php echo json_encode($labels); ?>;
                                var data = <?php echo json_encode($data); ?>;
                                var labelset = <?php echo json_encode($labelset); ?>;
                                var dataset = <?php echo json_encode($dataset); ?>;
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
                                        /*{
                                            label: 'Смена Б',
                                            data: dataset,
                                            backgroundColor:'rgb(50, 205, 50)',
                                            borderColor: 'rgb(50, 205, 50)',
                                            fill: false

                                        },*/
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
        <div class="row blur card shadow-sm mt-2">
            <p style="font-size:30px;">OEE по автоматам, %</p>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                            <?php
                            $message_innotech1_teamA = "SELECT DISTINCT date, innotech1_teamA FROM Production_KPI WHERE innotech1_teamA > 0 ORDER By date";
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
                                    array_push($label_innotech1_teamA, $row_innotech1_teamA["date"]);
                                    if ($row_innotech1_teamA["innotech1_teamA"] != 0)
                                    {
                                        array_push($data_innotech1_teamA, $row_innotech1_teamA["innotech1_teamA"]);
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
                            $message_innotech2_teamA = "SELECT DISTINCT date, innotech2_teamA FROM Production_KPI WHERE innotech2_teamA > 0 ORDER By date";
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
                                        array_push($label_innotech2_teamA, $row_innotech2_teamA["date"]);
                                        if ($row_innotech2_teamA["innotech2_teamA"] > 0)
                                        {
                                            array_push($data_innotech2_teamA, $row_innotech2_teamA["innotech2_teamA"]);
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
                            $message_innotech3_teamA = "SELECT DISTINCT date, innotech3_teamA FROM Production_KPI WHERE innotech3_teamA > 0 ORDER By date";
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
                                        array_push($label_innotech3_teamA, $row_innotech3_teamA["date"]);
                                        if ($row_innotech3_teamA["innotech3_teamA"] != 0)
                                        {
                                            array_push($data_innotech3_teamA, $row_innotech3_teamA["innotech3_teamA"]);
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
                            $message_uva4_teamA = "SELECT DISTINCT date, uva4_teamA FROM Production_KPI WHERE uva4_teamA > 0 ORDER By date";
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
                                        array_push($label_uva4_teamA, $row_uva4_teamA["date"]);
                                        if ($row_uva4_teamA["uva4_teamA"] != 0)
                                        {
                                            array_push($data_uva4_teamA, $row_uva4_teamA["uva4_teamA"]);
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
                            $message_uva5_teamA = "SELECT DISTINCT date, uva5_teamA FROM Production_KPI WHERE uva5_teamA > 0 ORDER By date";
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
                                        array_push($label_uva5_teamA, $row_uva5_teamA["date"]);
                                        if ($row_uva5_teamA["uva5_teamA"] != 0) {
                                            array_push($data_uva5_teamA, $row_uva5_teamA["uva5_teamA"]);
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
                            $message_acma_teamA = "SELECT DISTINCT date, acma_teamA FROM Production_KPI WHERE acma_teamA > 0 ORDER By date";
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
                                        array_push($label_acma_teamA, $row_acma_teamA["date"]);
                                        if ($row_acma_teamA["acma_teamA"] != 0)
                                        {
                                            array_push($data_acma_teamA, $row_acma_teamA["acma_teamA"]);
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

        <!--<div class="row bg-light card shadow-sm mt-4">
            <p style="font-size:30px;">OEE Смена Б</p>
            <fieldset class="form-group border p-2 card shadow-sm">
                            <?php
                                $message_innotech1_teamB = "SELECT DATE(date) AS day, SUM(CAST(innotech1_teamB AS DECIMAL(9,2))) AS total_requests
                                    FROM Production_KPI GROUP BY day";
                                $link->set_charset("utf8");
                                $result_innotech1_teamB =  mysqli_query( $link,  $message_innotech1_teamB);
                                $row_innotech1_teamB = mysqli_fetch_assoc($result_innotech1_teamB);
                                // Создаем массивы для меток и данных
                                $label_innotech1_teamB = array();
                                $data_innotech1_teamB = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($result_innotech1_teamB->num_rows > 0)
                                {
                                    while($row_innotech1_teamB = $result_innotech1_teamB->fetch_assoc())
                                    {
                                        array_push($label_innotech1_teamB, $row_innotech1_teamB["day"]);
                                        array_push($data_innotech1_teamB, $row_innotech1_teamB["total_requests"]);
                                    }
                                }
                                $message_innotech2_teamB = "SELECT DATE(date) AS day, SUM(CAST(innotech2_teamB AS DECIMAL(9,2))) AS total_requests
                                    FROM Production_KPI GROUP BY day";
                                $link->set_charset("utf8");
                                $result_innotech2_teamB =  mysqli_query( $link,  $message_innotech2_teamB);
                                $row_innotech2_teamB = mysqli_fetch_assoc($result_innotech2_teamB);
                                // Создаем массивы для меток и данных
                                $label_innotech2_teamB = array();
                                $data_innotech2_teamB = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($result_innotech2_teamB->num_rows > 0)
                                {
                                    while($row_innotech2_teamB = $result_innotech2_teamB->fetch_assoc())
                                    {
                                        array_push($label_innotech2_teamB, $row_innotech2_teamB["day"]);
                                        array_push($data_innotech2_teamB, $row_innotech2_teamB["total_requests"]);
                                    }
                                }
                                $message_innotech3_teamB = "SELECT DATE(date) AS day, SUM(CAST(innotech3_teamB AS DECIMAL(9,2))) AS total_requests
                                    FROM Production_KPI GROUP BY day";
                                $link->set_charset("utf8");
                                $result_innotech3_teamB =  mysqli_query( $link,  $message_innotech3_teamB);
                                $row_innotech3_teamB = mysqli_fetch_assoc($result_innotech3_teamB);
                                // Создаем массивы для меток и данных
                                $label_innotech3_teamB = array();
                                $data_innotech3_teamB = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($result_innotech3_teamB->num_rows > 0)
                                {
                                    while($row_innotech3_teamB = $result_innotech3_teamB->fetch_assoc())
                                    {
                                        array_push($label_innotech3_teamB, $row_innotech3_teamB["day"]);
                                        array_push($data_innotech3_teamB, $row_innotech3_teamB["total_requests"]);
                                    }
                                }
                                $message_uva4_teamB = "SELECT DATE(date) AS day, SUM(CAST(uva4_teamB AS DECIMAL(9,2))) AS total_requests
                                    FROM Production_KPI GROUP BY day";
                                $link->set_charset("utf8");
                                $result_uva4_teamB =  mysqli_query( $link,  $message_uva4_teamB);
                                $row_uva4_teamB = mysqli_fetch_assoc($result_uva4_teamB);
                                // Создаем массивы для меток и данных
                                $label_uva4_teamB = array();
                                $data_uva4_teamB = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($result_uva4_teamB->num_rows > 0)
                                {
                                    while($row_uva4_teamB = $result->fetch_assoc())
                                    {
                                        array_push($label_uva4_teamB, $row_uva4_teamB["day"]);
                                        array_push($data_uva4_teamB, $row_uva4_teamB["total_requests"]);
                                    }
                                }
                                $message_uva5_teamB = "SELECT DATE(date) AS day, SUM(CAST(uva5_teamB AS DECIMAL(9,2))) AS total_requests
                                    FROM Production_KPI GROUP BY day";
                                $link->set_charset("utf8");
                                $result_uva5_teamB =  mysqli_query( $link,  $message_uva5_teamB);
                                $row_uva5_teamB = mysqli_fetch_assoc($result_uva5_teamB);
                                // Создаем массивы для меток и данных
                                $label_uva5_teamB = array();
                                $data_uva5_teamB = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($result_uva5_teamB->num_rows > 0)
                                {
                                    while($row_uva5_teamB = $result_uva5_teamB->fetch_assoc())
                                    {
                                        array_push($label_uva5_teamB, $row_uva5_teamB["day"]);
                                        array_push($data_uva5_teamB, $row_uva5_teamB["total_requests"]);
                                    }
                                }
                                $message_acma_teamB = "SELECT DATE(date) AS day, SUM(CAST(acma_teamB AS DECIMAL(9,2))) AS total_requests
                                    FROM Production_KPI GROUP BY day";
                                $link->set_charset("utf8");
                                $result_acma_teamB =  mysqli_query( $link,  $message_acma_teamB);
                                $row_acma_teamB = mysqli_fetch_assoc($result_acma_teamB);
                                // Создаем массивы для меток и данных
                                $label_acma_teamB = array();
                                $data_acma_teamB = array();
                                // Обрабатываем результаты запроса и заполняем массивы
                                if ($result_acma_teamB->num_rows > 0)
                                {
                                    while($row_acma_teamB = $result_acma_teamB->fetch_assoc())
                                    {
                                        array_push($label_acma_teamB, $row_acma_teamB["day"]);
                                        array_push($data_acma_teamB, $row_acma_teamB["total_requests"]);
                                    }
                                }
                            ?>
                            <script>
                                var labels = <?php echo json_encode($labels); ?>;
                                var data_innotech1_teamB = <?php echo json_encode($data_innotech1_teamB); ?>;

                                var label_innotech2_teamB = <?php echo json_encode($label_innotech2_teamB); ?>;
                                var data_innotech2_teamB = <?php echo json_encode($data_innotech2_teamB); ?>;

                                var label_innotech3_teamB = <?php echo json_encode($label_innotech3_teamB); ?>;
                                var data_innotech3_teamB = <?php echo json_encode($data_innotech3_teamB); ?>;

                                var label_uva4_teamB = <?php echo json_encode($label_uva4_teamB); ?>;
                                var data_uva4_teamB = <?php echo json_encode($data_uva4_teamB); ?>;

                                var label_uva5_teamB = <?php echo json_encode($label_uva5_teamB); ?>;
                                var data_uva5_teamB = <?php echo json_encode($data_uva5_teamB); ?>;

                                var label_acma_teamB = <?php echo json_encode($label_acma_teamB); ?>;
                                var data_acma_teamB = <?php echo json_encode($data_acma_teamB); ?>;
                                var balance = Array(data.length).fill(96.0);
                            </script>
                            <canvas id="myChartAll_TeamB"></canvas>
                            <script>
                                var ctx = document.getElementById('myChartAll_TeamB').getContext('2d');
                                var chart = new Chart(ctx,
                                {
                                  type: 'line',
                                  data: {
                                    labels: labels,
                                    datasets: [
                                        {
                                            label: 'Иннотех 1',
                                            data: data_innotech1_teamB,
                                            backgroundColor:'rgb(205, 92, 92)',
                                            borderColor: 'rgb(205, 92, 92)',
                                            fill: false

                                        },
                                        {
                                            label: 'Иннотех 2',
                                            data: data_innotech2_teamB,
                                            backgroundColor:'rgb(220, 20, 60)',
                                            borderColor: 'rgb(220, 20, 60)',
                                            fill: false

                                        },
                                        {
                                            label: 'Иннотех 3',
                                            data: data_innotech3_teamB,
                                            backgroundColor:'rgb(221, 160, 221)',
                                            borderColor: 'rgb(221, 160, 221)',
                                            fill: false

                                        },
                                        {
                                            label: 'UVA 4',
                                            data: data_uva4_teamB,
                                            backgroundColor:'rgb(0, 0, 128)',
                                            borderColor: 'rgb(0, 0, 128)',
                                            fill: false

                                        },
                                        {
                                            label: 'UVA 5',
                                            data: data_uva5_teamB,
                                            backgroundColor:'rgb(0, 0, 0)',
                                            borderColor: 'rgb(0, 0, 0)',
                                            fill: false

                                        },
                                        {
                                            label: 'АКМА',
                                            data: data_acma_teamB,
                                            backgroundColor:'rgb(50, 230, 50)',
                                            borderColor: 'rgb(50, 230, 50)',
                                            fill: false

                                        },
                                        {
                                            label: 'цель OEE',
                                            data: balance,
                                            type: 'line',
                                            backgroundColor:'rgb(0, 0, 255)',
                                            borderColor: 'rgb(0, 0, 255)',
                                            fill: false

                                        }]
                                  },
                                  options: {}
                                });
                            </script>

                        </fieldset>
        </div>-->
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
