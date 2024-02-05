<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['production'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];

$message = "SELECT * FROM planSMS";
$link->set_charset("utf8");
$result = mysqli_query($link, $message);
$events = [];
while ($row = mysqli_fetch_assoc($result)) 
{
  $event = ['id' => $row['id'], 
  'resourceId' => $row['avtomat'], 
  'start' => $row['date_start'], 
  'end' => $row['date_end'], 
  'title' => $row['name']
];
  array_push($events, $event);
}
?>
<!DOCTYPE html>
<html>
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?><
    <meta charset='utf-8' />
    <script src='/Engels/planirovanie/FullCalendar/FullCalendar/dist/index.global.js'></script>
    <style>
      html, body {
        overflow: hidden;
      }
      #calendar-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
      }
      .fc-header-toolbar {
        padding-top: 1em;
        padding-left: 1em;
        padding-right: 1em;
      }
      a{
        color:black;
        text-decoration:none;
      }
    </style>
    <script>
      document.addEventListener('DOMContentLoaded', function() 
      {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, 
        {
          schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
          height: '90%',
          initialDate: '<?php echo date("Y-m-d");?>',
          editable: true,
          selectable: true,
          aspectRatio: 2,
          headerToolbar: 
          {
            left: 'today prev,next',
            center: 'title',
            right: 'resourceTimelineDay,resourceTimelineThreeDays,timeGridWeek,dayGridMonth,listWeek'
          },
          initialView: 'resourceTimelineDay',
          views: 
          {
            resourceTimelineThreeDays: 
            {
              type: 'resourceTimeline',
              duration: { days: 6 },
              buttonText: '6 days'
            }
          },
          resourceAreaHeaderContent: 'Автоматы',
          resources: [
            { id: 'Innotech-1', title: 'Innotech-1', eventColor: 'gold'  },
            { id: 'Innotech-2', title: 'Innotech-2', eventColor: 'green' },
            { id: 'Innotech-3', title: 'Innotech-3', eventColor: 'orange' },
            { id: 'UVA-4', title: 'UVA-4', eventColor: 'blue'  },
            { id: 'UVA-5', title: 'UVA-5', eventColor: 'red' },
            { id: 'ACMA-4', title: 'ACMA-4', eventColor: 'gray'  }
          ],
          events: <?php echo json_encode($events); ?>,
          eventReceive: function(info) 
          {
            addEventToDatabase(info.event);
          },
          eventDrop: function(info) 
          {
            updateEventInDatabase(info.event);
          },
          
          businessHours: 
          {
            startTime: '07:00',
            endTime: '15:00'
          }
        });
        function updateEventInDatabase(event) {
            var start = new Date(event.start);
            start.setHours(start.getHours() + 4);
            var startStr = start.toISOString().slice(0, 19).replace('T', ' ');
            var end = new Date(event.end);
            end.setHours(end.getHours() + 4);
            var endStr = end.toISOString().slice(0, 19).replace('T', ' ');

            var resources = event.getResources();
            var res = resources.map(function(resource) { return resource.id }).join("");

            var eventData = { id: event.id, start: startStr, end: endStr, title: event.title };
            $.ajax({
              type: 'POST',
              dataType: 'html',
              url: '/Engels/planirovanie/update_event.php',
              data: {
                id: event.id,
                start: startStr,
                end: endStr,
                res: res
              },
              success: function(response) {
                //alert('Event updated in the database: ' + response);
              },
              error: function(xhr, status, error) {
                alert('Request failed. Status: ' + xhr.status);
              }
            });
          }
        // Код для открытия и обработки формы добавления события
        var eventForm = $('#eventForm').dialog({
          autoOpen: false,
          height: 600,
          width: 450,
          modal: true,
          buttons: 
          {
            "Добавить событие": function() 
            {
              document.getElementById('addEventButton').click();
            },
            "Отмена": function() 
            {
              $(this).dialog('close');
            }
          },
          close: function() 
          {
            document.getElementById('eventTitle').value = '';
            document.getElementById('eventStart').value = '';
            document.getElementById('eventEnd').value = '';
          }
        });
        
        document.getElementById('addEventLink').addEventListener('click', function() 
        {
          eventForm.dialog('open');
        });
        // Обработка нажатия кнопки "Добавить" и добавление события в календарь
        document.getElementById('addEventButton').addEventListener('click', function() 
        {
          var avtomat = document.getElementById('eventAvtomat').value;
          var name = document.getElementById('eventTitle').value;
          var start = document.getElementById('eventStart').value;
          var end = document.getElementById('eventEnd').value;
          var format = 3;
          var con = 0;
          var pcs_min = 0;
          $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '/Engels/planirovanie/addPlanSMS.php',
            data: 
            {
              avtomat: avtomat,
              dateTime: start,
              pcs_h: end,
              format:format,
              con:con,
              pcs_min:pcs_min,
              name:name
            },
            success: function(response) 
            {
              //alert('Event updated in the database: ' + response);
            },
            error: function(xhr, status, error) 
            {
              alert('Request failed. Status: ' + xhr.status);
            }
          });
          $('#eventForm').dialog('close'); // Закрытие формы после добавления события
        });
        var eventModal = $('#eventModal').dialog({
          autoOpen: false,
          height: 600,
          width: 450,
          modal: true,
          buttons: 
          {
            "Добавить событие": function() 
            {
              document.getElementById('addEventButton').click();
            },
            "Отмена": function() 
            {
              $(this).dialog('close');
            }
          },
          close: function() 
          {
            
          }
        });
        calendar.setOption('eventClick', function(info) {
          $('#eventAvtomatModal').val(info.event.resourceId);
          $('#eventModalFormatModal').text(info.event.con);
          $('#eventModalTitleModal').val(info.event.title);
          $('#eventModalStartModal').val(info.event.start);
          $('#eventModalEndModal').val(info.event.end);
          $('#eventModal').dialog('open');
        });

          $('#addEventLink').click(function() {
            $('#eventModal').dialog('open');
          });

          calendar.render(); // Отрисовка календаря
        });
    </script>
    
