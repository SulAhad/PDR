<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['quality'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="container">
        <div class="row blur card shadow-sm">
            <div class="col-md-12">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                    $message = "SELECT BrakQuality_comment, DATE(date) AS day, SUM(BrakQuality) AS total_requests
                                FROM Quality_KPI GROUP BY day";
                    $link->set_charset("utf8");
                    $result =  mysqli_query($link, $message);

                    // Создаем массивы для меток и данных
                    $labels = array();
                    $data = array();

                    // Обрабатываем результаты запроса и заполняем массивы
                    while($row = mysqli_fetch_assoc($result)) {
                        array_push($labels, $row["day"]);
                        array_push($data, $row["total_requests"]);
                        $labelFromDB = $row["BrakQuality_comment"];
                    }

                    ?>

                    <script>
                        var labels = <?php echo json_encode($labels); ?>;
                        var data = <?php echo json_encode($data); ?>;
                        var labelFromDB = <?php echo json_encode($labelFromDB); ?>;
                    </script>

                    <canvas id="myChartBrakQuality"></canvas>
                    <script>
                        var ctx = document.getElementById('myChartBrakQuality').getContext('2d');
                        var chart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: labels,
                            datasets: [{
                              label: "Количество Брака",
                              data: data,
                              backgroundColor:'rgb(233, 150, 122)',
                              borderColor: 'rgb(233, 150, 122)',
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
            <p>СМС</p>
                <div class="row">
                  <!-- <div class="col-md-6">
                      <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                          $date = "2023-11-23";
                          $message = "SELECT DATE(date) AS day,
                              SUM(innotech1_teamA) AS innotech1_teamA,
                              SUM(innotech2_teamA) AS innotech2_teamA,
                              SUM(innotech3_teamA) AS innotech3_teamA,
                              SUM(uva4_teamA) AS uva4_teamA,
                              SUM(uva5_teamA) AS uva5_teamA,
                              SUM(acma_teamA) AS acma_teamA,
                              SUM(oee_total) AS oee_total
                              FROM Production_KPI
                              WHERE DATE(date) = '$date'";
                          $result = mysqli_query($link, $message);
                          $labels = array();
                          $oee_total = array();
                          $innotech1_teamA = array();
                          $innotech2_teamA = array();
                          $innotech3_teamA = array();
                          $uva4_teamA = array();
                          $uva5_teamA = array();
                          $acma_teamA = array();
                          if ($result) {
                              while ($row = mysqli_fetch_assoc($result)) {
                                  array_push($labels, $row["day"]);
                                  array_push($oee_total, $row["oee_total"]);
                                  array_push($innotech1_teamA, $row["innotech1_teamA"]);
                                  array_push($innotech2_teamA, $row["innotech2_teamA"]);
                                  array_push($innotech3_teamA, $row["innotech3_teamA"]);
                                  array_push($uva4_teamA, $row["uva4_teamA"]);
                                  array_push($uva5_teamA, $row["uva5_teamA"]);
                                  array_push($acma_teamA, $row["acma_teamA"]);}}
                      ?>
                      <script>
                          var labels = <?php echo json_encode($labels); ?>;
                          var oee_total = <?php echo json_encode($oee_total); ?>;
                          var innotech1_teamA = <?php echo json_encode($innotech1_teamA); ?>;
                          var innotech2_teamA = <?php echo json_encode($innotech2_teamA); ?>;
                          var innotech3_teamA = <?php echo json_encode($innotech3_teamA); ?>;
                          var uva4_teamA = <?php echo json_encode($uva4_teamA); ?>;
                          var uva5_teamA = <?php echo json_encode($uva5_teamA); ?>;
                          var acma_teamA = <?php echo json_encode($acma_teamA); ?>;
                          var target = 96;
                          var innotech1_teamA_color = innotech1_teamA.map(value => value < target ? 'rgb(220, 20, 60)' : 'rgb(152, 251, 152)');
                          var innotech2_teamA_color = innotech2_teamA.map(value => value < target ? 'rgb(220, 20, 60)' : 'rgb(152, 251, 152)');
                          var innotech3_teamA_color = innotech3_teamA.map(value => value < target ? 'rgb(220, 20, 60)' : 'rgb(152, 251, 152)');
                          var uva4_teamA_color = uva4_teamA.map(value => value < target ? 'rgb(220, 20, 60)' : 'rgb(152, 251, 152)');
                          var uva5_teamA_color = uva5_teamA.map(value => value < target ? 'rgb(220, 20, 60)' : 'rgb(152, 251, 152)');
                          var acma_teamA_color = acma_teamA.map(value => value < target ? 'rgb(220, 20, 60)' : 'rgb(152, 251, 152)');
                          var oee_total_color = oee_total.map(value => value < target ? 'rgb(220, 20, 60)' : 'rgb(152, 251, 152)');
                      </script>
                      <canvas id="myChart1"></canvas>
                      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                      <script>
                      var ctx = document.getElementById('myChart1').getContext('2d');
                        var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: 'OEE total',
                                    data: oee_total,
                                    backgroundColor: oee_total_color,
                                    borderColor: 'rgb(0, 128, 0)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'innotech1_teamA',
                                    data: innotech1_teamA,
                                    backgroundColor: innotech1_teamA_color,
                                    borderColor: 'rgb(0, 128, 0)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'innotech2_teamA',
                                    data: innotech2_teamA,
                                    backgroundColor: innotech2_teamA_color,
                                    borderColor: 'rgb(0, 128, 0)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'innotech3_teamA',
                                    data: innotech3_teamA,
                                    backgroundColor: innotech3_teamA_color,
                                    borderColor: 'rgb(0, 128, 0)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'uva4_teamA',
                                    data: uva4_teamA,
                                    backgroundColor: uva4_teamA_color,
                                    borderColor: 'rgb(0, 128, 0)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'uva5_teamA',
                                    data: uva5_teamA,
                                    backgroundColor: uva5_teamA_color,
                                    borderColor: 'rgb(0, 128, 0)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'acma_teamA',
                                    data: acma_teamA,
                                    backgroundColor: acma_teamA_color,
                                    borderColor: 'rgb(0, 128, 0)',
                                    borderWidth: 1
                                }
                            ]
                        }
                        });
                      </script>
                  </fieldset>
                  </div> -->
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_him_sostav_teamA) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_him_sostav_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_him_sostav_teamA').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний по хим.составу',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_upakovka_teamA) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_upakovka_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_upakovka_teamA').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний, упаковка',
                                  data: data,
                                  backgroundColor:'rgb(240, 230, 140)',
                                  borderColor: 'rgb(240, 230, 140)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_pretenziy_teamA) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_pretenziy_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_pretenziy_teamA').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество претензий',
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
                            $message = "SELECT DATE(date) AS day, SUM(Zabrakov_mat_teamA) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartZabrakov_mat_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartZabrakov_mat_teamA').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Забракованный материал',
                                  data: data,
                                  backgroundColor:'rgb(139, 0, 0)',
                                  borderColor: 'rgb(139, 0, 0)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_upakovka_Sulf) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_upakovka_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_upakovka_Sulf').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Активная вода',
                                  data: data,
                                  backgroundColor:'rgb(127, 255, 212)',
                                  borderColor: 'rgb(127, 255, 212)',
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
            <div class="col-md-12">
            <p>TEAM B</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_him_sostav_teamB) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_him_sostav_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_him_sostav_teamB').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний по хим.составу',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_upakovka_teamB) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_upakovka_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_upakovka_teamB').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний, упаковка',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_pretenziy_teamB) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_pretenziy_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_pretenziy_teamB').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество претензий',
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
                            $message = "SELECT DATE(date) AS day, SUM(Zabrakov_mat_teamB) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartZabrakov_mat_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartZabrakov_mat_teamB').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Забракованный материал',
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
        </div>-->
        <div class="row blur card shadow-sm mt-2 mb-2">
            <div class="col-md-12">
            <p>Сульфирование</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_him_sostav_Sulf) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_him_sostav_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_him_sostav_Sulf').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний по хим.составу',
                                  data: data,
                                  backgroundColor:'rgb(0, 139, 139)',
                                  borderColor: 'rgb(0, 139, 139)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Zabrakov_mat_Sulf) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartZabrakov_mat_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartZabrakov_mat_Sulf').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Забракованный материал',
                                  data: data,
                                  backgroundColor:'rgb(0, 139, 139)',
                                  borderColor: 'rgb(0, 139, 139)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_pretenziy_Sulf) AS total_requests
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_pretenziy_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_pretenziy_Sulf').getContext('2d');
                            var chart = new Chart(ctx,
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество претензий',
                                  data: data,
                                  backgroundColor:'rgb(0, 139, 139)',
                                  borderColor: 'rgb(0, 139, 139)',
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
