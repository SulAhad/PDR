$(document).ready
            (function() 
                {
                    $(".deleteSafety").click
                    (
                		function()
                		{
                		    var deleteUser = this.value;
                		    const { target } = event;
                			$.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/safety/deleteRowSafety.php',
                                    data: ({idUser:deleteUser}),
                                    success: function(response) 
                                    {
                                        var data = JSON.parse(response);
                                        target.parentNode.parentNode.remove();
                                        $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                                    }
                                });
                		}
            	    );
                }
            );