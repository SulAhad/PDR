
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const repeatCheckbox = document.getElementById('repeat_event');
        const repeatDays = document.getElementById('repeatDays');

        repeatCheckbox.addEventListener('change', function() {
            if (this.checked) {
            repeatDays.style.display = 'block';
            
            } else {
            repeatDays.style.display = 'none';
            }
        });
        });
    </script>
    <script>
        const inputStartDate = document.getElementById('input_date_start_event');
        const inputEndDate = document.getElementById('input_date_end_event');
        const inputRepeatdDate = document.getElementById('repeatDate');

        inputStartDate.addEventListener('change', function() {
            const startDate = new Date(this.value);
            const endDate = new Date(inputEndDate.value);

            if (startDate > endDate) {
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
    $('#monday').on('change', function() {
            var monday = $(this).is(':checked') ? "1" : "0";
            
        });

        $('#tuesday').on('change', function() {
            var tuesday = $(this).is(':checked') ? "1" : "0";
            
        });

        $('#wednesday').on('change', function() {
            var wednesday = $(this).is(':checked') ? "1" : "0";
        });

        $('#thursday').on('change', function() {
            var thursday = $(this).is(':checked') ? "1" : "0";
        });

        $('#friday').on('change', function() {
            var friday = $(this).is(':checked') ? "1" : "0";
        });

    
        $(document).ready(function() {
    $(".add_event").click(function() {
        
        var user = "<?php echo $a; ?>";
        var input_name_event = $('#input_name_event').val();
        var input_date_start_event = $('#input_date_start_event').val() + "T" + $('#1').val();
        var input_date_end_event = $('#input_date_end_event').val() + "T" + $('#2').val();
        var repeatDate = $('#repeatDate').val();
        var status = 'В процессе';
        var repeat_event = $('#repeat_event').is(':checked') ? 1 : 0;
        var date_time_event = $('#input_date_time_event').val();
        if(input_name_event != "" && event_color != "" && date_time_event != ""){
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
                date_time_event: date_time_event,
                repeat_event: repeat_event
            },
            success: function(response) {
                var data = JSON.parse(response);
                $('#input_name_event').val("");
                $('#input_text_event').val("");
                $('#1').val("");
                $('#2').val("");
                $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);

                var newRow = $("<tr>" +
                    "<td><input id='date_start_event_added' type='datetime-local' class='form-control form-control-sm border-0' value='" + data.date_start_event + "' /></td>" +
                    "<td><input id='date_end_event_added' type='datetime-local' class='form-control form-control-sm border-0' value='" + data.date_end_event + "' /></td>" +
                    "<td><input id='date_time_event_added' type='number' class='form-control form-control-sm border-0' value='" + data.date_time_event + "' /></td>" +
                    "<td style='height:100%;'><textarea style='height:20px;' id='name_event_added' type='text' class='form-control form-control-sm border-0'>" + data.name_event + "</textarea></td>" +
                    "<td style='height:100%;'><input type='checkbox' style='width:30px; height:30px; background:" + data.event_color + ";' readonly  class='form-check-input'/></td>" +
                    "<td><select id='status' class='form-select border-0'>" + 
                    "<option selected value='В процессе'>В процессе</option>" +
                    "<option value='Выполнено'>Выполнено</option>" +
                    "<option value='Всё сложно'>Всё сложно</option>" +
                    "</select></td>" +
                    "<td><button title='изменить' type='button' class='update_added btn btn-outline btn-sm btn-light' value='" + data.id + "'><img src='/Engels/icons/change.jpg' style='height:16px;'></button></td>" +
                    "<td><button title='удалить' type='button' class='delete_added btn btn-outline btn-sm btn-light' value='" + data.id + "'><img src='/Engels/icons/trash.png' style='height:16px;'></button></td>" +
                    "</tr>");
                    newRow.hide().appendTo('#myTable').fadeIn(0, function() {
                        $(this).find('td').css('background-color', 'lightblue').delay(3000).fadeOut(700, function() {
                            $(this).css('background-color', 'white').fadeIn(700);
                        });
                    });
                
                        },
            error: function(xhr, status, error) {
                alert("Error: " + error);
            } });
        }
        else{
            alert('Заполни пустые строки');
        }
         });});
</script>

<script>
$(document).ready(function() {
    $(document).on('click', '.update_added', function() {
        var id = $(this).val();
        var row = $(this).closest("tr");
        var dateStart = $(this).closest('tr').find('#date_start_event_added').val();
        var dateEnd = $(this).closest('tr').find('#date_end_event_added').val();
        var name = $(this).closest('tr').find('#name_event_added').val();
        var text = $(this).closest('tr').find('#text_event_added').val();
        var status = $(this).closest('tr').find('#status').val();
       
        row.css("background", "yellow");
                $.ajax(
                        {type: 'POST',
                            dataType: 'html',
                            url: '/Engels/personalArea/update_added.php',
                            data: ({
                                user: "<?php echo $a; ?>",
                                id: id,
                                name_event: name,
                                status: status,
                                text_event: text,
                                date_start_event: dateStart,
                                date_end_event: dateEnd}),
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
    $(document).on('click', '.delete_added', function() {
        var id = $(this).val();
        var row = $(this).closest("tr");
        row.css("background", "lightcoral");
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '/Engels/personalArea/delete.php',
            data: { idUser: id },
            success: function(response) {
                row.fadeOut(500, function() {
                    row.remove();
                });
                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
            },
            error: function(xhr, status, error) {
                alert("Error: " + error);
            }
        });
    });
});
</script>
<script>
        let event_color = '';
        function changeColorToGreen(checkbox) {
            if (checkbox.checked) {
                checkbox.style.background = 'Gray';
                document.getElementById('id_red').checked = false;
                document.getElementById('id_yellow').checked = false;
                document.getElementById('id_red').style.background = '';
                document.getElementById('id_yellow').style.background = '';
                event_color = "Gray";
            } else {
                checkbox.style.background = '';
                event_color = '';
            }
        }
        function changeColorToYellow(checkbox) {
            if (checkbox.checked) {
                checkbox.style.background = 'IndianRed';
                document.getElementById('id_green').checked = false;
                document.getElementById('id_red').checked = false;
                document.getElementById('id_green').style.background = '';
                document.getElementById('id_red').style.background = '';
                event_color = "IndianRed";
            } else {
                checkbox.style.background = '';
                event_color = '';
            }
        }
        function changeColorToRed(checkbox) {
            if (checkbox.checked) {
                checkbox.style.background = 'LightSeaGreen';
                document.getElementById('id_green').checked = false;
                document.getElementById('id_yellow').checked = false;
                document.getElementById('id_green').style.background = '';
                document.getElementById('id_yellow').style.background = '';
                event_color = "LightSeaGreen";
            } else {
                checkbox.style.background = '';
                event_color = '';
            }
        }
    </script>