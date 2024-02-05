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
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>  
    <body class="container">
        <div class="row card shadow-sm blur mb-2">
            <div class="col-md-12">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, COUNT(name) AS count_name 
                            FROM InspectionList GROUP BY day";
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
                                array_push($data, $row["count_name"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartInspection"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartInspection').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество обходов',
                                  data: data,
                                  backgroundColor:'rgb(255, 69, 0)',
                                  borderColor: 'rgb(255, 69, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
            </div>
        </div>
        <div class="row card shadow-sm blur">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Incedents) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartIncedents"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartIncedents').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Incedents',
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
                            $message = "SELECT DATE(date) AS day, SUM(NearMiss) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartNearMiss"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartNearMiss').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'NearMiss',
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
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Bbswa) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartBbswa"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartBbswa').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Bbswa',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_vo_zam) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartKol_vo_zam"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_vo_zam').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний',
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
        <div class="row card shadow-sm mt-2 blur">
            <div class="col-md-12">
            <p>TEAM A</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_teamA) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний',
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
                            $message = "SELECT DATE(date) AS day, SUM(Bbs_teamA) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartBbs_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartBbs_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'BBSWA',
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
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Rpm_zam_teamA) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartRpm_zam_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartRpm_zam_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'R&PM Замечания',
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
                            $message = "SELECT DATE(date) AS day, SUM(Rpm_bbs_teamA) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartRpm_bbs_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartRpm_bbs_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'R&PM BBSWA',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_teamB) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний',
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
                            $message = "SELECT DATE(date) AS day, SUM(Bbs_teamB) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartBbs_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartBbs_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'BBSWA',
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
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Rpm_zam_teamB) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartRpm_zam_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartRpm_zam_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'R&PM Замечания',
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
                            $message = "SELECT DATE(date) AS day, SUM(Rpm_bbs_teamB) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartRpm_bbs_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartRpm_bbs_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'R&PM BBSWA',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_Sulf) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_Sulf').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний',
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
                            $message = "SELECT DATE(date) AS day, SUM(Bbs_Sulf) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartBbs_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartBbs_Sulf').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'BBSWA',
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
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Rpm_zam_Sulf) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartRpm_zam_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartRpm_zam_Sulf').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'R&PM Замечания',
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
                            $message = "SELECT DATE(date) AS day, SUM(Rpm_bbs_Sulf) AS total_requests 
                            FROM Safety_KPI GROUP BY day";
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
                        <canvas id="myChartRpm_bbs_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartRpm_bbs_Sulf').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'R&PM BBSWA',
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
