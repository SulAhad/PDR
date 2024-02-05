<div class="modal" id="modal_update_banner">
    <div class="modal-content bg-light" id="draggable_update">
        <div class="checkbox-container" style="cursor:move; margin-top:-6px;">
            <span style="font-weight:bold; font-size:20px;">Изменить событие</span>
            <button  style="margin-left: auto;" type="button" class="btn btn-close" onclick="hide_modal_update()"></button>
        </div>
        <div class="checkbox-container mt-4" >
            <span style="color:gray; font-size:16px; width:40%;">Название</span>
            <textarea type="text" class="form-control form-control-sm" id="eventNameModalBody" style="margin-left: auto; width:58%; margin: 1px; border-radius: 10px;"></textarea>
        </div>
        <div class="checkbox-container mt-2">
            <span style="color:gray; font-size:16px; width:40%;">Начало</span>
            <input type="time" class="form-control form-control-sm" id="eventtime_start" style="margin-left: auto; width:20%; border-radius: 10px;"></input>
            <input type="date" class="form-control form-control-sm" id="eventDateStart" style="margin-left: auto; width:38%; border-radius: 10px;"></input>
            
        </div>
        <div class="checkbox-container mt-2">
            <span style="color:gray; font-size:16px; width:40%;">Завершение</span>
            
            <input type="time" class="form-control form-control-sm" id="eventtime_end" style="margin-left: auto; width:20%; border-radius: 10px;"></input>
            <input type="date" class="form-control form-control-sm" id="eventDateEnd" style="margin-left: auto; width:38%; border-radius: 10px;"></input>
        </div>
        <div class="checkbox-container mt-2" >
            <span style="color:gray; font-size:16px; width:40%;">Продолжительность</span>
            <input  type="number" class="form-control form-control-sm" id="eventDateTime" style="margin-left: auto; width:20%; border-radius: 10px;"><span style="margin-right: 225px;">мин.</span></input>
        </div>

        <div class="checkbox-container mt-2">
            <span style="color:gray; font-size:16px; width:40%;">Категория</span>
            <input type='checkbox' value="Gray" name='color' id='checkbox_Gray' title='Собрания' style='width:30px; height:30px; border-radius: 10px;' onclick='changeColorTo_Gray(this)' class='form-check-input'/>
            <input type='checkbox' value="LightSeaGreen" name='color' id='checkbox_LightSeaGreen' title='Задачи' style='width:30px; height:30px; border-radius: 10px;' onclick='changeColorTo_LightSeaGreen(this)' class='form-check-input'/>
            <input type='checkbox' value="IndianRed" name='color' id='checkbox_IndianRed' title='Повторяющиеся события' style='width:30px; height:30px; border-radius: 10px;' onclick='changeColorTo_IndianRed(this)' class='form-check-input'/>
        </div>
        <div id="validationCheckbox" class="invalid-feedback">пожалуйста, выберите категорию</div>
        <div id="fedback" class="valid-feedback">окей</div>

        <div class="checkbox-container mt-2" style="font-size:12px; display:none;" id="repeatDays">
            <span style="color:gray; font-size:16px; width:40%;">Повторять событие до</span>
            <div style="margin-left: auto; width:60%;">
                <input type="date" class="form-control form-control-sm" id="eventRepeatDate" style="border-radius: 10px;"></input>
                <div class="mt-2">
                    <input type="checkbox" class="form-check-input" id="" style="margin: 5px;"></input>
                    <input type="checkbox" class="form-check-input" id="" style="margin: 5px;"></input>
                    <input type="checkbox" class="form-check-input" id="" style="margin: 5px;"></input>
                    <input type="checkbox" class="form-check-input" id="" style="margin: 5px;"></input>
                    <input type="checkbox" class="form-check-input" id="" style="margin: 5px;"></input>
                    <br>
                    <style>
                        .meek_days{
                            margin: 4px;
                        }
                    </style>
                    <span class="meek_days">ПН</span>  
                    <span class="meek_days">ВТ</span>  
                    <span class="meek_days">СР</span>  
                    <span class="meek_days">ЧТ</span>  
                    <span class="meek_days">ПТ</span>
                </div>
            </div>
        </div>
        <div class="modal-footer mt-2">
            <span id="eventDateTime" style="display: none;"></span>
            <span id="eventColor" style="display: none;"></span>
            <span id="eventId" style="display: none;"></span>
            <button id="eventId" style=" background:lightgray; border-radius: 10px; margin-bottom: -15px; margin-left: -12px;" type='button' onclick='remove(this.parentNode);'  class='delete btn btn-sm btn-light' title='Удалить'><img src='/Engels/icons/trash.png' style='height:22px; background:lightgray;'></button>
            <button style="width:150px; background:lightgray; border-radius: 10px; margin-bottom: -15px; margin-left: 14px;" type="button" class="btn btn-sm" onclick="hide_modal_update()" title='Закрыть'>Закрыть</button>
            <button id="eventId" style="margin-left: auto; width:150px; background:Gold; border-radius: 10px; margin-bottom: -15px; margin-right: -12px;" type="button" class="btn btn-sm" onclick="update_button_for_modal_update()" title='Изменить'>Изменить</button>
        </div>
    </div>
