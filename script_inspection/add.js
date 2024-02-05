$(document).ready(function() 
{ $(".add").click(function() 
    {
        var intervention1 = document.getElementById('intervention1');
        var intervention2 = document.getElementById('intervention2');
        var formData = new FormData($('#image')[0]);
        var isButton1Pressed = false;
        var isButton2Pressed = false;
        if (intervention1.checked) {isButton1Pressed = 1;}
        else{isButton1Pressed = 0;}
        if (intervention2.checked) {isButton2Pressed = 1;}
        else{isButton2Pressed = 0;}
        
        var date = document.getElementById('date').value;
        var name = document.getElementById('name').value;
        var textForList = document.getElementById('textForList').value;
        const selectedButton = document.querySelector('#btnradio1:checked');
        const typeSafety = selectedButton ? selectedButton.value : 'Безопасно';
        var comment = document.getElementById('comment').value;
        var duration = document.getElementById('duration').value;
        var staff = document.getElementById('staff').value;
        var contract = document.getElementById('contract').value;
        var production = document.getElementById('production').value;
        var area = document.getElementById('areaCMC').value;
        if(name != "")
        {
            if (typeSafety == 'Небезопасно') 
            {
                var nameUser = 'Небезопасное замечание по листу обходов';
                var email = "production-daily-monitor@lab-industries-engels.ru";
                // Объявляем переменные name, textForList и comment
                var message = name + "\r\n" + textForList + "\r\n" + comment;
                $.ajax({
                    type: 'POST',
                    url: 'send_email.php',
                    data: 
                    {
                        name: name,
                        email: email,
                        message: message
                    },
                    success: function(response) 
                    {
                        $('#response').html(response);
                    }
                });
            }
            $.ajax({
            type: 'POST',
            dataType: 'html',
            url: 'addInspectionNew.php',
            data: {
                formData:formData,
                date: date,
                name: name,
                textForList: textForList,
                comment: comment,
                duration: duration,
                staff: staff,
                contract: contract,
                production: production,
                isButton1Pressed: isButton1Pressed,
                isButton2Pressed: isButton2Pressed,
                typeSafety: typeSafety,
                area: area
            },
            cache:false, // кэш и прочие настройки писать именно так (для файлов)
            // (связано это с кодировкой и всякой лабудой)
            contentType: false, // нужно указать тип контента false для картинки(файла)
            processData: false, // для передачи картинки(файла) нужно false
            success: function(response) 
                        {
                            $('#name').val('');
                            $('#textForList').val('');
                            $('#typeSafety').val('');
                            $('#comment').val('');
                            $('#intervention1').prop('checked', false);
                            $('#intervention2').prop('checked', false);
                            $('#duration').val('');
                            $('#staff').val('');
                            $('#contract').val('');
                            $('#production').val('');
                            $('#area').val('');
                            var data = JSON.parse(response);
                            var newRow = "<tr><td><input id='input_date' type='date' class='fontTr form-control border-0' value='" + 
                              data.date + "'></td><td><input id='input_name' type='text' class='fontTr form-control border-0' value='" + 
                              data.name + "'></td><td><input id='input_textForList' type='text' class='fontTr form-control border-0' value='" + 
                              data.textForList + "'></td><td><input id='input_typeSafety' type='text' class='fontTr form-control border-0' value='" + 
                              data.typeSafety + "'></td><td><input id='input_comment' type='text' class='fontTr form-control border-0' value='" + 
                              data.comment + "'></td><td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' value='" + data.intervention1 + "' " + (data.intervention1 == 1 ? 'checked' : 'unchecked') + "></td><td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' value='" + 
                              data.intervention2 + "' " + (data.intervention2 == 1 ? 'checked' : 'unchecked') + "></td><td><input id='input_duration' type='number' class='fontTr form-control border-0' value='" + 
                              data.duration + "'></td><td><input id='input_staff' type='number' class='fontTr form-control border-0' value='" + 
                              data.staff + "'></td><td><input id='input_contract' type='number' class='fontTr form-control border-0' value='" + 
                              data.contract + "'></td><td><input id='input_production' type='text' class='fontTr form-control border-0' value='" + 
                              data.production + "'></td><td><input id='input_area' type='text' class='fontTr form-control border-0' value='" + 
                              data.area + "'></td><td><button type='button' class='fontTr updateInspection btn btn-outline btn-sm btn-light' value='" + 
                            data.id + "'><img src='change.jpg' style='height:13px;'></button></td><td style='font-size:10px;'><button type='button' class='deleteInspection btn btn-outline btn-sm btn-light' value='" + 
                            data.id + "'><img src='trash.png' style='height:13px;'></button></td></tr>";
                            $('#myTable tbody').prepend(newRow);
                            updateTable();
                            updateTableTiming();
                            $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
            }
        });
        }
        else{
            $('.alert-success_noname').fadeIn(1000).delay(3000).fadeOut(1000);
        }
        
    });
    
});