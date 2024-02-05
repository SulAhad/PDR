$(document).on("click", ".updateInspection", function() {
        var idInspect = $(this).val();
        var input_date = $(this).closest("tr").find("#input_date").val();
        var input_name = $(this).closest("tr").find("#input_name").val();
        var input_textForList = $(this).closest("tr").find("#input_textForList").val();
        var input_typeSafety = $(this).closest("tr").find("#input_typeSafety").val();
        var input_comment = $(this).closest("tr").find("#input_comment").val();
        var input_duration = $(this).closest("tr").find("#input_duration").val();
        var input_staff = $(this).closest("tr").find("#input_staff").val();
        var input_contract = $(this).closest("tr").find("#input_contract").val();
        var input_production = $(this).closest("tr").find("#input_production").val();
        var input_area = $(this).closest("tr").find("#input_area").val();
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: 'updateInspectionNew.php',
            data: {
                id: idInspect,
                input_date: input_date,
                input_name: input_name,
                input_textForList: input_textForList,
                input_typeSafety: input_typeSafety,
                input_comment: input_comment,
                input_duration: input_duration,
                input_staff: input_staff,
                input_contract: input_contract,
                input_production: input_production,
                input_area: input_area
            },
            success: function(response) {
                updateTable();
                updateTableTiming();
                $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
            }
        });
    });