<?php
    $resultUser = mysqli_query($link, "SELECT * FROM statusforuserscalendar WHERE user = '$user' AND date = '$current_date'");
    while ($rowUser = mysqli_fetch_assoc($resultUser)) 
    {
        if ($a == $user) 
        {
            echo"<div style='height:50px; position: absolute; bottom: 10px; left: 10px;'>";
            echo "<input type='hidden' id='date_checkbox' value='".$rowUser['id']."' class='date_checkbox' />";
            
            echo "<input type='checkbox' 
            value='".$rowUser['id']."' ".($rowUser['bad'] == 1 ? 'checked' : '')." 
            id='id_bad".$rowUser['id']."' title='доволен' style='".($rowUser['bad'] == 1 ? 'background:green; border: 1px solid lightgray;
            width:30px; height:30px; border-radius:20px;' : 'background:white; border: 1px solid lightgray; width:30px; height:30px; border-radius:20px;')."' 
            onclick='change_status_to_bad(this)' class='id_bad form-check-input mt-2'/>";

            echo " <input type='checkbox' 
            value='".$rowUser['id']."' ".($rowUser['medium'] == 1 ? 'checked' : '')." 
            id='id_medium".$rowUser['id']."' title='средне доволен' style='".($rowUser['medium'] == 1 ? 'background:yellow; border: 1px solid lightgray;
            width:30px; height:30px; border-radius:20px;' : 'background:white; border: 1px solid lightgray; width:30px; height:30px; border-radius:20px;')."' 
            onclick='change_status_to_medium(this)' class='id_medium form-check-input mt-2'/>";

            echo " <input type='checkbox' 
            value='".$rowUser['id']."' ".($rowUser['good'] == 1 ? 'checked' : '')." 
            id='id_good".$rowUser['id']."' title='не доволен' style='".($rowUser['good'] == 1 ? 'background:red; border: 1px solid lightgray;
            width:30px; height:30px; border-radius:20px;' : 'background:white; border: 1px solid lightgray; width:30px; height:30px; border-radius:20px;')."' 
            onclick='change_status_to_good(this)' class='id_good form-check-input mt-2'/><br>";
            $hours = floor($total_event_time / 60);
            $minutes = $total_event_time % 60;
            $total_event_display = ($hours > 0 ? $hours . ' час ' : '') . ($minutes > 0 ? $minutes . ' мин' : '');
            echo "Загруженность: {$total_event_display}.";
            echo"</div>";
        }
        else
        {
            echo"<div style='height:50px; position: absolute; bottom: 10px; left: 10px;'>";
            echo "<input type='hidden' id='date_checkbox' value='".$rowUser['id']."' class='date_checkbox' />";

            echo "<input disabled type='checkbox' 
            value='".$rowUser['id']."' ".($rowUser['bad'] == 1 ? 'checked' : '')." 
            id='id_bad".$rowUser['id']."' title='доволен' style='".($rowUser['bad'] == 1 ? 'background:green; border: 1px solid lightgray;
            width:30px; height:30px; border-radius:20px;' : 'background:white; border: 1px solid lightgray; width:30px; height:30px; border-radius:20px;')."' 
            onclick='change_status_to_bad(this)' class='id_bad form-check-input mt-2'/>";

            echo " <input disabled type='checkbox' 
            value='".$rowUser['id']."' ".($rowUser['medium'] == 1 ? 'checked' : '')." 
            id='id_medium".$rowUser['id']."' title='средне доволен' style='".($rowUser['medium'] == 1 ? 'background:yellow; border: 1px solid lightgray;
            width:30px; height:30px; border-radius:20px;' : 'background:white; border: 1px solid lightgray; width:30px; height:30px; border-radius:20px;')."' 
            onclick='change_status_to_medium(this)' class='id_medium form-check-input mt-2'/>";

            echo " <input disabled type='checkbox' 
            value='".$rowUser['id']."' ".($rowUser['good'] == 1 ? 'checked' : '')." 
            id='id_good".$rowUser['id']."' title='не доволен' style='".($rowUser['good'] == 1 ? 'background:red; border: 1px solid lightgray;
            width:30px; height:30px; border-radius:20px;' : 'background:white; border: 1px solid lightgray; width:30px; height:30px; border-radius:20px;')."' 
            onclick='change_status_to_good(this)' class='id_good form-check-input mt-2'/><br>";
            $hours = floor($total_event_time / 60);
            $minutes = $total_event_time % 60;
            $total_event_display = ($hours > 0 ? $hours . ' час ' : '') . ($minutes > 0 ? $minutes . ' мин' : '');
            echo "Загруженность: {$total_event_display}.";
            echo"</div>";
        } 
    }
?>
<script>
    function change_status_to_bad(checkbox) 
    {
        var id = $(this).find('#id').val();
        if (checkbox.checked) 
        {
            checkbox.style.background = 'green';
        } 
        else 
        {
            checkbox.style.background = '';
        }
    }

    function change_status_to_medium(checkbox) 
    {
        if (checkbox.checked) 
        {
            checkbox.style.background = 'yellow';
        } 
        else 
        {
            checkbox.style.background = '';
        }
    }

    function change_status_to_good(checkbox) 
    {
        if (checkbox.checked) 
        {
            checkbox.style.background = 'red';
        } 
        else 
        {
            checkbox.style.background = '';
        }
    }
</script>