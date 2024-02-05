<div class="container-fluid card shadow bg-secondary bordered">
    <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
    <div class="table-responsive border-0"  id='eventsTable'>
        <?php 
            $message = "SELECT * FROM calendarfortechnical WHERE user = ? ORDER BY id DESC LIMIT 25";
            $link->set_charset("utf8");
            $stmt = $link->prepare($message);
            $stmt->bind_param("s", $a);
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
                    <h4 class='title_table'>
                        <span class='text_title_date'>{$formattedDate}</span>
                    </h4>";
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
                echo "<tbody>";
                    foreach ($events as $event) 
                    {
                        echo "<tr>";
                            echo "<td><input value='" . htmlspecialchars($event['date_start_event']) . "' id='date_start_event' min='" . htmlspecialchars($event['date_start_event']) . "' onkeydown='return false'  type='date' class='form-control form-control-sm border-0' /></td>";
                            echo "<td><input value='" . htmlspecialchars($event['time_start']) . "' id='begin_time_redact' type='time' class='form-control form-control-sm border-0' /></td>";
                            echo "<td><input value='" . htmlspecialchars($event['date_end_event']) . "' id='date_end_event' min='" . htmlspecialchars($event['date_start_event']) . "' type='date' class='form-control form-control-sm border-0'  /></td>";
                            echo "<td><input value='" . htmlspecialchars($event['time_end']) . "' id='ending_time_redact' type='time' class='form-control form-control-sm border-0' /></td>";
                            echo "<td><input value='" . htmlspecialchars($event['date_time_event']) . "' id='total_redact' step='15' type='number' class='form-control form-control-sm border-0' /></td>";
                            echo "<td><textarea id='name_event' type='text' class='form-control form-control-sm border-0'>" . htmlspecialchars($event['name_event']) . "</textarea></td>";
                            echo "<td>";
                                $event_сolor_redact_day = htmlspecialchars($event['event_color']);
                                echo "<input id='id_1_Gray' style='".($event_сolor_redact_day === 'Gray' ? 'background:Gray; width:30px; height:30px;' : 'background:white; width:30px; height:30px;')."' type='checkbox' name='color_readct_event' title='Собрания' 
                                onclick='changeColorTo_gray(this)' class='id_1 form-check-input' " . ($event_сolor_redact_day === 'Gray' ? 'checked' : '') . "/>";
                                echo "<input id='id_2_LightSeaGreen' style='".($event_сolor_redact_day === 'LightSeaGreen' ? 'background:LightSeaGreen; width:30px; height:30px;' : 'background:white; width:30px; height:30px;')."' type='checkbox' name='color_readct_event' title='Задачи' 
                                onclick='changeColorTo_light_sea_green(this)' class='id_2 form-check-input' " . ($event_сolor_redact_day === 'LightSeaGreen' ? 'checked' : '') . "/>";
                                echo "<input id='id_3_IndianRed' style='".($event_сolor_redact_day === 'IndianRed' ? 'background:IndianRed; width:30px; height:30px;' : 'background:white; width:30px; height:30px;')."'type='checkbox' name='color_readct_event' title='Повторяющиеся события' 
                                onclick='changeColorTo_indian_red(this)' class='id_3 form-check-input' " . ($event_сolor_redact_day === 'IndianRed' ? 'checked' : '') . "/>";
                            echo "</td>";
                            echo "<td>
                                <select id='status' class='form-select border-0'>";
                                $statusOptions = array('В процессе', 'Выполнено', 'Всё сложно');
                                foreach ($statusOptions as $option) 
                                {
                                    $selected = ($event['status'] === $option) ? 'selected' : '';
                                    echo "<option value='" . htmlspecialchars($option) . "' $selected>" . htmlspecialchars($option) . "</option>";
                                }
                                echo "</select>
                            </td>";
                            echo "<td style='height:20px;'><button value='" . htmlspecialchars($event['id']) . "' class='update_row btn btn-outline btn-sm btn-light' style='height:100%;' title='изменить' type='button'><img src='/Engels/icons/change.jpg' style='height:16px;'></button></td>";
                            echo "<td style='height:20px;'><button value='" . htmlspecialchars($event['id']) . "' class='delete_row btn btn-outline btn-sm btn-light' style='height:100%;' title='удалить' type='button'><img src='/Engels/icons/trash.png' style='height:16px;'></button></td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
                echo "</table>";
                echo "</fieldset>";
            }
            echo "<button id='loadMore' class='btn btn-sm btn-light btn_load_more'>Показать еще...</button>";
        ?>
        
    </div>
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
            // $.ajax(
            // {
            //     type: 'POST',
            //     dataType: 'html',
            //     url: '/Engels/personalArea/update.php',
            //     data: ({
            //         user: "<?php echo $a; ?>",
            //         id: id,
            //         status: status,
            //         name_event: name_event,
            //         event_color: event_color,
            //         date_start_event: date_start_event,
            //         date_time_event: date_time_event,
            //         time_start: time_start,
            //         time_end: time_end,
            //         repeatDate: repeat_date,
            //         date_end_event: date_end_event
            //     }),
            //     success: function(response)
            //     {
            //         $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
            //         var data = JSON.parse(response);
            //         if(status == 'Выполнено')
            //         {
            //             row.css("background", "lightgreen");
            //         }
            //         else
            //         {
            //             row.css("background", "white");
            //         }
            //     },
            //     error: function(xhr, status, error)
            //     {
            //     alert("Error: " + error);
            //     }
            // });
        }); 
    </script>
