<fieldset id='event-list' class="form-group border card shadow-sm p-1" >
<div class="table-responsive">
    <table id="myTable" class="table-hover table-bordered table table-sm">
        <thead class="bg-light text-dark">
                <tr>
                    <th class="col-1">Начало</th>
                    <th class="col-1">Завершение</th>
                    <th class="col-1">Продолжительность, мин.</th>
                    <th class="col-5">Название</th>
                    <th class="col-1">Категория</th>
                    <th class="col-2">Статус</th>
                    <th class="col-0"></th>
                    <th class="col-0"></th>
                </tr>
            </thead>
            <tbody onload="myFunction()" class="animate-bottom">
            <?php
                $message = "SELECT * FROM calendarfortechnical WHERE user = ? AND status != 'Выполнено'";
                $link->set_charset("utf8");
                $stmt = $link->prepare($message);
                $stmt->bind_param("s", $a);
                $stmt->execute();
                $result = $stmt->get_result();

                $statusOptions = array('В процессе', 'Выполнено', 'Всё сложно');
                $colorOptions = array('Red', 'Blue', 'Green', 'Yellow'); // здесь рекомендуется заменить эти значения на ваши фактические варианты цветов

                while ($row = mysqli_fetch_assoc($result)) {
                    $color = '';
                    if ($row['event_color'] === 'IndianRed') {
                        $color = 'IndianRed';
                    } elseif ($row['event_color'] === 'LightSeaGreen') {
                        $color = 'LightSeaGreen';
                    } elseif ($row['event_color'] === 'Gray') {
                        $color = 'Gray';
                    }
                    echo "<tr>";
                    echo "<td style='height:20px;'><input style='height:100%;' id='date_start_event' type='datetime-local' class='form-control form-control-sm border-0' value='{$row['date_start_event']}' /></td>";
                    echo "<td style='height:20px;'><input style='height:100%;' id='date_end_event' type='datetime-local' class='form-control form-control-sm border-0' value='{$row['date_end_event']}' /></td>";
                    echo "<td style='height:20px;'><input style='height:100%;' id='date_time_event' type='number' class='form-control form-control-sm border-0' value='{$row['date_time_event']}' /></td>";
                    echo "<td style='height:100%;'><textarea style='height:20px; resize:none;' id='name_event' type='text' class='form-control form-control-sm border-0'>{$row['name_event']}</textarea></td>";
                    
                    echo "<td >
                            <input id='event_color' value='{$color}' type='checkbox' style='width:30px; height:30px; background:{$color};' readonly  class='form-check-input'/>
                       </td>";
                    echo "<td><select id='status' class='form-select border-0'>";
                    foreach ($statusOptions as $option) {
                        $selected = ($row['status'] === $option) ? 'selected' : '';
                        echo "<option value='$option' $selected>$option</option>";
                    }
                    echo "</select></td>";
                    if ($row['user'] === $a) {
                        echo "<td style='height:20px;'><button style='height:100%;' title='изменить' type='button' class='update btn btn-outline btn-sm btn-light' value='{$row['id']}'><img src='/Engels/icons/change.jpg' style='height:16px;'></button></td>";
                        echo "<td style='height:20px;'><button style='height:100%;' title='удалить' type='button' class='delete btn btn-outline btn-sm btn-light' value='{$row['id']}'><img src='/Engels/icons/trash.png' style='height:16px;'></button></td>";
                    }
                    echo "</tr>";
                }
                
                ?>
                <script>
                    $("textarea").each(function () {
                        this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                        }).on("input", function () {
                        this.style.height = 0;
                        this.style.height = (this.scrollHeight) + "px";
                        });
                </script>
                <script>
                    const StartDate = document.getElementById('date_start_event');
                    const EndDate = document.getElementById('date_end_event');
                    const RepeatdDate = document.getElementById('inputRepeatdDate');

                    StartDate.addEventListener('change', function() {
                        const startDate = new Date(this.value);
                        const endDate = new Date(EndDate.value);

                        if (startDate > endDate) {
                            EndDate.value = this.value;

                            const repeatDate = new Date(this.value);
                            repeatDate.setDate(repeatDate.getDate() + 1);
                            RepeatdDate.value = repeatDate.toISOString().split('T')[0];
                        }
                    });
                </script>
            </tbody>
        </table>
</div>
<script>
$(document).ready
    (function()
        {$(".update").click
            (function()
            {
                var id = $(this).val();
                var row = $(this).closest("tr");
                var name_event = $(this).closest("tr").find("#name_event").val();
                var event_color = $(this).closest("tr").find("#event_color").val();
                var date_start_event = $(this).closest("tr").find("#date_start_event").val();
                var date_end_event = $(this).closest("tr").find("#date_end_event").val();
                var date_time_event = $(this).closest("tr").find("#date_time_event").val();
                var status = $(this).closest("tr").find("#status").val();
                const repeatDate = new Date(date_end_event);
                repeatDate.setDate(repeatDate.getDate() + 1);
                var repeat_date = repeatDate.toISOString().split('T')[0];
                row.css("background", "yellow");
                $.ajax(
                        {type: 'POST',
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
                                repeatDate: repeat_date,
                                date_end_event: date_end_event}),
                            success: function(response)
                            {
                                $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                var data = JSON.parse(response);
                                if(status == 'Выполнено'){
                                    row.fadeOut(500, function() {
                                        row.remove();
                                    });
                                }
                                row.css("background", "white");
                            },
                            error: function(xhr, status, error)
                            {
                            alert("Error: " + error);
                            }
                    });
            });
});
</script>
<script>
$(document).ready(function() {
    $(".delete").click(function() {
        var deleteUser = $(this).val();
        var row = $(this).closest("tr");
        row.css("background", "lightcoral");
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '/Engels/personalArea/delete.php',
            data: {idUser: deleteUser},
            success: function(response) {
                var data = JSON.parse(response);
                row.fadeOut(500, function() {
                    row.remove();
                });
                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                
            }
        });
    });
});
</script>
</fieldset>