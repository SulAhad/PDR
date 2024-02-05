<?php
if ($a == $user) 
{
    echo "<input type='hidden' id='date_checkbox".$rowUser['id']."' value='".$rowUser['id']."' class='date_checkbox mt-2' />";

    echo "<input type='checkbox' value='".$rowUser['id']."' ".($rowUser['green'] == 1 ? 'checked' : '')." 
    id='id_green".$rowUser['id']."' title='Ваш статус - Свободен' style='".($rowUser['green'] == 1 ? 'background:green; border: 1px solid lightgray;
    width:30px; height:30px;' : 'background:white; width:30px; border: 1px solid lightgray; height:30px;')."' 
    onclick='changeColorToGreen(this)' class='id_green form-check-input'/>";

    echo " <input type='checkbox' value='".$rowUser['id']."' ".($rowUser['yellow'] == 1 ? 'checked' : '')." 
    id='id_yellow".$rowUser['id']."' title='Ваш статус - Успеваю с задачами' 
    style='".($rowUser['yellow'] == 1 ? 'background:yellow; border: 1px solid lightgray; width:30px; height:30px;' : 'background:white; border: 1px solid lightgray;
    width:30px; height:30px;')."' onclick='changeColorToYellow(this)' class='id_yellow form-check-input'/>";

    echo " <input type='checkbox' value='".$rowUser['id']."' ".($rowUser['red'] == 1 ? 'checked' : '')." 
    id='id_red".$rowUser['id']."' title='Ваш статус - Перегружен' style='".($rowUser['red'] == 1 ? 'background:red; border: 1px solid lightgray;
    width:30px; height:30px;' : 'background:white; border: 1px solid lightgray; width:30px; height:30px;')."' 
    onclick='changeColorToRed(this)' class='id_red form-check-input'/><br>";
} 
else 
{
    echo "<input type='hidden' id='date_checkbox".$rowUser['id']."' value='".$rowUser['id']."' class='date_checkbox mt-2' />";

    echo "<input disabled type='checkbox' value='".$rowUser['id']."' ".($rowUser['green'] == 1 ? 'checked' : '')." 
    id='id_green".$rowUser['id']."' title='Свободен' style='".($rowUser['green'] == 1 ? 'background:green; border: 1px solid lightgray;
    width:30px; height:30px;' : 'background:white; border: 1px solid lightgray; width:30px; height:30px;')."' 
    onclick='changeColorToGreen(this)' class='id_green form-check-input'/>";

    echo " <input disabled type='checkbox' value='".$rowUser['id']."' ".($rowUser['yellow'] == 1 ? 'checked' : '')." 
    id='id_yellow".$rowUser['id']."' title='Успеваю с задачами' style='".($rowUser['yellow'] == 1 ? 'background:yellow; border: 1px solid lightgray;
    width:30px; height:30px;' : 'background:white; border: 1px solid lightgray; width:30px; height:30px;')."' 
    onclick='changeColorToYellow(this)' class='id_yellow form-check-input'/>";

    echo " <input disabled type='checkbox' value='".$rowUser['id']."' ".($rowUser['red'] == 1 ? 'checked' : '')." 
    id='id_red".$rowUser['id']."' title='Перегружен' style='".($rowUser['red'] == 1 ? 'background:red; border: 1px solid lightgray;
    width:30px; height:30px;' : 'background:white; border: 1px solid lightgray; width:30px; height:30px;')."' 
    onclick='changeColorToRed(this)' class='id_red form-check-input'/><br>";
}
?>