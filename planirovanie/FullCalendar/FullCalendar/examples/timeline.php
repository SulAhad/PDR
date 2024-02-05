<?php
$link = mysqli_connect('127.0.0.1', 'root', 'root', 'u1851636_default');
$message = "SELECT * FROM planSMS";
$link->set_charset("utf8");
$result = mysqli_query($link, $message);
$events = [];
while ($row = mysqli_fetch_assoc($result)) {
    $event = [
        'id' => $row['id'],
        'resourceId' => $row['avtomat'],
        'start' => $row['date_start'],
        'end' => $row['date_end'],
        'title' => $row['name']
    ];
    $resourceAreaHeaderContent  = [
          'title' => $row['avtomat']];
    array_push($events, $event);}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <script src='../dist/index.global.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function()
      {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl,
          {
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            height: '100%',
            initialDate: '2023-12-17',
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
            resources:
            [
              { id: 'Иннотех-1', title: 'Иннотех-1' },
              { id: 'Иннотех-2', title: 'Иннотех-2', eventColor: 'green' },
              { id: 'Иннотех-3', title: 'Иннотех-3', eventColor: 'orange' },
              { id: 'UVA-4', title: 'UVA-4' },
              { id: 'UVA-5', title: 'UVA-5', eventColor: 'red' },
              { id: 'АКМА-4', title: 'АКМА-4' }
            ],
            events: <?php echo json_encode($events); ?>,
            eventRender: function(info)
            {
                alert('Event: ' + info.event.title + '\nStart: ' + info.event.start + '\nEnd: ' + info.event.end);
            },
            eventDrop: function(info)
            {
              updateEventInDatabase(info.event);
              alert('Event updated in the database');
            }
          });
          function updateEventInDatabase(event)
          {
              $.ajax({
                url: 'update_event.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify ({
                  id: event.id,
                  start: event.startStr,
                  end: event.endStr
                }),
                success: function(data)
                {
                  alert('Event updated in the database: ' + data);
                },
                error: function(xhr, status, error)
                {
                  alert('Request failed. Status: ' + xhr.status);
                }
              });
            }
            calendar.render();
      });
    </script>
    <style>

  html, body {
    overflow: hidden; /* don't do scrollbars */
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar-container {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
  }

  .fc-header-toolbar {
    /*
    the calendar will be butting up against the edges,
    but let's scoot in the header's buttons
    */
    padding-top: 1em;
    padding-left: 1em;
    padding-right: 1em;
  }

</style>
</head>
<body>

  <div id='calendar-container'>
      <div id='calendar'></div>
    </div>

</body>
</html>
