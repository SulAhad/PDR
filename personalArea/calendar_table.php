<table class="table table-sm border-0" >
    <tr>
        <style>
            .div_hover:hover{
                border-radius: 7px;
                box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }
            
        </style>
        <?php
            // if (isset($_GET['week'])) {
            //     $startDate = date('Y-m-d', strtotime('monday this week' . ($weekOffset > 0 ? " +$weekOffset week" : "")));
            //     $endDate = date('Y-m-d', strtotime('friday this week' . ($weekOffset > 0 ? " +$weekOffset week" : "")));
                
            //     // Create the previous and next week links with updated offsets.
            //     $prevWeekOffset = max($weekOffset - 1, 0);
            //     $nextWeekOffset = $weekOffset + 1;
            //     $prevWeekLink = "?week=prev&offset=$prevWeekOffset";
            //     $nextWeekLink = "?week=next&offset=$nextWeekOffset";
            // }

            // $message = "SELECT DISTINCT user FROM calendarfortechnical ORDER BY id DESC;";
            // $link->set_charset("utf8");
            // $result_users = mysqli_query($link, $message);
            // $day_headers = ['Пн','Вт', 'Ср', 'Чт', 'Пт'];
            // $date_headers = [];
            // $currentDate = $startDate;
            // for ($i = 0; $i < 5; $i++) 
            // {$date_headers[] = strftime('%e. %m', strtotime($currentDate . " +$i day"));}
            // echo "<table style=' border: 1px solid lightgray; font-family: Calibri Light; font-weight:light;' class='table table-sm'>
            //             <tr style='border: 1px solid lightgray;'>
            //                 <th class='col-1 bg-white border-0'></th>";
            //                     foreach ($day_headers as $key => $day)
            //                     {
            //                         echo "<th style='background:white; font-family: Calibri Helvetica Neue; font-weight:400; color:black; border: 1px solid lightgray;' class='col-2 '>$day $date_headers[$key]</th>";
            //                     }
            //             echo "</tr>";
            //             while ($user_row = mysqli_fetch_assoc($result_users))
                    $startDate = date('Y-m-d', strtotime('monday this week'));
                    $endDate = date('Y-m-d', strtotime('friday this week'));
                    $message = "SELECT DISTINCT user FROM calendarfortechnical ORDER BY id DESC;";
                    $link->set_charset("utf8");
                    $result_users = mysqli_query($link, $message);
                    $day_headers = ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС'];
                    $date_headers = [];
                    $currentDate = date("d.m.Y");
                    for ($i = 0; $i < 7; $i++) 
                    {
                        $date_headers[] = strftime('%e', strtotime($startDate . " +$i day"));
                    }
                echo "<table style=' border: 1px solid lightgray; font-family: Calibri Light; font-weight:light; font-size:12px;' class='table table-sm'>
                        <tr style='border: 1px solid lightgray;'>
                            <th class='border-0' style='background:GhostWhite;'></th>";
                            foreach ($day_headers as $key => $day) 
                            {
                                $cellStyle = (date('Y-m-d', strtotime($startDate . " +$key day")) == date('Y-m-d')) ? "background:LightCyan;" : "background:white;";
                                echo "<th style='$cellStyle; font-family: Calibri Helvetica Neue; font-weight:400; text-align: left; 
                                    color:black; border: 1px solid lightgray; margin: 2px; width:12.5%;'><span style='font-size:26px; font-weight:bold; font-family: Calibri Light;'>$date_headers[$key]</span> 
                                    <span style='font-size:12px; color:gray; margin-top: -40px;'>$day </span> 
                                </th>";
                            }
                    echo "</tr>";
                                // Цикл получения всех пользователей
                        while ($user_row = mysqli_fetch_assoc($result_users))
                        {
                            $user = $user_row['user'];
                            $id = $user_row['id'];
                            $repeat = $user_row['repeat'];
                            
                            echo "<tr style='border: 1px solid lightgray;'>";
                    
                            echo "<td style='width:150px; background:GhostWhite; font-family: Calibri Light; font-weight:400; color:black; border: 1px solid lightgray;' onclick='show_modal_add()'>$user</td>";
                               // Выводим таблицу с действиями на каждый день текущей недели
                               for ($day = 1; $day <= 7; $day++) 
                               {
                                    $cell_id = "cell_$user_$day"; // Генерируем идентификатор для ячейки
                                    $current_day_events = array(); // Массив с данными о событиях отдельного пользователя на текущий день
                                    $current_date = date('Y-m-d', strtotime("$startDate +$day day")); // Устанавливаем текущую дату как дату в таблицее
                                    // Поиск пользователей ,задающих события, которые будут отображаться на текущем дне недели
                                    $escaped_user = mysqli_real_escape_string($link, $user);
                                    // Выбираем все события пользователя, которые должны отображаться на текущем дне недели
                                        $result = mysqli_query($link, "SELECT * FROM calendarfortechnical WHERE ((WEEKDAY(date_start_event) = $day-1 AND repeatDate IS NOT NULL AND repeatDate >= '$current_date') OR (date_start_event <= '$current_date' AND WEEKDAY(date_start_event) <= $day-1)) AND user = '$escaped_user'");
                                    while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                        $message_checkbox = "SELECT * FROM statusforuserscalendar WHERE date = DATE_FORMAT('$current_date', '%Y-%m-%d') AND user = '$user' LIMIT 1";
                                        $link->set_charset("utf8");
                                        $result_checkbox = mysqli_query($link, $message_checkbox);
                                        if (mysqli_num_rows($result_checkbox) < 0) 
                                        {
                                            $link->set_charset("utf8");
                                            mysqli_query($link, "INSERT INTO statusforuserscalendar (id, date, user) SELECT NULL, DATE_FORMAT('$current_date', '%Y-%m-%d'), '$row[user]' FROM DUAL WHERE '$user' NOT IN (SELECT user FROM statusforuserscalendar WHERE date = DATE_FORMAT('$current_date', '%Y-%m-%d'))");
                                        }
                                        if (!empty($row['repeatDate'])) 
                                        {
                                            $repeatDate = $row['repeatDate'];
                                            // Проверка даты, с которой должно повоторяться событие,
                                            // чтобы она была меньше текущей дате и меньше окончания события по времени
                                            if (strtotime($current_date) <= strtotime($repeatDate) || strtotime($current_date) < strtotime($row['date_end_event']) || strtotime($current_date) <= strtotime($row['date_end_event'])) 
                                            {
                                                $current_day_events[] = $row;
                                            }
                                        } 
                                        else 
                                        {
                                            $current_day_events[] = $row;
                                        }
                                    }
                                    $column_color = (date('Y-m-d', strtotime($current_date . " - 1 day")) == date('Y-m-d')) ? "background:LightCyan;" : "background:white;";
                                    echo "<td id='$cell_id' class='th_hover m-1' style='height: 100%; position: relative; text-align: left; vertical-align: top;  border: 1px solid lightgray; $column_color'>";
                                        if (!empty($current_day_events))
                                        {
                                            $resultUser = mysqli_query($link, "SELECT * FROM statusforuserscalendar WHERE user = '$user' AND date = '$current_date'");
                                            while ($rowUser = mysqli_fetch_assoc($resultUser)) 
                                            {
                                                echo"<div style='margin-top: -5px;'>";
                                                    require('check_box_status_day.php');
                                                echo"<div>";
                                            }
                                            $total_event_time = 0;
                                            usort($current_day_events, function($a, $b) {
                                                return strtotime($a['time_start']) - strtotime($b['time_start']);
                                            });
                                            foreach ($current_day_events as $event) 
                                            {
                                                $checkboxStatus = $event['status'] === "Выполнено" ? "checked" : "";
                                                $repeat = $event['repeat_event'];
                                                $total_event_time += $event['date_time_event'];
                                                $height = $event['date_time_event'] * 1.8; // Примерный коэффициент для преобразования времени в высоту
                                                echo"<div>";
                                                require('evnets_user.php');
                                                echo"<div>";
                                                
                                            }
                                            echo"<br><div class='mt-5'>";
                                            require('satisfaction_for_day.php');
                                            echo"<div>";
                                        }
                                    echo "</td>";
                                }
                    
                            echo "</tr>";
                           
                        }
            ?>
            
        </table>


