<!DOCTYPE html>
<html>
<meta charset='utf-8' />
<head>
    <?php require('../../head.php')?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <?php
            require('../../mySidebar.php');
            echo"<button class='row bg-secondary openbtn' onclick='openNav()'>☰ </button>";
        ?>
    </head>  
<?php
    $link = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_default');
    $message = "SELECT name, date FROM myCalendar"; 
    $link->set_charset("utf8");
    $result =  mysqli_query( $link,  $message);
    $events = array();
    while ($row = $result->fetch_assoc()) 
    {
        $event = array(
            'title' => $row['name'],
            'description' => $row['name'],
            'date' => $row['date'],
        );
        array_push($events, $event);
    }
?>
    <script src='../dist/index.global.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                editable: true,
                selectable: true,
                dayMaxEvents: true,
                firstDay: 1, // начало недели с понедельника
                timeFormat: 'HH:mm', // добавлено свойство для формата времени
                headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
              },
                initialView: 'dayGridMonth',
                events: <?php echo json_encode($events); ?>,
               
            });

            calendar.render();
        });
    </script>
    <style>
      body 
      {
        margin: 40px 10px;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
      }
      #calendar 
      {
        max-width: 1100px;
        margin: 0 auto;
      }
    </style>
    <body class="container">
            <div class="row">
                <div class="col-md-12">
                    <fieldset class="form-group border p-1 m-1">
                        <div id='calendar'></div>
                    </fieldset>
                </div>
            </div>
    </body>
</html>