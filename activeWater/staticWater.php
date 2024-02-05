<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['active_water'] == 0){
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
              <fieldset class="form-group border p-1 m-1 card shadow-sm">63 +16 м3

                  <?php
                    $message63 = "SELECT DATE(date) AS day, SUM(w1) AS w1, SUM(w4) AS w4 , SUM(w8) AS w8 FROM Active_water_KPI GROUP BY day";
                    $link->set_charset("utf8");
                    $result63 =  mysqli_query($link, $message63);
                    $dataByWeek = array(); // Данные по неделям
                    $dataByMonth = array(); // Данные по месяцам
                    while($row63 = mysqli_fetch_assoc($result63)) {
                      $date = date('Y-m-d', strtotime($row63["day"]));
                      $weekNumber = date('W', strtotime($date));
                      $monthNumber = date('m', strtotime($date));
                      $yearNumber = date('Y', strtotime($date));
                      $dataByWeek[$yearNumber][$weekNumber]['w1'][] = $row63["w1"];
                      $dataByWeek[$yearNumber][$weekNumber]['w4'][] = $row63["w4"];
                      $dataByWeek[$yearNumber][$weekNumber]['w8'][] = $row63["w8"];
                      $dataByMonth[$yearNumber][$monthNumber]['w1'][] = $row63["w1"];
                      $dataByMonth[$yearNumber][$monthNumber]['w4'][] = $row63["w4"];
                      $dataByMonth[$yearNumber][$monthNumber]['w8'][] = $row63["w8"];
                    }
                    ?>

                    <h2>Информация по неделям</h2>
                    <table border="1">
                      <tr>
                        <th>Неделя</th>
                        <th>Остаток, м3</th>
                        <th>Использовано, м3</th>
                        <th>Приход, м3</th>
                      </tr>
                      <?php foreach ($dataByWeek as $year => $weeks) : ?>
                        <?php foreach ($weeks as $week => $data) : ?>
                          <tr>
                            <td><?php echo "Неделя " . $week . " / " . $year; ?></td>
                            <td><?php echo array_sum($data['w1']); ?></td>
                            <td><?php echo array_sum($data['w4']); ?></td>
                            <td><?php echo array_sum($data['w8']); ?></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </table>

                    <h2>Информация по месяцам</h2>
                    <table border="1">
                      <tr>
                        <th>Месяц</th>
                        <th>Остаток, м3</th>
                        <th>Использовано, м3</th>
                        <th>Приход, м3</th>
                      </tr>
                      <?php foreach ($dataByMonth as $year => $months) : ?>
                        <?php foreach ($months as $month => $data) : ?>
                          <tr>
                            <td><?php echo date('F', mktime(0, 0, 0, $month, 10)) . " / " . $year; ?></td>
                            <td><?php echo array_sum($data['w1']); ?></td>
                            <td><?php echo array_sum($data['w4']); ?></td>
                            <td><?php echo array_sum($data['w8']); ?></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </table>
                </fieldset>
                <fieldset class="form-group border p-1 m-1 card shadow-sm">63 +16 м3
                  <?php
                    $message63 = "SELECT DATE(date) AS day, SUM(w1) AS w1, SUM(w4) AS w4 , SUM(w8) AS w8 FROM Active_water_KPI GROUP BY day";
                    $link->set_charset("utf8");
                    $result63 =  mysqli_query($link, $message63);
                    $labels63 = array();
                    $dataW1 = array();
                    $dataW4 = array();
                    $dataW8 = array();
                    while($row63 = mysqli_fetch_assoc($result63)) {
                      array_push($labels63, $row63["day"]);
                      array_push($dataW1, $row63["w1"]);
                      array_push($dataW4, $row63["w4"]);
                      array_push($dataW8, $row63["w8"]);
                    }
                  ?>
                  <script>
                    var labels63 = <?php echo json_encode($labels63); ?>;
                    var dataW1 = <?php echo json_encode($dataW1); ?>;
                    var dataW4 = <?php echo json_encode($dataW4); ?>;
                    var dataW8 = <?php echo json_encode($dataW8); ?>;
                  </script>
                  <canvas id="myChart63"></canvas>
                  <script>
                    var ctx = document.getElementById('myChart63').getContext('2d');
                    var chart63 = new Chart(ctx, {
                      type: 'bar',
                      data: {
                        labels: labels63,
                        datasets: [{
                          type: 'bar',
                          label: "Остаток",
                          data: dataW1,
                          backgroundColor: 'rgba(144, 202, 249, 0.5)',
                          borderColor: 'rgb(0, 0, 255)',
                          borderWidth: 1
                        },
                        {
                          type: 'bar',
                          label: "Использовано",
                          data: dataW4,
                          backgroundColor: 'rgba(255, 255, 0, 0.5)',
                          borderColor: 'rgb(128, 128, 0)',
                          borderWidth: 1
                        },
                        {
                          type: 'bar',
                          label: "Приход",
                          data: dataW8,
                          backgroundColor: 'rgba(250, 128, 114)',
                          borderColor: 'rgb(255, 0, 0)',
                          borderWidth: 1
                        },
                        {
                          type: 'line',
                          label: "Уровень",
                          data: Array(labels63.length).fill(79),
                          fill: false,
                          backgroundColor: 'rgba(255, 0, 0, 0.5)',
                          borderColor: 'rgba(255, 0, 0, 0.8)',
                          borderWidth: 1
                        }
                        ]
                      },
                      options: {
                        scales: {
                          y: {
                            stacked: true,
                            beginAtZero: true
                          },
                          x: {
                          }
                        }
                      }
                    });
                    </script>
                  </fieldset>
            </div>
        </div>
        <div class="row blur card shadow-sm mt-2">
            <div class="col-md-12">
              <fieldset class="form-group border p-1 m-1 card shadow-sm">250 м3
                <?php
                  $message250 = "SELECT DATE(date) AS day, SUM(w2) AS w2, SUM(w5) AS w5 , SUM(w9) AS w9 FROM Active_water_KPI GROUP BY day";
                  $link->set_charset("utf8");
                  $result250 =  mysqli_query($link, $message250);
                  $dataByWeek = array(); // Данные по неделям
                  $dataByMonth = array(); // Данные по месяцам
                  while($row250 = mysqli_fetch_assoc($result250)) {
                    $date = date('Y-m-d', strtotime($row250["day"]));
                    $weekNumber = date('W', strtotime($date));
                    $monthNumber = date('m', strtotime($date));
                    $yearNumber = date('Y', strtotime($date));
                    $dataByWeek[$yearNumber][$weekNumber]['w2'][] = $row250["w2"];
                    $dataByWeek[$yearNumber][$weekNumber]['w5'][] = $row250["w5"];
                    $dataByWeek[$yearNumber][$weekNumber]['w9'][] = $row250["w9"];
                    $dataByMonth[$yearNumber][$monthNumber]['w2'][] = $row250["w2"];
                    $dataByMonth[$yearNumber][$monthNumber]['w5'][] = $row250["w5"];
                    $dataByMonth[$yearNumber][$monthNumber]['w9'][] = $row250["w9"];
                  }
                  ?>

                  <h2>Информация по неделям</h2>
                  <table border="1">
                    <tr>
                      <th>Неделя</th>
                      <th>Остаток, м3</th>
                      <th>Использовано, м3</th>
                      <th>Приход, м3</th>
                    </tr>
                    <?php foreach ($dataByWeek as $year => $weeks) : ?>
                      <?php foreach ($weeks as $week => $data) : ?>
                        <tr>
                          <td><?php echo "Неделя " . $week . " / " . $year; ?></td>
                          <td><?php echo array_sum($data['w2']); ?></td>
                          <td><?php echo array_sum($data['w5']); ?></td>
                          <td><?php echo array_sum($data['w9']); ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                  </table>

                  <h2>Информация по месяцам</h2>
                  <table border="1">
                    <tr>
                      <th>Месяц</th>
                      <th>Остаток, м3</th>
                      <th>Использовано, м3</th>
                      <th>Приход, м3</th>
                    </tr>
                    <?php foreach ($dataByMonth as $year => $months) : ?>
                      <?php foreach ($months as $month => $data) : ?>
                        <tr>
                          <td><?php echo date('F', mktime(0, 0, 0, $month, 10)) . " / " . $year; ?></td>
                          <td><?php echo array_sum($data['w2']); ?></td>
                          <td><?php echo array_sum($data['w5']); ?></td>
                          <td><?php echo array_sum($data['w9']); ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                  </table>
              </fieldset>
              <fieldset class="form-group border p-1 m-1 card shadow-sm">250 м3
                  <?php
                    $message250 = "SELECT DATE(date) AS day, SUM(w2) AS w2, SUM(w5) AS w5, SUM(w9) AS w9 FROM Active_water_KPI GROUP BY day";
                    $link->set_charset("utf8");
                    $result250 =  mysqli_query($link, $message250);
                    $labels250 = array();
                    $dataW2 = array();
                    $dataW5 = array();
                    $dataW9 = array();
                    while($row250 = mysqli_fetch_assoc($result250)) {
                      array_push($labels250, $row250["day"]);
                      array_push($dataW2, $row250["w2"]);
                      array_push($dataW5, $row250["w5"]);
                      array_push($dataW9, $row250["w9"]);
                    }
                  ?>

                  <script>
                    var labels250 = <?php echo json_encode($labels250); ?>;
                    var dataW2 = <?php echo json_encode($dataW2); ?>;
                    var dataW5 = <?php echo json_encode($dataW5); ?>;
                    var dataW9 = <?php echo json_encode($dataW9); ?>;
                  </script>

                  <canvas id="myChart250"></canvas>

                  <script>
                    var ctx = document.getElementById('myChart250').getContext('2d');
                    var chart250 = new Chart(ctx, {
                      type: 'bar',
                      data: {
                        labels: labels250,
                        datasets: [{
                          type: 'bar',
                          label: "Остаток",
                          data: dataW2,
                          backgroundColor: 'rgba(144, 202, 249, 0.5)',
                          borderColor: 'rgb(0, 0, 0)',
                          borderWidth: 1
                        },
                        {
                          type: 'bar',
                          label: "Использовано",
                          data: dataW5,
                          backgroundColor: 'rgba(255, 255, 0, 0.5)',
                          borderColor: 'rgb(0, 0, 0)',
                          borderWidth: 1
                        },
                        {
                          type: 'bar',
                          label: "Приход",
                          data: dataW9,
                          backgroundColor: 'rgba(250, 128, 114)',
                          borderColor: 'rgb(255, 0, 0)',
                          borderWidth: 1
                        },
                        {
                          type: 'line',
                          label: "Уровень",
                          data: Array(labels63.length).fill(250),
                          fill: false,
                          backgroundColor: 'rgba(255, 0, 0, 0.5)',
                          borderColor: 'rgba(255, 0, 0, 0.8)',
                          borderWidth: 1
                        }
                        ]
                      },
                      options: {
                        scales: {
                          y: {
                            stacked: true,
                            beginAtZero: true
                          },
                          x: {
                          }
                        }
                      }
                    });
                    </script>
                  </fieldset>
            </div>
        </div>
        <div class="row blur card shadow-sm mt-2">
            <div class="col-md-12">
                <fieldset class="form-group border p-1 m-1 card shadow-sm">75 м3 (ХР)
                  <?php
                    $message75 = "SELECT DATE(date) AS day, SUM(w3) AS w3, SUM(w6) AS w6 , SUM(w10) AS w10 FROM Active_water_KPI GROUP BY day";
                    $link->set_charset("utf8");
                    $result75 =  mysqli_query($link, $message75);
                    $dataByWeek = array(); // Данные по неделям
                    $dataByMonth = array(); // Данные по месяцам
                    while($row75 = mysqli_fetch_assoc($result75)) {
                      $date = date('Y-m-d', strtotime($row75["day"]));
                      $weekNumber = date('W', strtotime($date));
                      $monthNumber = date('m', strtotime($date));
                      $yearNumber = date('Y', strtotime($date));
                      $dataByWeek[$yearNumber][$weekNumber]['w3'][] = $row75["w3"];
                      $dataByWeek[$yearNumber][$weekNumber]['w6'][] = $row75["w6"];
                      $dataByWeek[$yearNumber][$weekNumber]['w10'][] = $row75["w10"];
                      $dataByMonth[$yearNumber][$monthNumber]['w3'][] = $row75["w3"];
                      $dataByMonth[$yearNumber][$monthNumber]['w6'][] = $row75["w6"];
                      $dataByMonth[$yearNumber][$monthNumber]['w10'][] = $row75["w10"];
                    }
                    ?>

                    <h2>Информация по неделям</h2>
                    <table border="1">
                      <tr>
                        <th>Неделя</th>
                        <th>Остаток, м3</th>
                        <th>Использовано, м3</th>
                        <th>Приход, м3</th>
                      </tr>
                      <?php foreach ($dataByWeek as $year => $weeks) : ?>
                        <?php foreach ($weeks as $week => $data) : ?>
                          <tr>
                            <td><?php echo "Неделя " . $week . " / " . $year; ?></td>
                            <td><?php echo array_sum($data['w3']); ?></td>
                            <td><?php echo array_sum($data['w6']); ?></td>
                            <td><?php echo array_sum($data['w10']); ?></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </table>

                    <h2>Информация по месяцам</h2>
                    <table border="1">
                      <tr>
                        <th>Месяц</th>
                        <th>Остаток, м3</th>
                        <th>Использовано, м3</th>
                        <th>Приход, м3</th>
                      </tr>
                      <?php foreach ($dataByMonth as $year => $months) : ?>
                        <?php foreach ($months as $month => $data) : ?>
                          <tr>
                            <td><?php echo date('F', mktime(0, 0, 0, $month, 10)) . " / " . $year; ?></td>
                            <td><?php echo array_sum($data['w3']); ?></td>
                            <td><?php echo array_sum($data['w6']); ?></td>
                            <td><?php echo array_sum($data['w10']); ?></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </table>
                </fieldset>
                <fieldset class="form-group border p-1 m-1 card shadow-sm">75 м3 (ХР)
                  <?php
                    $message = "SELECT DATE(date) AS day, SUM(w3) AS w3, SUM(w6) AS w6, SUM(w10) AS w10 FROM Active_water_KPI GROUP BY day";
                    $link->set_charset("utf8");
                    $result =  mysqli_query($link, $message);
                    $labels75 = array();
                    $dataW3 = array();
                    $dataW6 = array();
                    $dataW10 = array();
                    while($row = mysqli_fetch_assoc($result)) {
                      array_push($labels75, $row["day"]);
                      array_push($dataW3, $row["w3"]);
                      array_push($dataW6, $row["w6"]);
                      array_push($dataW10, $row["w10"]);
                    }
                  ?>
                  <script>
                    var labels75 = <?php echo json_encode($labels75); ?>;
                    var dataW3 = <?php echo json_encode($dataW3); ?>;
                    var dataW6 = <?php echo json_encode($dataW6); ?>;
                    var dataW10 = <?php echo json_encode($dataW10); ?>;
                    var balance = Array(data.length).fill(75);
                  </script>
                  <canvas id="myChart75"></canvas>
                  <script>
                    var ctx = document.getElementById('myChart75').getContext('2d');
                    var chart75 = new Chart(ctx, {
                      type: 'bar',
                      data: {
                        labels: labels75,
                        datasets: [{
                          type: 'bar',
                          label: "Остаток",
                          data: dataW3,
                          backgroundColor: 'rgba(144, 202, 249, 0.5)',
                          borderColor: 'rgb(0, 0, 0)',
                          borderWidth: 1
                        },
                        {
                          type: 'bar',
                          label: "Использовано",
                          data: dataW6,
                          backgroundColor: 'rgba(255, 255, 0, 0.5)',
                          borderColor: 'rgb(0, 0, 0)',
                          borderWidth: 1
                        },
                        {
                          type: 'bar',
                          label: "Приход",
                          data: dataW10,
                          backgroundColor: 'rgba(250, 128, 114)',
                          borderColor: 'rgb(255, 0, 0)',
                          borderWidth: 1
                        },
                        {
                          type: 'line',
                          label: "Уровень",
                          data: Array(labels63.length).fill(75),
                          fill: false,
                          backgroundColor: 'rgba(255, 0, 0, 0.5)',
                          borderColor: 'rgba(255, 0, 0, 0.8)',
                          borderWidth: 1
                        }
                        ]
                      },
                      options: {
                        scales: {
                          y: {
                            stacked: true,
                            beginAtZero: true
                          },
                          x: {
                          }
                        }
                      }
                    });
                    </script>
                  </fieldset>
            </div>
        </div>
        <div class="row blur card shadow-sm mt-2">
            <div class="col-md-12">
                <fieldset class="form-group border p-1 m-1 card shadow-sm">Сульфирование
                  <?php
                    $message = "SELECT DATE(date) AS day, SUM(w7) AS w7 FROM Active_water_KPI GROUP BY day";
                    $link->set_charset("utf8");
                    $result =  mysqli_query($link, $message);
                    $dataByWeek = array(); // Данные по неделям
                    $dataByMonth = array(); // Данные по месяцам
                    while($row = mysqli_fetch_assoc($result)) {
                      $date = date('Y-m-d', strtotime($row["day"]));
                      $weekNumber = date('W', strtotime($date));
                      $monthNumber = date('m', strtotime($date));
                      $yearNumber = date('Y', strtotime($date));
                      $dataByWeek[$yearNumber][$weekNumber]['w7'][] = $row["w7"];
                      $dataByMonth[$yearNumber][$monthNumber]['w7'][] = $row["w7"];
                    }
                    ?>
                    <h2>Информация по неделям</h2>
                    <table border="1">
                      <tr>
                        <th>Неделя</th>
                        <th>Приход, м3</th>
                      </tr>
                      <?php foreach ($dataByWeek as $year => $weeks) : ?>
                        <?php foreach ($weeks as $week => $data) : ?>
                          <tr>
                            <td><?php echo "Неделя " . $week . " / " . $year; ?></td>
                            <td><?php echo array_sum($data['w7']); ?></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </table>

                    <h2>Информация по месяцам</h2>
                    <table border="1">
                      <tr>
                        <th>Месяц</th>
                        <th>Приход, м3</th>
                      </tr>
                      <?php foreach ($dataByMonth as $year => $months) : ?>
                        <?php foreach ($months as $month => $data) : ?>
                          <tr>
                            <td><?php echo date('F', mktime(0, 0, 0, $month, 10)) . " / " . $year; ?></td>
                            <td><?php echo array_sum($data['w7']); ?></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </table>
                </fieldset>
                <fieldset class="form-group border p-1 m-1 card shadow-sm">Сульфирование
                  <?php
                    $message = "SELECT DATE(date) AS day, SUM(w7) AS w7 FROM Active_water_KPI GROUP BY day";
                    $link->set_charset("utf8");
                    $result =  mysqli_query($link, $message);
                    $labels = array();
                    $dataW7 = array();
                    while($row = mysqli_fetch_assoc($result)) {
                      array_push($labels, $row["day"]);
                      array_push($dataW7, $row["w7"]);
                    }
                  ?>
                  <script>
                    var labels = <?php echo json_encode($labels); ?>;
                    var dataW7 = <?php echo json_encode($dataW7); ?>;
                  </script>
                  <canvas id="myChartSulf"></canvas>
                  <script>
                    var ctx = document.getElementById('myChartSulf').getContext('2d');
                    var chart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                        labels: labels,
                        datasets: [{
                          type: 'bar',
                          label: "Сульфирование",
                          data: dataW7,
                          backgroundColor: 'rgba(144, 202, 249, 0.5)',
                          borderColor: 'rgb(0, 0, 0)',
                          borderWidth: 1
                        }
                        ]
                      },
                      options: {
                        scales: {
                          y: {
                            stacked: true,
                            beginAtZero: true
                          },
                          x: {
                          }
                        }
                      }
                    });
                    </script>
                  </fieldset>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
