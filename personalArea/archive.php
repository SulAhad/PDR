<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['inspection'] === 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['real_name'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php'); ?>
<style>
    .col-md-3 {
        margin-top:60px;
  position: fixed;
  top: 0;
}
.col-md-9 {
  margin-left: 25%;
}
</style>
</head>
    <body>
    <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
        <div class="container">
            <div class="row">
            <a href="main.php" class="btn btn-secondary" style="width:150px;"><= назад..</a>
            <fieldset id='event-list' class="form-group border card shadow-sm p-1 mt-2" >
<div class="table-responsive">
    <table id="myTable" class="table-hover table-bordered table table-sm">
        <thead class="bg-light text-dark">
                <tr>
                    <th class="col-1">Начало</th>
                    <th class="col-1">Завершение</th>
                    <th class="col-4">Назавание</th>
                    <th class="col-0">Категория</th>
                    <th class="col-4">Статус</th>
                    <th class="col-0"></th>
                    <th class="col-0"></th>
                </tr>
            </thead>
            <tbody  onload="myFunction()" class="animate-bottom">
            <?php
                $message = "SELECT * FROM calendarfortechnical WHERE user = '$a' AND status = 'Выполнено';";
                $link->set_charset("utf8");
                $result = mysqli_query($link, $message);
                $statusOptions = array('В процессе', 'Выполнено', 'Всё сложно');
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td style='height:20px;'><input style='height:100%;' id='date_start_event' type='datetime-local' class='form-control form-control-sm border-0' value='$row[date_start_event]' /></td>";
                    echo "<td style='height:20px;'><input style='height:100%;' id='date_end_event' type='datetime-local' class='form-control form-control-sm border-0' value='$row[date_end_event]' /></td>";
                    echo "<td style='height:100%;'><textarea style='height:20px; resize:none;' id='name_event' type='text' class='form-control form-control-sm border-0'>$row[name_event]</textarea></td>";
                    echo "<td style='height:100%;'><input type='checkbox' style='width:30px; height:30px; background:$row[event_color];' id='event_color' readonly   class='form-check-input'/></td>";
                    echo "<td><select id='status' class='form-select border-0'>";
                    foreach ($statusOptions as $option) {
                        $selected = ($row['status'] === $option) ? 'selected' : '';
                        echo "<option value='$option' $selected>$option</option>";
                    }
                    echo "</select></td>";
                    if ($row['user'] === $a) {
                        echo "<td style='height:20px;'><button style='height:100%;' title='изменить' type='button' class='update btn btn-outline btn-sm btn-light' value='$row[id]'><img src='/Engels/icons/change.jpg' style='height:16px;'></button></td>";
                        echo "<td style='height:20px;'><button style='height:100%;' title='удалить' type='button' class='delete btn btn-outline btn-sm btn-light' value='$row[id]'><img src='/Engels/icons/trash.png' style='height:16px;'></button></td>";
                    }
                    echo "</tr>";
                }
            ?>
                <script>
                    $("textarea").each(function () {
                        this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                        }).on("input", function () {
                        this.style.height = 0;
                        this.style.height = (this.scrollHeight) + "px";
                        });
                </script>
            </tbody>
        </table>
</div>
<script>
$(document).ready
    (function()
        {$(".update").click
            (function()
            {
                var id = $(this).val();
                var row = $(this).closest("tr");
                var name_event = $(this).closest("tr").find("#name_event").val();
                var text_event = $(this).closest("tr").find("#text_event").val();
                var date_start_event = $(this).closest("tr").find("#date_start_event").val();
                var date_end_event = $(this).closest("tr").find("#date_end_event").val();
                var status = $(this).closest("tr").find("#status").val();
                row.css("background", "yellow");
                $.ajax(
                        {type: 'POST',
                            dataType: 'html',
                            url: '/Engels/personalArea/update.php',
                            data: ({
                                user: "<?php echo $a; ?>",
                                id: id,
                                status: status,
                                name_event: name_event,
                                text_event: text_event,
                                date_start_event: date_start_event,
                                date_end_event: date_end_event,
                                repeatDate: date_end_event}),
                            success: function(response)
                            {
                                $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                var data = JSON.parse(response);
                                if(status != 'Выполнено'){
                                    row.fadeOut(500, function() {
                                        row.remove();
                                    });
                                }
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
        var row = $(this).closest("tr");
        row.css("background", "lightcoral");
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '/Engels/personalArea/delete.php',
            data: {idUser: deleteUser},
            success: function(response) {
                var data = JSON.parse(response);
                row.fadeOut(500, function() {
                    row.remove();
                });
                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                
            }
        });
    });
});
</script>
</fieldset>
            </div>
        </div>
    </body>
    <?php require('../Engels/footer/footer.php') ?>
</html>