</div>
<script>
    function changeColorTo_Gray(checkbox) {
        if (checkbox.checked) 
        {
            checkbox.style.background = 'Gray';
            document.getElementById('checkbox_LightSeaGreen').checked = false;
            document.getElementById('checkbox_IndianRed').checked = false;
            document.getElementById('checkbox_LightSeaGreen').style.background = '';
            document.getElementById('checkbox_IndianRed').style.background = '';
            event_color = "Gray";
            const repeatDays = document.getElementById('repeatDays');
            repeatDays.style.display = 'none';
        } 
        else 
        {
            checkbox.style.background = '';
            event_color = '';
        }
    }

    function changeColorTo_LightSeaGreen(checkbox) {
        if (checkbox.checked) 
        {
            checkbox.style.background = 'LightSeaGreen';
            document.getElementById('checkbox_Gray').checked = false;
            document.getElementById('checkbox_IndianRed').checked = false;
            document.getElementById('checkbox_Gray').style.background = '';
            document.getElementById('checkbox_IndianRed').style.background = '';
            event_color = "LightSeaGreen";
            const repeatDays = document.getElementById('repeatDays');
            repeatDays.style.display = 'none';
        } 
        else 
        {
            checkbox.style.background = '';
            event_color = '';
        }
    }

    function changeColorTo_IndianRed(checkbox) {
        if (checkbox.checked) 
        {
            checkbox.style.background = 'IndianRed';
            document.getElementById('checkbox_Gray').checked = false;
            document.getElementById('checkbox_LightSeaGreen').checked = false;
            document.getElementById('checkbox_Gray').style.background = '';
            document.getElementById('checkbox_LightSeaGreen').style.background = '';
            event_color = "IndianRed";
            const repeatDays = document.getElementById('repeatDays');
            repeatDays.style.display = 'block';
            repeatDays.style.opacity = '0';
            repeatDays.style.height = '0';
            repeatDays.style.transition = 'opacity 1s, height 1s';

            // Задержка перед изменением прозрачности и высоты элемента
            setTimeout(function() {
            repeatDays.style.opacity = '1';
            repeatDays.style.height = '100px'; // Здесь нужно указать желаемую высоту
            }, 100);
        } 
        else 
        {
            checkbox.style.background = '';
            event_color = '';
            const repeatDays = document.getElementById('repeatDays');

            repeatDays.style.display = 'none';
        }
    }
