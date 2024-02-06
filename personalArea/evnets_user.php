<style>
    .div_hover {
  position: relative;
}

.close-button {
  position: absolute;
  top: 0;
  right: 0;
  margin: 2px;
  background-color: transparent;
  border: none;
  color: white;
  font-size: 18px;
  cursor: pointer;
}
</style>
<?php
if ($a == $user) 
{
    if($event['status'] === "Всё сложно")
    {
        if ($repeat != 1) 
        {
            echo"<div title='Если поставить галочку то событие переходит в статус Выполнено' style='height: {$height}px; cursor: pointer; background:{$event['event_color']};' class='1 div_hover rounded mt-1' onclick='open_modal_update(\"{$event['name_event']}\", 
                    \"{$event['date_start_event']}\", \"{$event['repeatDate']}\", 
                    \"{$event['date_end_event']}\", 
                    \"{$event['date_time_event']}\", 
                    \"{$event['event_color']}\", 
                    \"{$event['id']}\", \"{$event['time_start']}\", 
                    \"{$event['time_end']}\")\'>";
                    echo "<button value='{$event['id']}' class='close-button' onclick='event.stopPropagation(); removeDiv(this.parentNode);' style='margin-left: auto;'>&times;</button>";
            echo"<input type='checkbox' name='event_checkbox[]' class='event_checkbox form-check-input' value='{$event['id']}' $checkboxStatus onclick='event.stopPropagation()'>";
            echo"<span class='update_time_span' style='color: white; border: 1px;'> {$event['date_time_event']} мин.</span>";
            echo"<span style='border: 1px; color:white; border-radius:6px; font-size:12px;' class='update_event_span rounded m-1 responsive-text'>{$event['name_event']}</span> <span class='rounded' style='background:red; width:20px; color:white;'>всё сложно</span><br>";
            echo"</div>";
        } 
        else 
        {
            echo"<div style='height: {$height}px; cursor: pointer; background:{$event['event_color']}; color:white;' class='2 div_hover rounded mt-1' onclick='open_modal_update(\"{$event['name_event']}\", 
                        \"{$event['date_start_event']}\", \"{$event['repeatDate']}\", 
                        \"{$event['date_end_event']}\", 
                        \"{$event['date_time_event']}\", 
                        \"{$event['event_color']}\", 
                        \"{$event['id']}\", \"{$event['time_start']}\", 
                        \"{$event['time_end']}\")'>";
                        echo "<button value='{$event['id']}' class='close-button' onclick='event.stopPropagation(); removeDiv(this.parentNode);' style='margin-left: auto;'>&times;</button>";
            echo"<span style='color: white; border: 1px;'>{$event['date_time_event']} мин.</span>";
            echo"<span  class='rounded m-1 responsive-text' style=' border-radius:6px; color:white; border: 1px; font-size:12px;'>{$event['name_event']}</span><span class='rounded' style='background:red; width:20px; color:white;'>всё сложно</span><br>";
            echo"</div>";
        }
    }
    if($event['status'] === "В процессе")
    {
        if ($repeat != 1) 
        {
            echo"<div style='height: {$height}px; cursor: pointer; background:{$event['event_color']}; color:white;' class='3 div_hover rounded mt-1' onclick='open_modal_update(\"{$event['name_event']}\", 
                    \"{$event['date_start_event']}\", \"{$event['repeatDate']}\", 
                    \"{$event['date_end_event']}\", 
                    \"{$event['date_time_event']}\", 
                    \"{$event['event_color']}\", 
                    \"{$event['id']}\", \"{$event['time_start']}\", 
                    \"{$event['time_end']}\")'>";
                    echo "<button value='{$event['id']}' class='close-button' onclick='event.stopPropagation(); removeDiv(this.parentNode);' style='margin-left: auto;'>&times;</button>";
                echo" <input  type='checkbox'  class='event_checkbox form-check-input' value='{$event['id']}' $checkboxStatus onclick='event.stopPropagation()'>";
                echo"<span  class='update_time_span' style='color: white; border: 1px;'> {$event['date_time_event']} мин.</span>";
                echo"<span style='color: white; border: 1px; background:{$event['event_color']}; border-radius:6px; font-size:12px;' class='update_event_span responsive-text rounded m-1'>{$event['name_event']}</span><br>";
                echo"</div>";
        } 
        else 
        {
            echo"<div style='height: {$height}px; cursor: pointer; background:{$event['event_color']}; color: white;' class='4 div_hover rounded mt-1' onclick='open_modal_update(\"{$event['name_event']}\", 
                \"{$event['date_start_event']}\", \"{$event['repeatDate']}\", 
                \"{$event['date_end_event']}\", 
                \"{$event['date_time_event']}\", 
                \"{$event['event_color']}\", 
                \"{$event['id']}\", \"{$event['time_start']}\", 
                \"{$event['time_end']}\")'>";
                echo "<button value='{$event['id']}' class='close-button' onclick='event.stopPropagation(); removeDiv(this.parentNode);' style='margin-left: auto;'>&times;</button>";
            echo"<span style='color: white; border: 1px;'>{$event['date_time_event']} мин.</span>";
            echo"<span  class='rounded m-1 responsive-text' style='color:white; background:{$event['event_color']}; border: 1px;  border-radius:6px; font-size:12px;'>{$event['name_event']}</span><br>";
            echo"</div>";
        }
    }
    if($event['status'] === "Выполнено")
    {
        if ($repeat != 1) 
        {
            echo"<div style='height: {$height}px; cursor: pointer; background:{$event['event_color']}; color: white;' class='5 div_hover rounded mt-1' onclick='open_modal_update(\"{$event['name_event']}\", 
                    \"{$event['date_start_event']}\", \"{$event['repeatDate']}\", 
                    \"{$event['date_end_event']}\", 
                    \"{$event['date_time_event']}\", 
                    \"{$event['event_color']}\", 
                    \"{$event['id']}\", \"{$event['time_start']}\", 
                    \"{$event['time_end']}\")'>";
                    echo "<button value='{$event['id']}' class='close-button' onclick='event.stopPropagation(); removeDiv(this.parentNode);' style='margin-left: auto;'>&times;</button>";
            echo" <input  type='checkbox' name='event_checkbox[]' class='event_checkbox form-check-input' value='{$event['id']}' $checkboxStatus onclick='event.stopPropagation()'>";
            echo"<span  class='update_time_span' style='color: white; border: 1px;'> {$event['date_time_event']} мин.</span>";
            echo"<span style='color: white; border: 1px; color:white;  border-radius:6px; font-size:12px;' class='update_event_span responsive-text rounded m-1'>{$event['name_event']}</span><br>";
            
            echo"</div>";
        } 
        else 
        {
            echo"<div style='height: {$height}px; cursor: pointer; background:{$event['event_color']}; color: white;' class='6 div_hover rounded mt-1' onclick='open_modal_update(\"{$event['name_event']}\", 
                \"{$event['date_start_event']}\", \"{$event['repeatDate']}\", 
                \"{$event['date_end_event']}\", 
                \"{$event['date_time_event']}\", 
                \"{$event['event_color']}\", 
                \"{$event['id']}\", \"{$event['time_start']}\", 
                \"{$event['time_end']}\")'>";
                echo "<button value='{$event['id']}' class='remove_div close-button' onclick='event.stopPropagation(); removeDiv(this.parentNode);' style='margin-left: auto;'>&times;</button>";
            echo"<span style='color: white; border: 1px;'>{$event['date_time_event']} мин.</span>";
            echo"<span  class='rounded m-1 responsive-text' style='color:white; border: 1px;  border-radius:6px; font-size:12px;'>{$event['name_event']}</span><br>";
            echo"</div>";
        }
    }
} 
// Это все остальные пользователи
else
{
    if($event['status'] === "Всё сложно" )
    {
        echo"<div style='height:height: {$height}px; background:lightgray; color: white;' class= 'div_hover rounded mt-1'>";
            echo " <input disabled title='Если поставить галочку то событие переходит в статус Выполнено' type='checkbox' name='event_checkbox[]' class='event_checkbox form-check-input' value='{$event['id']}' $checkboxStatus onclick='event.stopPropagation()'>";
            echo "<span  class='update_time_span' style='color: DimGrey; border: 1px;'> {$event['date_time_event']} мин.</span>";
            echo "<span style='color: DimGrey; border: 1px; color:black; font-size:12px;' class='update_event_span responsive-text rounded m-1'>{$event['name_event']}</span> <span class='rounded' style='background:red; width:20px; color:white;'>всё сложно</span><br>";
        echo"</div>";
    }
    if($event['status'] === "В процессе" )
    {
        echo"<div style='height:height: {$height}px; background:lightgray; color: white;' class= 'div_hover rounded mt-1'>";
            echo " <input disabled title='Если поставить галочку то событие переходит в статус Выполнено' type='checkbox' name='event_checkbox[]' class='event_checkbox form-check-input' value='{$event['id']}' $checkboxStatus onclick='event.stopPropagation()'>";
            echo "<span  class='update_time_span' style='color: DimGrey; border: 1px;'> {$event['date_time_event']} мин.</span>";
            echo "<span style='color: DimGrey; border: 1px; color:black; font-size:12px;' class='update_event_span responsive-text rounded m-1'>{$event['name_event']}</span><br>";
        echo"</div>";
    }
    if($event['status'] === "Выполнено" )
    {
        echo"<div style='height:height: {$height}px; background:lightgray; color: white;' class= 'div_hover rounded mt-1'>";
            echo "<span style='color: DimGrey; border: 1px;'> {$event['date_time_event']} мин.</span>";
            echo " <input disabled type='checkbox' name='event_checkbox[]' class='event_checkbox form-check-input' value='{$event['id']}' $checkboxStatus>";
            echo "<span class='responsive-text' style='color: DimGrey; border: 1px; font-size:12px;'> {$event['name_event']}</span><br>";
        echo"</div>";
    }
}
?>
<!-- <script>
   var selectedDiv = null;
  var offset = { x: 0, y: 0 };
