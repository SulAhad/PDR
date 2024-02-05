<div id="modal_add_banner" class="modal">
    <div class="modal-content bg-light" id="draggable_add">
        <div class="checkbox-container"  style="cursor:move; margin-top:-6px;">
            <span style="font-weight:bold; font-size:20px;">Новое событие</span>
            <button type="button" class="close_add_modal btn btn-sm btn-close" style="margin-left: auto;" onclick="hide_modal_add()"></button>
        </div>
        <div class="checkbox-container mt-4">    
            <label style="font-size:12px; margin:0 30px 10px 0; font-size:16px; color:gray;" for="input_name_event">Название</label>
            <textarea type="text" id="input_name_event" class="form-control form-control-sm" style="margin-left: auto; border-radius: 10px;" required></textarea>
        </div>
            <div id="validationServer03Feedback" class="invalid-feedback">
                пожалуйста, заполните это поле
            </div>
            <div id="fedback" class="valid-feedback">
                окей
            </div>
        <div class="checkbox-container mt-2">
            <p style="font-size:12px; margin:5px 25px 0 0; font-size:16px; color:gray; width:47.5%;" class="mt-2">Категория</p>
            <input type='checkbox' name='color' id='id_1' title='Собрания' style='width:30px; height:30px; border-radius: 10px;' onclick='changeColorTo_1(this)' class='id_1 form-check-input' required/>
            <input type='checkbox' name='color' id='id_2' title='Задачи' style='width:30px; height:30px; border-radius: 10px;' onclick='changeColorTo_2(this)' class='id_2 form-check-input' required/>
            <input type='checkbox' name='color' id='id_3' title='Повторяющиеся события' style='width:30px ; height:30px; border-radius: 10px;' onclick='changeColorTo_3(this)' class='id_3 form-check-input' required/>
        </div>
        <div id="validationCheckbox" class="invalid-feedback">пожалуйста, заполните это поле</div>
        <div id="fedback" class="valid-feedback">окей</div>
        <div class="checkbox-container mt-2">
            <span style="color:gray; font-size:16px; width:52%;">Начало</span>
            <input value="<?php echo date('H:i'); ?>" class="form-control form-control-sm" type="time" id='begin_time' min="07:00" max="17:00" style="margin-left: auto; width:24%; border-radius: 10px;">
            <input value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d') ?>" id="input_date_start_event" type="date" class="form-control form-control-sm" style="margin-left: auto; width:24%; border-radius: 10px; margin-right: -2px;">
            
        </div>
        <div class="checkbox-container mt-2">
            <span style="color:gray; font-size:16px; width:52%;">Завершение</span>
            <input value="<?php echo date('H:i', strtotime('+30 minutes')); ?>" class="form-control form-control-sm" type="time" id='ending_time' style="margin-left: auto; width:24%; border-radius: 10px;">
            <input value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d') ?>" id="input_date_end_event" type="date" class="form-control form-control-sm" style="margin-left: auto; width:24%; border-radius: 10px; margin-right: -2px;">
            
        </div>
        <div class="checkbox-container mt-2" >
            <span style="color:gray; font-size:16px; width:66%;">Продолжительность</span>
            <input value="30" id="input_date_time_event" type="number" min="15" max="480" step="15" class="form-control form-control-sm " required style="margin-left: auto; width:29%; border-radius: 10px;"><span style="margin-right: 122px;">мин.</span></input>
        </div>
        <div id="validationServer03" class="invalid-feedback">
            пожалуйста, заполните это поле
        </div>
        <div id="fedback" class="valid-feedback">
            окей
        </div>
        <div class="checkbox-container mt-2">
            <p style="font-size:12px; margin:5px 36px 0 0; font-size:16px; color:gray;" >Повторять событие</p>
                <input id="repeat_event" type="checkbox" class="form-check-input" style="display: inline-block;"></input>
                <div style="font-size:12px; display:none;" id="repeatDays" >
                    повторять событие до
                    <input min="<?php echo date('Y-m-d'); ?>" style="width:50%; display: inline-block;" type="date" id="repeatDate" value="<?php $date = substr(date('Y-m-d', strtotime($order->date.'+1 day')),0,10);  echo $date; ?>" class="form-control form-control-sm" ></input>
                </div>
            <button style="margin-left: auto; width:150px; background:Gold; border-radius: 10px;" type="button" class="add_event btn btn-sm">Создать</button>
        </div>
    </div>
