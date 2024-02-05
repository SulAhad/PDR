$(document).ready(function() 
            {
                $(".add").click(function()
        		{   
        		    var description_problem = document.getElementById('description_problem');
        		    var operator = document.getElementById('operator');
        		    var cause = document.getElementById('cause');
        		    var immediate_action = document.getElementById('immediate_action');
        		    var eliminated = document.getElementById('eliminated');
        		    var root_cause = document.getElementById('root_cause');
        		    var action = document.getElementById('action');
        		    var responce = document.getElementById('responce');
        		    var area = document.getElementById('area');
        		    var downtime = document.getElementById('downtime');
        		    var email_name = 'Замечание по листу Топ 5 проблем';
                    var email_email = "Топ-5 проблем";
                    var email_address = document.getElementById('responce');
                    var email_message = 'Описание проблемы: ' + description_problem.value + "\r\n"  
                    + 'Оператор линии: ' + operator.value + "\r\n"  
                    + 'Причина: ' + cause.value + "\r\n"  
                    + 'Непосредственное действие: ' + immediate_action.value + "\r\n"  
                    + 'Устранил: ' + eliminated.value + "\r\n"  
                    + 'Коренная причина: ' + root_cause.value + "\r\n"  
                    + 'Действие: ' + action.value + "\r\n"  
                    + 'Район / Участок: ' + area.value + "\r\n"  
                    + 'Простой, мин.: ' + downtime.value;
                    $.ajax(
                    {
                        type: 'POST',
                        url: 'send_email.php',
                        data: 
                        {
                            email_name: email_name,
                            email_email: email_email,
                            email_address: email_address.value,
                            email_message: email_message
                        },
                        success: function(response) 
                        {
                            $('#response').html(response);
                        }
                    });
                    $.ajax(
                    {
                        type: 'POST',
                        dataType: 'html',
                        url: 'addTop5Problem.php',
                        data: (
                            {
                                description_problem:description_problem.value, 
                                operator:operator.value, 
                                cause:cause.value, 
                                immediate_action:immediate_action.value, 
                                eliminated:eliminated.value, 
                                root_cause:root_cause.value, 
                                action:action.value, 
                                responce:responce.value,
                                area:area.value,
                                downtime:downtime.value
                            }),
                            success: function(response) 
                            {   
                                description_problem.value = "";
                                operator.value = "";
                                cause.value = "";
                                immediate_action.value = "";
                                eliminated.value = "";
                                root_cause.value = "";
                                action.value = "";
                                responce.value = "";
                                area.value = "";
                                downtime.value = "";
                                $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                // Добавление новой строки в таблицу
                                var data = JSON.parse(response);
                                var newRow = "<tr><td><input id='input_date' class='fontTr form-control' style='border:none;' type='date' value='" + 
                                  data.date + "'></input></td><td><input style='border:none;' id='input_description_problem'  class='fontTr form-control' value='" + 
                                  data.description_problem + "'></input></td><td style='border:none;'><input id='input_operator'  style='border:none;'  class='fontTr form-control' value='" + 
                                  data.operator + "'></input></td><td><input style='border:none;' id='input_cause'   class='fontTr form-control' value='" + 
                                  data.cause + "'></input></td><td><input style='border:none;' id='input_immediate_action' class='fontTr form-control' value='" + 
                                  data.immediate_action + "'></input></td><td><input id='input_eliminated' style='border:none;'  class='fontTr form-control' value='" + 
                                  data.eliminated + "'></input></td><td><input id='input_root_cause'  style='border:none;' class='fontTr form-control' value='" + 
                                  data.root_cause + "'></input></td><td><input id='input_action' style='border:none;' class='fontTr form-control' value='" + 
                                  data.action + "'></input></td><td><input id='input_responce' style='border:none;'  class='fontTr form-control' value='" + 
                                  data.responce + "'></input></td><td><input id='input_area'  style='border:none;'  class='fontTr form-control' value='" + 
                                  data.area + "'></input></td><td><input id='input_downtime' type='number' style='border:none;' class='fontTr form-control' value='" + 
                                  data.downtime + "'></input></td><td><button type='button' class='fontTr updateTop5Problem btn btn-outline btn-sm btn-light' value='" + 
                                  data.id + "'><img src='change.jpg'></button></td><td style='font-size:10px;'><button type='button' class='deleteTop5Problem btn btn-outline btn-sm btn-light' value='" + 
                                  data.id + "'><img src='trash.png'></button></td></tr>";
                                $('#myTable tbody').prepend(newRow);
                            }
                        });
        		    });
                });