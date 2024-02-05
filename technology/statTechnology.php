<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['technology'] == 0){
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
    <style>
        .danger{
            background:lightCoral;
        }
        .success{
            background:lightGreen;
        }
    </style>
    <body class="container">

        <div class="row blur mt-2 card shadow-sm">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Params_limits) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartParams_limits"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartParams_limits').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество параметров не в лимитах',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Compositsia) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartCompositsia"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartCompositsia').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Композиция',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Compaund) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartCompaund"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartCompaund').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Компаунд',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Postdobavki) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartPostdobavki"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartPostdobavki').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Постдобавки',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Fasovka) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartFasovka"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartFasovka').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Фасовка',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Slivnaya) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartSlivnaya"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartSlivnaya').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Сливная',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
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
                        <div class="col-md-6">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Uch_sirya) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartUch_sirya"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUch_sirya').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Участок сырья',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
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
            <div class="col-md-12">
            <p>TEAM A</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_teamA) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_gotoviy_prod_teamA) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_gotoviy_prod_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_gotoviy_prod_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа на готовый продукт',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
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
        <div class="row blur card shadow-sm mt-2">
            <div class="col-md-12">
            <p>TEAM B</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_teamB) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_gotoviy_prod_teamB) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_gotoviy_prod_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_gotoviy_prod_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа на котовый продукт',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
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
        <div class="row blur card shadow-sm mt-2 mb-4">
            <div class="col-md-12">
            <p>Сульфирование</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_total) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_total"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_total').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа, общее',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_gotoviy_prod_total) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
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
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_gotoviy_prod_total"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_gotoviy_prod_total').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа на готовый продукт, общее',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
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
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