</div>
<script>
    var begin_time_redact_day = document.getElementById('begin_time_redact');
    var ending_time_redact_day = document.getElementById('ending_time_redact');
    var total_time_redact_day = document.getElementById('total_redact');

    // Функция для рассчета разницы времени и ее отображения
    function calculate_redact_day() 
    {
        var startTime = begin_time_redact_day.valueAsDate.getTime();
        var endTime = ending_time_redact_day.valueAsDate.getTime();

        if (!isNaN(startTime) && !isNaN(endTime)) 
        {
            var timeDiff = endTime - startTime;
            if (timeDiff > 0) 
            {
                var minutes = Math.floor(timeDiff / (1000 * 60));
                total_time_redact_day.value = minutes; // corrected variable name
            } else {
                total_time_redact_day.value = 'End time should be after start time'; // corrected variable name
            }
        }
    }
    begin_time_redact_day.addEventListener('input', calculate_redact_day);
    ending_time_redact_day.addEventListener('input', calculate_redact_day);
</script>
<script>
    function changeColorTo_gray(checkbox) 
    {
        if (checkbox.checked) 
        {
            checkbox.style.background = 'Gray';
            document.getElementById('id_2_LightSeaGreen').checked = false;
            document.getElementById('id_3_IndianRed').checked = false;
            document.getElementById('id_2_LightSeaGreen').style.background = '';
            document.getElementById('id_3').style.background = '';
            event_color = "Gray";
        } 
        else 
        {
            checkbox.style.background = '';
            event_color = '';
        }
    }
    
    function changeColorTo_indian_red(checkbox) 
        {
            if (checkbox.checked) 
            {
                checkbox.style.background = 'IndianRed';
                document.getElementById('id_1_Gray').checked = false;
                document.getElementById('id_2_LightSeaGreen').checked = false;
                document.getElementById('id_1_Gray').style.background = '';
                document.getElementById('id_2_LightSeaGreen').style.background = '';
                event_color = "IndianRed";
                const repeatDays = document.getElementById('repeatDays');
                repeatDays.style.display = 'block';
            } 
            else 
            {
                checkbox.style.background = '';
                event_color = '';
                const repeatDays = document.getElementById('repeatDays');
                repeatDays.style.display = 'none';
            }
        }
            
    function changeColorTo_light_sea_green(checkbox) 
        {
            if (checkbox.checked) 
            {
                checkbox.style.background = 'LightSeaGreen';
                document.getElementById('id_1_Gray').checked = false;
                document.getElementById('id_3_IndianRed').checked = false;
                document.getElementById('id_1_Gray').style.background = '';
                document.getElementById('id_3_IndianRed').style.background = '';
                event_color = "LightSeaGreen";
            } 
            else 
            {
                checkbox.style.background = '';
                event_color = '';
            }
        }
</script>
<script>
   $(".delete_row").click(function() 
    {
        var deleteUser = $(this).val();
        var row = $(this).closest("tr");
        row.css("background", "lightcoral");
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '/Engels/personalArea/delete.php',
            data: {idUser: deleteUser},
            success: function(response) 
            {
                var data = JSON.parse(response);
                row.fadeOut(500, function() 
                {
                    row.remove();
                });
                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
            }
        });
    });
</script>