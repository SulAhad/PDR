$(document).ready
                                (function() 
                                    {$(".updateSafety").click
                                        (function()
                                    		{
                                    		    var idSafety = $(this).val();
                                    		    var dateSafety = $(this).closest("tr").find("#dateSafety").val();
                                                var Incedents = $(this).closest("tr").find("#Incedents").val();
                                                
                                                var NearMiss = $(this).closest("tr").find("#NearMiss").val();
                                                
                                                var Bbswa = $(this).closest("tr").find("#Bbswa").val();
                                                var Kol_vo_zam = $(this).closest("tr").find("#Kol_vo_zam").val();
                                                
                                                var Kol_zam_teamA = $(this).closest("tr").find("#Kol_zam_teamA").val();
                                                var Bbs_teamA = $(this).closest("tr").find("#Bbs_teamA").val();
                                                var Rpm_zam_teamA = $(this).closest("tr").find("#Rpm_zam_teamA").val();
                                                var Rpm_bbs_teamA = $(this).closest("tr").find("#Rpm_bbs_teamA").val();
                                                
                                                var Kol_zam_teamB = $(this).closest("tr").find("#Kol_zam_teamB").val();
                                                var Bbs_teamB = $(this).closest("tr").find("#Bbs_teamB").val();
                                                var Rpm_zam_teamB = $(this).closest("tr").find("#Rpm_zam_teamB").val();
                                                var Rpm_bbs_teamB = $(this).closest("tr").find("#Rpm_bbs_teamB").val();
                                                
                                                var Kol_zam_Sulf = $(this).closest("tr").find("#Kol_zam_Sulf").val();
                                                var Bbs_Sulf = $(this).closest("tr").find("#Bbs_Sulf").val();
                                                var Rpm_zam_Sulf = $(this).closest("tr").find("#Rpm_zam_Sulf").val();
                                                var Rpm_bbs_Sulf = $(this).closest("tr").find("#Rpm_bbs_Sulf").val();
                                    			$.ajax(
                                                    {type: 'POST',
                                                        dataType: 'html',
                                                        url: '/Engels/safety/updateSafety.php',
                                                        
                                                        data: ({dateSafety:dateSafety, Incedents:Incedents,
                                                        
                                                                NearMiss:NearMiss,
                                                                Bbswa:Bbswa,
                                                                Kol_vo_zam:Kol_vo_zam,
                         
                                                                Kol_zam_teamA:Kol_zam_teamA,
                                                                Bbs_teamA:Bbs_teamA,
                                                                Rpm_zam_teamA:Rpm_zam_teamA,
                                                                Rpm_bbs_teamA:Rpm_bbs_teamA,
                             
                                                                Kol_zam_teamB:Kol_zam_teamB,
                                                                Bbs_teamB:Bbs_teamB,
                                                                Rpm_zam_teamB:Rpm_zam_teamB,
                                                                Rpm_bbs_teamB:Rpm_bbs_teamB,
                                                                
                                                                Kol_zam_Sulf:Kol_zam_Sulf,
                                                                Bbs_Sulf:Bbs_Sulf,
                                                                Rpm_zam_Sulf:Rpm_zam_Sulf,
                                                                Rpm_bbs_Sulf:Rpm_bbs_Sulf,
                                                                
                                                                idSafety:idSafety}),
                                                        success: function(response) 
                                                        {
                                                            $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                                            var data = JSON.parse(response);}});});});