</script>
<script>
    // Получаем ссылки на элементы управления временем
    var timeStartInput = document.getElementById('eventtime_start');
    var timeEndInput = document.getElementById('eventtime_end');
    var dateTimeInput = document.getElementById('eventDateTime');

    // Добавляем обработчик события изменения времени для элементов ввода
    timeStartInput.addEventListener('input', calculateTimeDifference_update);
    timeEndInput.addEventListener('input', calculateTimeDifference_update);

    // Функция для рассчета разницы времени и ее отображения
    function calculateTimeDifference_update() 
    {
        var startTime = timeStartInput.valueAsDate.getTime();
        var endTime = timeEndInput.valueAsDate.getTime();

        if (!isNaN(startTime) && !isNaN(endTime)) 
        {
            var timeDiff = endTime - startTime;
            if (timeDiff > 0) 
            {
                var minutes = Math.floor(timeDiff / (1000 * 60));
                dateTimeInput.value = minutes;
            } 
            else 
            {
                dateTimeInput.value = 'End time should be after start time';
            }
        }
    }   
</script>
<script>
    // $(".delete").click(function() 
    // {
    //     alert(1);
    //     var delete_event =('#eventId').val();
    //     var row = (this).closest("td");.ajax(
    //         type: 'POST',
    //         dataType: 'html',
    //         url: '/Engels/personalArea/delete.php',
    //         data: idUser: delete_event,
    //         success: function(response) {
    //             alert(response);
    //             (element).animate(height: 'toggle', 500, function() {
    //                 row.remove();(this).remove();
    //             );
    //             ('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
    //         });
    //     });
    function remove(element) {
    var delete_event = $('#eventId').val();
    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: '/Engels/personalArea/delete.php',
        data: {idUser: delete_event},
        success: function(response) {
            $(element).siblings('.div_hover').animate({height: 'toggle'}, 500, function() {
                $(element).siblings('.div_hover').remove(); // Удаляем ближайший элемент с классом 'div_hover'
            });
            $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
        }
    });
}

//     const checkboxes = document.getElementsByName('color');
// var event_color_alert = '';

// checkboxes.forEach(checkbox => {
//     checkbox.addEventListener('change', function() {
//         checkboxes.forEach(cb => {
//             if (cb !== checkbox) {
//                 cb.checked = false;
//             }
//         });

//         if (checkbox.checked) {
//             const name = checkbox.getAttribute('id');
//             event_color_alert = name; // изменение: используем глобальную переменную
//             alert(event_color_alert);
//         }
//     });
// });

function update_button_for_modal_update(event_color_alert) 
{

    var id = $('#eventId').val();
    var name_event = $("#eventNameModalBody").val();
    var date_start_event = $("#eventDateStart").val();
    var date_end_event = $("#eventDateEnd").val();
    var time_end = $("#eventtime_end").val();
    var time_start = $("#eventtime_start").val();
    var date_time_event = $("#eventDateTime").val();
    const repeatDate = new Date(date_end_event);
    repeatDate.setDate(repeatDate.getDate() + 1);
    var repeat_date = repeatDate.toISOString().split('T')[0];
    var checkedValue = [];
    $("input[name='color']:checked").each(function () {
        checkedValue.push($(this).attr('value'));
    });
  
    var eventColor = checkedValue[0];
    if (eventColor == ''){
        event_color = $("#eventColor").val();
    }
    if (event_color === "") 
    {
        $("#checkbox_Gray").addClass("is-invalid");
        $("#checkbox_LightSeaGreen").addClass("is-invalid");
        $("#checkbox_IndianRed").addClass("is-invalid");
        $("#validationCheckbox").show();
    }
    else 
        {
            $("#checkbox_IndianRed").removeClass("is-invalid");
            $("#checkbox_IndianRed").addClass("is-valid");
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '/Engels/personalArea/update_newCalendar.php',
                data: ({
                    id: id,
                    name_event: name_event,
                    event_color: event_color,
                    date_start_event: date_start_event,
                    time_start: time_start,
                    time_end: time_end,
                    date_time_event: date_time_event,
                    repeatDate: repeat_date,
                    date_end_event: date_end_event
                }),
                success: function(response) {
                    document.location.reload();
                },
                error: function(xhr, status, error) {
                    alert("Error: " + error);
                }
            });
        }
}

        
        
        
    
    window.addEventListener('click', function(event) 
    {
        if (event.target === document.getElementById('modal_update_banner')) 
        {
            document.getElementById('modal_update_banner').style.display = 'none';
        }
    });
</script>