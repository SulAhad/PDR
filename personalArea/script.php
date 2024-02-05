<script>
let event_color = '';
document.addEventListener("DOMContentLoaded", function() 
{
    
    var offset = 25;
    $('#loadMore').click(function() {
        $.ajax({
            url: 'loadMoreEvents.php',
            method: 'POST',
            data: { offset: offset, user: "<?php echo $a; ?>" },
            success: function(response) {
                $('#eventsTable').append(response); // Используем tbody вместо всей таблицы
                offset += 25;
            },
            error: function(xhr, status, error)
                {
                alert("Error: " + error);
                alert("Error: " + xhr);
                alert("Error: " + status);
                }
        });
    });

    $('.event_checkbox').on('change', function()
    {
        var taskId = $(this).val();
        var status = $(this).is(':checked') ? "Выполнено" : "В процессе";
        $.ajax({
            type: 'POST',
            url: 'update_status.php',
            data: { id: taskId, status: status },
            success: function(response){
            }
        });
    });

    const repeatCheckbox = document.getElementById('repeat_event');
    const repeatDays = document.getElementById('repeatDays');
    repeatCheckbox.addEventListener('change', function() 
        {
            if (this.checked) 
            {
                repeatDays.style.display = 'block';
            } 
            else 
            {
                repeatDays.style.display = 'none';
            }
        });

    // const StartDate = document.getElementById('date_start_event');
    // const EndDate = document.getElementById('date_end_event');
    // const RepeatdDate = document.getElementById('inputRepeatdDate');
        
    // StartDate.addEventListener('change', function() 
    // {
    //     const startDate = new Date(this.value);
    //     const endDate = new Date(EndDate.value);
    
    //     if (startDate > endDate) 
    //     {
    //         EndDate.value = this.value;
    
    //         const repeatDate = new Date(this.value);
    //         repeatDate.setDate(repeatDate.getDate() + 1);
    //         RepeatdDate.value = repeatDate.toISOString()[0];
    //     }
    // });
});

$(function() 
{ 
    $(document).tooltip(); 

    $( "#draggable_update" ).draggable();

    $( "#draggable_add" ).draggable();

    $( "#draggable_event" ).draggable();
});

function open_modal_update(eventName, eventDateStart, eventDateEnd, repeatDate, eventDateTime, eventColor, eventId, time_start, time_end) {
    var eventNameModalBody = document.getElementById('eventNameModalBody');
    eventNameModalBody.value = eventName;
    var eventDateTimeSpan = document.getElementById('eventDateTime');
    eventDateTimeSpan.value = eventDateTime;
    eventDateTimeSpan.step = 15;
    eventDateTimeSpan.min = 15;

    var eventDateStartSpan = document.getElementById('eventDateStart');
    eventDateStartSpan.value = eventDateStart;

    var eventDateEndSpan = document.getElementById('eventDateEnd');
    eventDateStartSpan.addEventListener('change', function() {
  // Установить минимальную дату в eventDateEndSpan равной выбранной дате в eventDateStartSpan
  eventDateEndSpan.min = eventDateStartSpan.value;

  // Если значение в eventDateEndSpan уже меньше новой минимальной даты,
  // обновите его значение, чтобы соответствовать новой минимальной дате
  if (eventDateEndSpan.value < eventDateEndSpan.min) {
    eventDateEndSpan.value = eventDateEndSpan.min;
  }
});
    eventDateEndSpan.value = eventDateEnd;
    
    
    var date = new Date(eventDateEndSpan.value);
    date.setDate(date.getDate() - 1);
    var year = date.getFullYear();
    var month = ('0' + (date.getMonth() + 1)).slice(-2);
    var day = ('0' + date.getDate()).slice(-2);
    var formattedDate = year + '-' + month + '-' + day;
    eventDateEndSpan.value = formattedDate;
   


    var eventTimeStartSpan = document.getElementById('eventtime_start');
    eventTimeStartSpan.value = time_start;

    var repeatDateSpan = document.getElementById('eventRepeatDate');
    repeatDateSpan.value = repeatDate;
    repeatDateSpan.min = eventDateTime;

    var eventTimeEndSpan = document.getElementById('eventtime_end');
    eventTimeEndSpan.value = time_end;

    var eventColorSpan = document.getElementById('eventColor');
    eventColorSpan.value = eventColor;
    var colorCheckboxes = document.querySelectorAll('input[name="color"]');
    colorCheckboxes.forEach(function (checkbox) {
        if (eventColor.includes(checkbox.id)) {
            checkbox.checked = true;
            checkbox.style.background = eventColor;
        } else {
            checkbox.checked = false;
            checkbox.style.background = 'initial';
        }
    });

    var eventIdSpan = document.getElementById('eventId');
    eventIdSpan.value = eventId;
    document.getElementById('modal_update_banner').style.display = 'block';
    document.getElementById('eventNameModalBody').focus();
}

function hide_modal_update() 
    {
        document.getElementById('modal_update_banner').style.display = 'none';
    }



function validateInput(input) 
    {
        var value = input.value;
        var regex = /^[0-9.]+$/; // только цифры и точка
        if (!regex.test(value)) 
        {
            input.value = input.value.replace(/[^0-9.]/g, ''); // удаляем все символы кроме цифр и точки
            input.style.backgroundColor = 'lightcoral'; // подсвечиваем красным
            $(input).tooltip({ // инициализируем tooltip
                show: { effect: "fade", duration: 200 },
                hide: { effect: "fade", duration: 200 }
            }).tooltip("open"); // открываем tooltip
        } 
        else 
        {
            var dotCount = (value.match(/\./g) || []).length; // считаем количество точек
            if (dotCount > 1) 
            {
                input.value = input.value.replace(/\./g, ''); // удаляем все точки кроме первой
                input.style.backgroundColor = 'red'; // подсвечиваем красным
                $(input).tooltip({ // инициализируем tooltip
                    show: { effect: "fade", duration: 200 },
                    hide: { effect: "fade", duration: 200 }
                }).tooltip("open"); // открываем tooltip
            } 
            else 
            {
                input.style.backgroundColor = ''; // сбрасываем цвет
                $(input).tooltip("destroy"); // удаляем tooltip
            }
        }
    }

            
   
</script>