<script>
    function open_uknown() 
    {
        alert(01);
    }
</script>
<script>
    $('.id_medium').on('change', function()
        {
            var id = $(this).val();
            var color_value = $(this).prop('checked') ? 1 : 0;
            var satisfaction = "medium";
            $.ajax({
                type: 'POST',
                url: 'update_satisfaction_for_day.php',
                data: {id:id, color_value: color_value, satisfaction:satisfaction },
                success: function(response){
                },
                error: function(xhr, status, error)
                {
                alert("Error: " + error);
                }
            });
        });

    $('.id_good').on('change', function()
    {
        var id = $(this).val();
        var color_value = $(this).prop('checked') ? 1 : 0;
        var satisfaction = "good";
        $.ajax({
            type: 'POST',
            url: 'update_satisfaction_for_day.php',
            data: {id:id, color_value: color_value, satisfaction:satisfaction },
            success: function(response){
            },
            error: function(xhr, status, error)
            {
            alert("Error: " + error);
            }
        });
    });
    $('.id_bad').on('change', function() 
        {
            
            var id = $(this).val();
            var color_value = $(this).prop('checked') ? 1 : 0;
            var satisfaction = "bad";
            $.ajax({
                type: 'POST',
                url: 'update_satisfaction_for_day.php',
                data: {id:id, color_value: color_value, satisfaction:satisfaction },
                success: function(response){
                },
                error: function(xhr, status, error)
                {
                alert("Error: " + error);
                }
            });
        });
