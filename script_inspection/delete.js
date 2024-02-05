$(document).on("click", ".deleteInspection", function() {
        var deleteUser = this.value;
        var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: 'deleteInspectionNew.php',
            data: { idUser: deleteUser },
            success: function(response) {
                var data = JSON.parse(response);
                row.remove(); // удаляем строку таблицы
                updateTable();
                updateTableTiming();
                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
            }
        });
    });
    