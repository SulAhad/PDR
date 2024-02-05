<?php
$repeat_row_true_and_hard_status = <<<END
<div class='div_hover' onclick='open_modal_update("{$event['name_event']}", 
        "{$event['date_start_event']}", 
        "{$event['date_end_event']}", 
        "{$event['date_time_event']}", 
        "{$event['event_color']}", 
        "{$event['id']}", "{$event['time_start']}", 
        "{$event['time_end']}")'>
<input title='Если поставить галочку то событие переходит в статус Выполнено' type='checkbox' name='event_checkbox[]' class='event_checkbox form-check-input' value='{$event['id']}' $checkboxStatus>
<span class='update_time_span' style='color: DimGrey; border: 1px;'> {$event['date_time_event']} мин.</span>
<span class='update_event_span' style='color: DimGrey; border: 1px; background:{$event['event_color']}; color:white; border-radius:6px;' class='rounded m-1'>{$event['name_event']}</span> <span class='rounded' style='background:red; width:20px; color:white;'>всё сложно</span><br>
</div>
END;
$repeat_row_false_and_hard_status = <<<END
<div class='div_hover' onclick='open_modal_update(\"{$event['name_event']}\", 
        \"{$event['date_start_event']}\", 
        \"{$event['date_end_event']}\", 
        \"{$event['date_time_event']}\", 
        \"{$event['event_color']}\", 
        \"{$event['id']}\", \"{$event['time_start']}\", 
        \"{$event['time_end']}\")'>
<span style='color: DimGrey; border: 1px;'>{$event['date_time_event']} мин.</span>
<span title='Событие повторяется до {$event['repeatDate']}' class='rounded m-1' style=' border-radius:6px; color:white; background:{$event['event_color']}; border: 1px;'>{$event['name_event']}</span><span class='rounded' style='background:red; width:20px; color:white;'>всё сложно</span><br>
</div>";
END;
$repeat_row_true_and_inprogress_status = <<<END
<div class='div_hover' onclick='open_modal_update(\"{$event['name_event']}\", 
        \"{$event['date_start_event']}\", 
        \"{$event['date_end_event']}\", 
        \"{$event['date_time_event']}\", 
        \"{$event['event_color']}\", 
        \"{$event['id']}\", \"{$event['time_start']}\", 
        \"{$event['time_end']}\")'>
<input title='Если поставить галочку то событие переходит в статус Выполнено' type='checkbox' name='event_checkbox[]' class='event_checkbox form-check-input' value='{$event['id']}' $checkboxStatus>
<span  class='update_time_span' style='color: DimGrey; border: 1px;'> {$event['date_time_event']} мин.</span>
<span  class='update_event_span' style='color: DimGrey; border: 1px; background:{$event['event_color']}; color:white;  border-radius:6px;' class='rounded m-1'>{$event['name_event']}</span><br>
</div>
END;
$repeat_row_false_and_inprogress_status = <<<END
<div class='div_hover' onclick='open_modal_update(\"{$event['name_event']}\", 
    \"{$event['date_start_event']}\", 
    \"{$event['date_end_event']}\", 
    \"{$event['date_time_event']}\", 
    \"{$event['event_color']}\", 
    \"{$event['id']}\", \"{$event['time_start']}\", 
    \"{$event['time_end']}\")'>
<span style='color: DimGrey; border: 1px;'>{$event['date_time_event']} мин.</span>
<span title='Событие повторяется до {$event['repeatDate']}' class='rounded m-1' style='color:white; background:{$event['event_color']}; border: 1px;  border-radius:6px;'>{$event['name_event']}</span><br>
</div>
END;
$repeat_row_true_and_done_status = <<<END
<div class='div_hover' onclick='open_modal_update(\"{$event['name_event']}\", 
        \"{$event['date_start_event']}\", 
        \"{$event['date_end_event']}\", 
        \"{$event['date_time_event']}\", 
        \"{$event['event_color']}\", 
        \"{$event['id']}\", \"{$event['time_start']}\", 
        \"{$event['time_end']}\")'>
<input title='Если поставить галочку то событие переходит в статус Выполнено' type='checkbox' name='event_checkbox[]' class='event_checkbox form-check-input' value='{$event['id']}' $checkboxStatus>
<span  class='update_time_span' style='color: DimGrey; border: 1px;'> {$event['date_time_event']} мин.</span>
<span  class='update_event_span' style='color: DimGrey; border: 1px; background:{$event['event_color']}; color:white;  border-radius:6px;' class='rounded m-1'>{$event['name_event']}</span><br>
</div>
END;
$repeat_row_false_and_done_status = <<<END
<div class='div_hover' onclick='open_modal_update(\"{$event['name_event']}\", 
    \"{$event['date_start_event']}\", 
    \"{$event['date_end_event']}\", 
    \"{$event['date_time_event']}\", 
    \"{$event['event_color']}\", 
    \"{$event['id']}\", \"{$event['time_start']}\", 
    \"{$event['time_end']}\")'>
<span style='color: DimGrey; border: 1px;'>{$event['date_time_event']} мин.</span>
<span title='Событие повторяется до {$event['repeatDate']}' class='rounded m-1' style='color:white; background:{$event['event_color']}; border: 1px;  border-radius:6px;'>{$event['name_event']}</span><br>
</div>
END;

?>