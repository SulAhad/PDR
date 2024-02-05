<fieldset id="event-list">
    <?php
        $message = "SELECT * FROM calendarfortechnical WHERE user = '$a');";
        $link->set_charset("utf8");
        $result = mysqli_query($link, $message);
        while ($row = mysqli_fetch_assoc($result)) 
        {
            echo"<div class='card mb-4 box-shadow'>";
            echo"<div class='card-body'>";
            echo"<small class='text-muted'><input type='text' class='form-control form-control-sm border-0' id='name_event_timeline' value='$row[name_event]'></input></small>";
            echo"<p class='card-text'><input type='text' class='form-control form-control-sm border-0' id='text_event_timeline' value='$row[text_event]'></input></p>";
            echo"<div class='d-flex justify-content-between align-items-center'>";
            echo"<div class='btn-group'>";
            echo"<button disabled type='date' id='date_start_event_timeline' class='btn btn-sm btn-outline-secondary'>$row[date_start_event]</button>";
            echo"<button disabled type='date' id='date_end_event_timeline' class='btn btn-sm btn-outline-secondary'>$row[date_end_event]</button>";
            echo"</div>";
            echo"<button title='Сохранить' value='$row[id]' class='updateTimeline btn btn-light btn-sm m-1' style='display: none;'><img src='/Engels/icons/change.jpg' style='height:14px;'></button>"; // Кнопка "Сохранить" скрыта
            echo"</div>";
            echo"<button value='$row[id]' class='btn deleteTimeline' style='position: absolute; top: 10px; right: 10px;'>&times;</button>"; // Добавляем крестик
            echo"</div>";
            echo"</div>";
        }
    ?>
</fieldset>
<script>
    $('input').on('input', function() {
        $(this).closest('.card-body').find('.btn-light').show();
    });
</script>
<script>
$(document).ready
    (function()
        {$(".update_Timeline").click
            (function()
            {
                var user = "<?php echo $a; ?>";
                var id = $(this).val();
                var name_event = document.getElementById('name_event_timeline').value;
                var text_event = document.getElementById('text_event_timeline').value;
                var date_start = document.getElementById('date_start_event_timeline').value;
                var date_end = document.getElementById('date_end_event_timeline').value;
                $.ajax(
                        {type: 'POST',
                            dataType: 'html',
                            url: '/Engels/personalArea/update.php',
                            data: ({
                                user:user,
                                name_event:name_event,
                                text_event:text_event,
                                date_start_event:date_start_event,
                                date_end_event:date_end_event,
                                id:id}),
                            success: function(response)
                            {
                                $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                var data = JSON.parse(response);
                                var xhr = new XMLHttpRequest();
                                xhr.open('GET', 'update.php', true);
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState === 4 && xhr.status === 200) {
                                        document.getElementById('event-list').innerHTML = xhr.responseText;
                                    }
                                };
                                xhr.send();
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
    $(".delete_timeline").click(function() {
        var deleteUser = $(this).val();
        var card = $(this).closest(".card"); // получаем div с классом 'card'
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '/Engels/personalArea/delete.php',
            data: {idUser: deleteUser},
            success: function(response) {
                var data = JSON.parse(response);
                card.remove(); // удаляем div с классом 'card'
                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'update.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        document.getElementById('event-list').innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            }
        });
    });
});
</script>