</head>
<body class="bg-light mt-4">
  <div id='calendar-container'>
    <div style="margin-top:50px;" id='calendar'></div>
    <div class="form-control" id="eventForm" title="Добавить новое событие">
      <form>
        <label for="eventAvtomat">Автомат:</label>
        <input class="form-control" type="text" id="eventAvtomat" name="eventAvtomat">
        <label for="eventTitle">Название:</label>
        <input class="form-control" type="text" id="eventTitle" name="eventTitle">
        <label for="eventStart">Начало:</label>
        <input class="form-control" type="datetime-local" id="eventStart" name="eventStart">
        <label for="eventEnd">Конец:</label>
        <input class="form-control" type="datetime-local" id="eventEnd" name="eventEnd"><br>
        <input class="btn btn-secondary btn-sm" type="button" value="Добавить" id="addEventButton">
      </form>
    </div>
    <a href="javascript:void(0);" id="addEventLink">Нажмите, чтобы добавить событие</a>
  </div>
  <div id="eventModal" title="Добавить новое событие">
    <form>
      <div class="form-group">
        <label for="eventAvtomatModal">Автомат:</label>
        <input class="form-control" type="text" id="eventAvtomatModal" name="eventAvtomatModal">
      </div>
      <div class="form-group">
        <label for="eventModalTitleModal">Название:</label>
        <input class="form-control" type="text" id="eventModalTitleModal" name="eventModalTitleModal">
      </div>
      <div class="form-group">
        <label for="eventModalStartModal">Начало:</label>
        <input class="form-control" type="text" id="eventModalStartModal" name="eventModalStartModal">
      </div>
      <div class="form-group">
        <label for="eventModalEndModal">Конец:</label>
        <input class="form-control" type="text" id="eventModalEndModal" name="eventModalEndModal">
      </div><br>
      <input class="btn btn-secondary btn-sm" type="button" value="Изменить" id="addEventButton">
    </form>
  </div>
</body>
</html>