var isDragging = false; // Флаг для отслеживания факта начала перетаскивания
document.addEventListener("mousedown", function(e) {
  if (e.target.classList.contains("div_hover")) {
    selectedDiv = e.target;
    offset.x = e.clientX - selectedDiv.getBoundingClientRect().left;
    offset.y = e.clientY - selectedDiv.getBoundingClientRect().top;
    selectedDiv.style.position = "fixed";
    selectedDiv.style.zIndex = 1000;
    isDragging = false; // Установка флага в значение false
    document.addEventListener("mousemove", startDragDiv);}});
function startDragDiv(e) {
  if (!isDragging) { // Если флаг установлен в false
    if (e.clientX !== offset.x || e.clientY !== offset.y) { // Если координаты мыши изменились
      isDragging = true; // Устанавливаем флаг в значение true
      document.removeEventListener("mousemove", startDragDiv); // Удаляем обработчик данного события
      document.addEventListener("mousemove", dragDiv);}}}
function dragDiv(e) {
  if (selectedDiv) {
    selectedDiv.style.left = e.clientX - offset.x + "px";
    selectedDiv.style.top = e.clientY - offset.y + "px";
    var cell = document.getElementById('$cell_id');
    var cellRect = cell.getBoundingClientRect();
    var divRect = selectedDiv.getBoundingClientRect();
    if (e.clientX < cellRect.left) {
      selectedDiv.style.left = cellRect.left + "px";}
    if (e.clientX > cellRect.right - divRect.width) {
      selectedDiv.style.left = cellRect.right - divRect.width + "px";}
    if (e.clientY < cellRect.top) {
      selectedDiv.style.top = cellRect.top + "px";}
    if (e.clientY > cellRect.bottom - divRect.height) {
      selectedDiv.style.top = cellRect.bottom - divRect.height + "px"; }}}
document.addEventListener("mouseup", function() {
  if (selectedDiv) {
    document.removeEventListener("mousemove", startDragDiv);
    document.removeEventListener("mousemove", dragDiv);
    selectedDiv = null;}
  isDragging = false;});

</script> -->
<script>
function removeDiv(element) {
    var delete_event = $(element).children('button').val();
    $.ajax({
    type: 'POST',
    dataType: 'html',
    url: '/Engels/personalArea/delete.php',
    data: { idUser: delete_event },
    success: function (response) 
    {
        
        $(element).animate({height: 'toggle'}, 500, function() {
            $(this).remove();
        });
        $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
    }
  });
}
</script>