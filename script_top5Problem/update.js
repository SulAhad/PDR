$(document).on("click", ".updateTop5Problem", function() 
            {
                var idTop5Problem = $(this).val();
                var input_date = $(this).closest("tr").find("#input_date").val();
                var input_description_problem = $(this).closest("tr").find("#input_description_problem").val();
                var input_operator = $(this).closest("tr").find("#input_operator").val();
                var input_cause = $(this).closest("tr").find("#input_cause").val();
                var input_immediate_action = $(this).closest("tr").find("#input_immediate_action").val();
                var input_eliminated = $(this).closest("tr").find("#input_eliminated").val();
                var input_root_cause = $(this).closest("tr").find("#input_root_cause").val();
                var input_action = $(this).closest("tr").find("#input_action").val();
                var input_responce = $(this).closest("tr").find("#input_responce").val();
                var input_area = $(this).closest("tr").find("#input_area").val();
                var input_downtime = $(this).closest("tr").find("#input_downtime").val();
                $.ajax(
                    {
                        type: 'POST',
                        dataType: 'html',
                        url: 'updateTop5Problem.php',
                        data: 
                        {
                            id: idTop5Problem,
                            input_date: input_date,
                            input_description_problem: input_description_problem,
                            input_operator: input_operator,
                            input_cause: input_cause,
                            input_immediate_action: input_immediate_action,
                            input_eliminated: input_eliminated,
                            input_root_cause: input_root_cause,
                            input_action: input_action,
                            input_responce: input_responce,
                            input_area: input_area,
                            input_downtime: input_downtime
                        },
                        success: function(response) 
                        {
                            var data = JSON.parse(response);
                            $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                        }
                    });
            });