<?php 
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$offset = $_POST['offset'];
$user = $_POST['user'];
$message = "SELECT * FROM calendarfortechnical WHERE user = ? ORDER BY date_start_event DESC LIMIT 25 OFFSET ?";
$link->set_charset("utf8");
$stmt = $link->prepare($message);
$stmt->bind_param("si", $user, $offset);
$stmt->execute();
$result = $stmt->get_result();
$groupedEvents = array();
while ($row = mysqli_fetch_assoc($result)) 
{
    $eventDate = date("d.m.Y", strtotime($row['date_start_event']));
    if (!array_key_exists($eventDate, $groupedEvents)) 
    {
        $groupedEvents[$eventDate] = array();
    }
    $groupedEvents[$eventDate][] = $row;
}
foreach ($groupedEvents as $date => $events) 
{
    $formattedDate = strftime('%e %B', strtotime($date));
    echo "<fieldset class='form-group border m-1 p-1 border-0 card bordered'>";
    echo "<table class='table-bordered table table-sm table_border'>
        <h4  class='title_table'>
            <span class='text_title_date'>{$formattedDate}</span>
        </h4>" ;
        echo "<thead class='text-muted bg-light'>";
            echo "<th class='col-1' colspan='2'><p>Начало</p></th>";
            echo "<th class='col-1' colspan='2'><p>Завершение</p></th>";
            echo "<th class='col-1'><p>Время</p></th>";
            echo "<th class='col-6'><p>Описание</p></th>";
            echo "<th class='col-1'><p>Категория</p></th>";
            echo "<th class='col-2'><p>Статус</p></th>";
            echo "<th class='col-0'></th>";
            echo "<th class='col-0'></th>";
        echo "</thead>";
    echo "<tbody style=' font-family: Calibri Light;'>";
        foreach ($events as $event) 
        {
            $html = "<tr>";
                $html .= "<td><input id='date_start_event' value='" . htmlspecialchars($event['date_start_event']) . "' onkeydown='return false'  type='date' class='form-control form-control-sm border-0' /></td>";
                $html .= "<td><input id='time_start' type='time' value='" . htmlspecialchars($event['time_start']) . "' class='form-control form-control-sm border-0' /></td>";
                $html .= "<td><input id='date_end_event' value='" . htmlspecialchars($event['date_end_event']) . "' type='date' class='form-control form-control-sm border-0' /></td>";
                $html .= "<td><input id='time_end' type='time' value='" . htmlspecialchars($event['time_end']) . "' class='form-control form-control-sm border-0' /></td>";
                $html .= "<td><input id='date_time_event' value='" . htmlspecialchars($event['date_time_event']) . "' step='15' type='number' class='form-control form-control-sm border-0' /></td>";
                $html .= "<td><textarea id='name_event' type='text' class='form-control form-control-sm border-0'>" . htmlspecialchars($event['name_event']) . "</textarea></td>";
                $html .= "<td>
                    <input id='Gray' style='".($event['event_color'] === 'Gray' ? 'background:Gray; width:30px; height:30px;' : 'background:white; width:30px; height:30px;')."' type='checkbox' name='color' title='Собрания' onclick='changeColorTo_1(this)' class='id_1 form-check-input' " . ($event['event_color'] === 'Gray' ? 'checked' : '') . "/><input 
                    
                    id='LightSeaGreen' style='".($event['event_color'] === 'LightSeaGreen' ? 'background:LightSeaGreen; width:30px; height:30px;' : 'background:white; width:30px; height:30px;')."' type='checkbox' name='color' title='Задачи' onclick='changeColorTo_2(this)' class='id_2 form-check-input' " . ($event['event_color'] === 'LightSeaGreen' ? 'checked' : '') . "/><input 
                    
                    id='IndianRed' style='".($event['event_color'] === 'IndianRed' ? 'background:IndianRed; width:30px; height:30px;' : 'background:white; width:30px; height:30px;')."' type='checkbox' name='color' title='Повторяющиеся события' onclick='changeColorTo_3(this)' class='id_3 form-check-input' " . ($event['event_color'] === 'IndianRed' ? 'checked' : '') . "/>
                </td>";
                $html .= "<td><select id='status' class='form-select border-0'>";
                $statusOptions = array('В процессе', 'Выполнено', 'Всё сложно');
                foreach ($statusOptions as $option) 
                {
                    $selected = ($event['status'] === $option) ? 'selected' : '';
                    $html .= "<option value='" . htmlspecialchars($option) . "' $selected>" . htmlspecialchars($option) . "</option>";
                }
                $html .= "</select></td>";
                $html .= "<td style='height:20px;'><button class='update_row btn btn-outline btn-sm btn-light' value='" . htmlspecialchars($event['id']) . "' style='height:100%;' title='изменить' type='button'><img src='/Engels/icons/change.jpg' style='height:16px;' /></button></td>";
                $html .= "<td style='height:20px;'><button class='delete_row btn btn-outline btn-sm btn-light' value='" . htmlspecialchars($event['id']) . "' style='height:100%;' title='удалить' type='button'><img src='/Engels/icons/trash.png' style='height:16px;' /></button></td>";
            $html .= "</tr>";
            echo $html;
        }
    echo "</tbody>";
    echo "</table>";
echo "</fieldset>";
}
?>
<script>
        $(".update_row").click
        (function()
        {
            var id = $(this).val();
            alert(id);
            var row = $(this).closest("tr");
            var name_event = $(this).closest("tr").find("#name_event").val();
            // var event_color = $(this).closest("tr").find("#event_color").val();
            var date_start_event = $(this).closest("tr").find("#date_start_event").val();
            var date_end_event = $(this).closest("tr").find("#date_end_event").val();
            var time_start = $(this).closest("tr").find("#begin_time_redact").val();
            var time_end = $(this).closest("tr").find("#ending_time_redact").val();
            var date_time_event = $(this).closest("tr").find("#total_redact").val();
            var status = $(this).closest("tr").find("#status").val();
            const repeatDate = new Date(date_end_event);
            repeatDate.setDate(repeatDate.getDate() + 1);
            var repeat_date = repeatDate.toISOString().split('T')[0];
            row.css("background", "yellow");
            $.ajax(
            {
                type: 'POST',
                dataType: 'html',
                url: '/Engels/personalArea/update.php',
                data: ({
                    user: "<?php echo $a; ?>",
                    id: id,
                    status: status,
                    name_event: name_event,
                    event_color: event_color,
                    date_start_event: date_start_event,
                    date_time_event: date_time_event,
                    time_start: time_start,
                    time_end: time_end,
                    repeatDate: repeat_date,
                    date_end_event: date_end_event
                }),
                success: function(response)
                {
                    $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                    var data = JSON.parse(response);
                    if(status == 'Выполнено')
                    {
                        row.css("background", "lightgreen");
                    }
                    else
                    {
                        row.css("background", "white");
                    }
                },
                error: function(xhr, status, error)
                {
                alert("Error: " + error);
                }
            });
        }); 
    </script>