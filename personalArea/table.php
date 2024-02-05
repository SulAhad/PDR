<fieldset id='event-list' style="max-height: auto; overflow-y: auto; ">
<?php
    $link->set_charset("utf8");
    $result = mysqli_query($link, $message);
    while ($row = mysqli_fetch_assoc($result)) 
    {
        echo"<div id='myTable' class='card mb-2 box-shadow'>";
        echo"<div class='card-body'>";
        echo"<small class='text-muted'>Название события</small>";
        echo"<input style='background:LightCyan;' id='name_event' value='$row[name_event]' type='text' class='form-control form-control-sm border-0'></input>";
        echo"<hr>";
        echo"<small class='text-muted'>Описание события</small>";
        echo"<input style='background:LightCyan;' value='$row[text_event]' id='text_event' type='text' class='form-control form-control-sm border-0'></input>";
        echo"<div class='d-flex justify-content-between align-items-center'>";
        echo"<div class='btn-group mt-1'>";
        echo "<input style='background:lightgray;' type='datetime-local' class='btn btn-sm btn-outline-secondary form-control form-control-sm border-0' id='date_start_event' value='" . date("Y-m-d H:i", strtotime($row['date_start_event'])) . "'></input>";
        echo "<input style='background:lightgray;' type='datetime-local' class='btn btn-sm btn-outline-secondary form-control form-control-sm border-0' id='date_end_event' value='" . date("Y-m-d H:i", strtotime($row['date_end_event'])) . "'></input>";
        echo"</div>";
        echo"<button value='$row[id]' class='update btn btn-primary btn-sm' style='display: none;'>Сохранить</button>"; // Кнопка "Сохранить" скрыта
        echo"</div>";
        echo"<button title='Удалить' value='$row[id]' class='btn delete' style='position: absolute; top: 10px; right: 10px;'>&times;</button>"; // Добавляем крестик
        echo"</div>";
        echo"</div>"; }?>
<script>
    $('input').on('input', function() {
        $(this).closest('.card-body').find('.btn-primary').show();
    });
</script>
<script>
$(document).ready
    (function()
        {$(".update").click
            (function()
            {
                var id = $(this).val();
                var cardBody = $(this).closest('.card-body');
                var name_event = cardBody.find('#name_event').val();
                var text_event = cardBody.find('#text_event').val();
                var date_start_event = cardBody.find('#date_start_event').val();
                var date_end_event = cardBody.find('#date_end_event').val();
                $.ajax(
                        {type: 'POST',
                            dataType: 'html',
                            url: '/Engels/personalArea/update.php',
                            data: ({
                                user: "<?php echo $a; ?>",
                                id: id,
                                name_event: name_event,
                                text_event: text_event,
                                date_start_event: date_start_event,
                                date_end_event: date_end_event}),
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
    $(".delete").click(function() {
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
                
            }
        });
    });
});
</script>
</fieldset>