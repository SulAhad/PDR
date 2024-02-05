<fieldset class="form-group border card shadow-sm">
    <div class="table-responsive">
    <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
        <table class="table-hover table table-sm table-bordered">
            <thead>
                <tr>
                    <th class="col-1">Дата</th>
                    <th class="col-1">Смена</th>
                    <th class="col-4">ФИО</th>
                    <th class="col-1">OEE, %</th>
                    <th class="col-4">Комментарий по качеству</th>
                    <th class="col-1">Замечания по упаковке</th>
                    <th class="col-1">Претензии</th>
                    <th class="col-1">Забракованный материал</th>
                    <th style='writing-mode:vertical-rl; width:10px;'>Изменить</th>
                    <th style='writing-mode:vertical-rl; width:10px;'>Удалить</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $message = "SELECT * FROM $name ORDER BY date DESC";
                    $link->set_charset("utf8");
                    $result =  mysqli_query( $link,  $message);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo"<tr>";
                        echo"<td><input id='date_$name' class='form-control form-control-sm border-0' type='date' value='$row[date]'></input></td>";
                        echo"<td><input id='team_$name' class='form-control form-control-sm border-0' type='text' value='$row[team]'></input></td>";
                        echo"<td><input id='name_operator_$name' class='form-control form-control-sm border-0' type='text' value='$row[name_operator]'></input></td>";
                        echo"<td><input id='oee_$name' type='number' class='border-0 form-control form-control-sm' value='$row[oee]'></input></td>";
                        echo"<td><input id='comment_$name' type='text' class='border-0 form-control form-control-sm' value='$row[comment]'></input></td>";
                        echo"<td><input id='quality1_$name' type='number' class='border-0 form-control form-control-sm' value='$row[quality1]'></input></td>";
                        echo"<td><input id='quality2_$name' type='number' class='border-0 form-control form-control-sm' value='$row[quality2]'></input></td>";
                        echo"<td><input id='quality3_$name' type='number' class='border-0 form-control form-control-sm' value='$row[quality3]'></input></td>";
                        echo "<td><button type='button' class='update_$name btn btn-outline btn-sm btn-light' title='Изменить' value='$row[id]'><img src='/Engels/icons/change.jpg' style='height:16px;'></button></td>";
                        echo "<td><button type='button' class='delete_$name btn btn-outline btn-sm btn-light' title='Удалить' value='$row[id]'><img src='/Engels/icons/trash.png' style='height:16px;'></button></td>";
                        echo"</tr>";
                    }
                ?>
            </tbody>
        </div>
    </table>
</fieldset>
<script>
    $(document).ready
    (function()
    {$(".update_<?php echo$name ?>").click(function() {
        var avtomat = '<?php echo $name ?>';
        var id = $(this).val();
        var date = $(this).closest("tr").find("#date_<?php echo$name ?>").val();
        var team = $(this).closest("tr").find("#team_<?php echo$name ?>").val();
        var name_operator = $(this).closest("tr").find("#name_operator_<?php echo$name ?>").val();
        var oee = $(this).closest("tr").find("#oee_<?php echo$name ?>").val();
        var comment = $(this).closest("tr").find("#comment_<?php echo$name ?>").val();
        var quality1 = $(this).closest("tr").find("#quality1_<?php echo$name ?>").val();
        var quality2 = $(this).closest("tr").find("#quality2_<?php echo$name ?>").val();
        var quality3 = $(this).closest("tr").find("#quality3_<?php echo$name ?>").val();
        $.ajax(
            {
                type: 'POST',
                dataType: 'html',
                url: '/Engels/paids/update.php',
                data: ({
                    avtomat:avtomat,
                    date:date,
                    team:team,
                    name:name_operator,
                    oee:oee,
                    comment:comment,
                    quality1:quality1,
                    quality2:quality2,
                    quality3:quality3,
                    id:id}),
                success: function(response)
                {
                    $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                    var data = JSON.parse(response);
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
        $(".delete_<?php echo$name ?>").click(function() {
        var deleteUser = $(this).val();
        var avtomat = '<?php echo $name ?>';
        var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '/Engels/paids/delete.php',
            data: {
                avtomat:avtomat,
                idUser: deleteUser},
            success: function(response) {
            var data = JSON.parse(response);
            row.remove(); // удаляем строку таблицы
            $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
            }
        });
        });
    });
</script>