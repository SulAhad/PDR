<!-- <div class="modal" id="eventNameModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Изменить событие</h5>
                <button type="button" class="close btn btn-sm" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
            <label style="font-size:12px;" >Название</label>
            <textarea type="text" id="eventNameModalBody" class="form-control form-control-sm"></textarea>
            
            <label style="font-size:12px;" for="input_date_event" class="mt-2">Время и дата</label>
            <input id="eventDateTime" type="number" class="form-control form-control-sm mt-1">
            <div class="modal-footer">
                <span id="eventDateTime"></span>
                <span id="eventColor"></span>
                <span id="eventId" style="display: none;"></span>
            </div>
            <div style="font-size:12px; display: inline-block;" for="repeat" class="mt-2">Повторять событие
                <input id="repeat_event" type="checkbox" class="form-check-input" style="display: inline-block;"></input>
            </div>
            <div style="font-size:12px; display:none;" id="repeatDays" >
            повторять событие до
                <input style="width:50%; display: inline-block;" type="date" id="repeatDate" value="<?php $date = substr(date('Y-m-d', strtotime($order->date.'+1 day')),0,10);  echo $date; ?>" class="form-control form-control-sm" ></input>
            </div>
        
            <button type="button" class="add_event btn btn-secondary m-2">Изменить</button>
            </div>
        </div>
    </div>
</div> -->
<div class="modal" id="eventNameModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Изменить событие</h5>
                <button type="button" class="close btn btn-sm" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <label style="font-size:12px;" >Название</label>
                <textarea type="text" id="eventNameModalBody" class="form-control form-control-sm"></textarea>
            </div>
            <div class="modal-footer">
                <label style="font-size:12px;" >Продолжительность</label>
                <textarea type="number" id="eventDateTime" class="form-control form-control-sm"></textarea>
                <span id="eventColor"></span>
                <span id="eventId" style="display: none;"></span>
            </div>
        </div>
    </div>
</div>