</div>
<script>
    function changeColorTo_1(checkbox) 
    {
        if (checkbox.checked) 
        {
            checkbox.style.background = 'Gray';
            document.getElementById('id_2_LightSeaGreen').checked = false;
            document.getElementById('id_3_IndianRed').checked = false;
            document.getElementById('id_2_LightSeaGreen').style.background = '';
            document.getElementById('id_3_IndianRed').style.background = '';
            event_color = "Gray";
        } 
        else 
        {
            checkbox.style.background = '';
            event_color = '';
        }
    }
    
    function changeColorTo_3(checkbox) 
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
            
    function changeColorTo_2(checkbox) 
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
    
function hide_modal_add() 
        {
            document.getElementById('modal_add_banner').style.display = 'none';
        }
</script>
<script>
    const inputStartDate = document.getElementById('input_date_start_event');
    const inputEndDate = document.getElementById('input_date_end_event');
    const inputRepeatdDate = document.getElementById('repeatDate');
    inputStartDate.addEventListener('change', function() 
        {
            const startDate = new Date(this.value);
            const endDate = new Date(inputEndDate.value);
            if (startDate > endDate) 
            {
                inputEndDate.value = this.value;
                inputRepeatdDate.value = this.value;
            }
            inputEndDate.min = this.value;
            const repeatDate = new Date(this.value);
            repeatDate.setDate(repeatDate.getDate() + 1);
            inputRepeatdDate.value = repeatDate.toISOString().split('T')[0];
        });
</script>
<script>
    var begin_time = document.getElementById('begin_time');
    var ending_time = document.getElementById('ending_time');
    var total_time = document.getElementById('input_date_time_event');

    // Функция для рассчета разницы времени и ее отображения
    function calculate() {
        var startTime = begin_time.valueAsDate.getTime();
        var endTime = ending_time.valueAsDate.getTime();

        if (!isNaN(startTime) && !isNaN(endTime)) {
            var timeDiff = endTime - startTime;
            if (timeDiff > 0) {
                var minutes = Math.floor(timeDiff / (1000 * 60));
                total_time.value = minutes;
            } else {
                total_time.value = 'End time should be after start time';
            }
        }
    }

    // Добавляем обработчики событий для полей с id=1 и id=2
    begin_time.addEventListener('input', calculate);
    ending_time.addEventListener('input', calculate);
</script>
<script>
    $(".add_event").click(function() 
        {
            var input_name_event = $("#input_name_event").val();
            var input_date_time_event = $("#input_date_time_event").val();
            
            if (input_name_event === "") 
            {
                $("#input_name_event").addClass("is-invalid");
                $("#validationServer03Feedback").show();
                return;
            } 
            if (input_date_time_event === "") 
            {
                $("#input_date_time_event").addClass("is-invalid");
                $("#validationServer03").show();
                return;
            }
            if (event_color === "") 
            {
                $("#id_1").addClass("is-invalid");
                $("#id_2").addClass("is-invalid");
                $("#id_3").addClass("is-invalid");
                $("#validationCheckbox").show();
                return;
            }
            else 
                {
                    $("#input_name_event").removeClass("is-invalid");
                    $("#input_name_event").addClass("is-valid");
                    $("#input_date_time_event").removeClass("is-invalid");
                    $("#input_date_time_event").addClass("is-valid");
                    $("#validationServer03Feedback").hide();
                    $("#validationServer03").hide();
                    $("#id_3").removeClass("is-invalid");
                    $("#id_3").addClass("is-valid");
                    $("#validationCheckbox").hide();
                    var user = "<?php echo $a; ?>";
                    var input_name_event = $('#input_name_event').val();
                    var input_date_start_event = $('#input_date_start_event').val();
                    var input_date_end_event = $('#input_date_end_event').val();
                    var time_start = $('#begin_time').val();
                    var time_end = $('#ending_time').val();
                    var repeatDate = $('#repeatDate').val();
                    var status = 'В процессе';
                    var repeat_event = $('#repeat_event').is(':checked') ? 1 : 0;
                    var date_time_event = $('#input_date_time_event').val();
                        $.ajax({
                            type: 'POST',
                            dataType: 'html',
                            url: '/Engels/personalArea/add.php',
                            data: {
                                user: user,
                                status: status,
                                repeatDate: repeatDate,
                                name_event: input_name_event,
                                event_color: event_color,
                                date_start_event: input_date_start_event,
                                date_end_event: input_date_end_event, 
                                time_start: time_start,
                                time_end: time_end, 
                                date_time_event: date_time_event,
                                repeat_event: repeat_event
                            },
                            success: function(response) 
                            {
                                // var data = JSON.parse(response);
                                document.location.reload();
                            },
                            error: function(xhr, status, error) 
                            {
                                alert("Error: " + error);
                            } 
                        });
                }
        });
    window.addEventListener('click', function(event) 
    {
        if (event.target === document.getElementById('modal_add_banner')) 
        {
            document.getElementById('modal_add_banner').style.display = 'none';
        }
    });
</script>