</script>
<script>
    $('.id_green').on('change', function() 
    {
        var id = $(this).val();
        var green = $(this).prop('checked') ? 1 : 0;
        var name = "green";
        $.ajax({
                type: 'POST',
                url: '_update_status_for_day.php',
                data: {id:id, color_value: green, name:name },
                success: function(response){
                },
                error: function(xhr, status, error)
                {
                alert("Error: " + error);
                }
            });
        });

    $('.id_yellow').on('change', function()
    {
        var id = $(this).val();
        var color_value = $(this).prop('checked') ? 1 : 0;
        var name = "yellow";
        $.ajax({
                type: 'POST',
                url: '_update_status_for_day.php',
                data: {id:id, color_value: color_value, name:name },
                success: function(response){
                },
                error: function(xhr, status, error)
                {
                alert("Error: " + error);
                }
            });
        });

   
    $('.id_red').on('change', function(){
        var id = $(this).val();
        var color_value = $(this).prop('checked') ? 1 : 0;
        var name = "red";
        $.ajax({
                type: 'POST',
                url: '_update_status_for_day.php',
                data: {id:id, color_value: color_value, name:name },
                success: function(response){
                },
                error: function(xhr, status, error)
                {
                alert("Error: " + error);
                }
            });
        });
</script>
<script>
    function changeColorToGreen(checkbox) 
    {
        var id = $(this).find('#id_green').val();
        if (checkbox.checked) 
        {
            checkbox.style.background = 'green';
        } 
        else 
        {
            checkbox.style.background = '';
        }
    }
    function changeColorToYellow(checkbox) 
        {
            if (checkbox.checked) 
            {
                checkbox.style.background = 'yellow';
            } 
            else 
            {
                checkbox.style.background = '';
            }
        }
    function changeColorToRed(checkbox) 
        {
            if (checkbox.checked) 
            {
                checkbox.style.background = 'red';
            } 
            else 
            {
                checkbox.style.background = '';
            }
        }
</script>
