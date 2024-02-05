<fieldset class="form-group border card shadow-sm p-2" ><p style="font-weight:bold;">Новое событие</p>
    <label style="font-size:12px;" for="input_name_event">Название</label>
    <textarea type="text" id="input_name_event" class="form-control form-control-sm"></textarea>
    <style>
        .checkbox-container {
        display: flex;
        align-items: center;
        }

        .checkbox-container input {
        margin-right: 10px;
        }
    </style>
    <label style="font-size:12px;" class="mt-2">Категория</label>
    <div class="checkbox-container">
        <input type='checkbox' name='color' id='id_green' title='Собрания' style='width:30px; height:30px;' onclick='changeColorToGreen(this)' class='id_green form-check-input'/>
        <input type='checkbox' name='color' id='id_red' title='Задачи' style='width:30px; height:30px;' onclick='changeColorToRed(this)' class='id_red form-check-input'/>
        <input type='checkbox' name='color' id='id_yellow' title='Повторяющиеся события' style='width:30px; height:30px;' onclick='changeColorToYellow(this)' class='id_red form-check-input'/>
    </div>
    <label style="font-size:12px;" for="input_date_event" class="mt-2">Время и дата</label>
        <div style="display: flex; align-items: center;">
        <input id='1' class="form-control mt-1 form-control-sm" list="datalistOptions" type="text" placeholder="время">
        <datalist id="datalistOptions">
            <option value="08:00">08:00</option>
            <option value="08:30">08:30</option>
            <option value="09:00">09:00</option>
            <option value="09:30">09:30</option>
            <option value="10:00">10:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="11:30">11:30</option>
            <option value="12:00">12:00</option>
            <option value="12:30">12:30</option>
            <option value="13:00">13:00</option>
            <option value="13:30">13:30</option>
            <option value="14:00">14:00</option>
            <option value="14:30">14:30</option>
            <option value="15:00">15:00</option>
            <option value="15:30">15:30</option>
            <option value="16:00">16:00</option>
            <option value="16:30">16:30</option>
            <option value="17:00">17:00</option>
            <option value="17:30">17:30</option>
        </datalist>
        <input value="<?php echo date('Y-m-d'); ?>" id="input_date_start_event" type="date" class="form-control form-control-sm mt-1"> - 
        <input style="appearance: none;" id='2' class="form-control mt-1 form-control-sm" list="datalistOptions1" type="text" placeholder="время">
        <datalist id="datalistOptions1">
            <option value="08:00">08:00</option>
            <option value="08:30">08:30</option>
            <option value="09:00">09:00</option>
            <option value="09:30">09:30</option>
            <option value="10:00">10:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="11:30">11:30</option>
            <option value="12:00">12:00</option>
            <option value="12:30">12:30</option>
            <option value="13:00">13:00</option>
            <option value="13:30">13:30</option>
            <option value="14:00">14:00</option>
            <option value="14:30">14:30</option>
            <option value="15:00">15:00</option>
            <option value="15:30">15:30</option>
            <option value="16:00">16:00</option>
            <option value="16:30">16:30</option>
            <option value="17:00">17:00</option>
            <option value="17:30">17:30</option>
        </datalist>
        <input  value="<?php echo date('Y-m-d'); ?>" id="input_date_end_event" type="date" class="form-control form-control-sm mt-1">
        <input id="input_date_time_event" type="number" class="form-control form-control-sm mt-1">
    </div>
    </script>
    <script>
         document.getElementById('2').addEventListener('change', function() {
        var time1 = document.getElementById('1').value;
        var date_start = document.getElementById('input_date_start_event').value;
        var date_end = document.getElementById('input_date_end_event').value;
        var time2 = this.value;
        var date1 = new Date(date_start + 'T' + time1 + ':00Z');
        var date2 = new Date(date_end + 'T' + time2 + ':00Z');
        var diffInSeconds = Math.abs(date2 - date1) / 1000; // разница в секундах
        var diffInMinutes = Math.floor(diffInSeconds / 60); // разница в минутах
        document.getElementById('input_date_time_event').value = diffInMinutes;
    });
    </script>
    <div style="font-size:12px; display: inline-block;" for="repeat" class="mt-2">Повторять событие
        <input id="repeat_event" type="checkbox" class="form-check-input" style="display: inline-block;"></input>
    </div>
    <div style="font-size:12px; display:none;" id="repeatDays" >
    повторять событие до
        <input style="width:50%; display: inline-block;" type="date" id="repeatDate" value="<?php $date = substr(date('Y-m-d', strtotime($order->date.'+1 day')),0,10);  echo $date; ?>" class="form-control form-control-sm" ></input>
    </div>
    
    <button type="button" class="add_event btn btn-secondary m-2">Сохранить</button>
</fieldset>
<fieldset id='event-list' class="form-group border card shadow-sm p-2 mt-2">
    <a href="archive.php" style="margin:7px;"><button class="btn btn-secondary" style="width:100%;">Архив выполненных</button></a>
    <a href="#" style="margin:7px;"><button class="btn btn-secondary" style="width:100%;">Список задач на год</button></a>
</fieldset>
<script>
    $("textarea").each(function () {
    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
    }).on("input", function () {
    this.style.height = 0;
    this.style.height = (this.scrollHeight) + "px";
    });
</script>