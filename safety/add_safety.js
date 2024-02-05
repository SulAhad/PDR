$(document).ready
            (function() 
                {
                    $(".add").click
                    (
                		function()
                		{
                		    var dateTime = document.getElementById('dateTime');
                		    
                		    var Incedents = document.getElementById('Incedents');
                		    var NearMiss = document.getElementById('NearMiss');
                		    var Bbswa = document.getElementById('Bbswa');
                		    var Kol_vo_zam = document.getElementById('Kol_vo_zam');
                		    
                		    var Kol_zam_teamA = document.getElementById('Kol_zam_teamA');
                		    var Bbs_teamA = document.getElementById('Bbs_teamA');
                		    var Rpm_zam_teamA = document.getElementById('Rpm_zam_teamA');
                		    var Rpm_bbs_teamA = document.getElementById('Rpm_bbs_teamA');
                		   /* 
                		    var Kol_zam_teamB = document.getElementById('Kol_zam_teamB');
                		    var Bbs_teamB = document.getElementById('Bbs_teamB');
                		    var Rpm_zam_teamB = document.getElementById('Rpm_zam_teamB');
                		    var Rpm_bbs_teamB = document.getElementById('Rpm_bbs_teamB');*/
                		    
                		    var Kol_zam_Sulf = document.getElementById('Kol_zam_Sulf');
                		    var Bbs_Sulf = document.getElementById('Bbs_Sulf');
                		    var Rpm_zam_Sulf = document.getElementById('Rpm_zam_Sulf');
                		    var Rpm_bbs_Sulf = document.getElementById('Rpm_bbs_Sulf');
                		    
                		    var Incedents_comment = document.getElementById('Incedents_comment');
                		    var NearMiss_comment = document.getElementById('NearMiss_comment');
                		    var Bbswa_comment = document.getElementById('Bbswa_comment');
                		    var Kol_vo_zam_comment = document.getElementById('Kol_vo_zam_comment');
                		    
                		    var Kol_zam_teamA_comment = document.getElementById('Kol_zam_teamA_comment');
                		    var Bbs_teamA_comment = document.getElementById('Bbs_teamA_comment');
                		    var Rpm_zam_teamA_comment = document.getElementById('Rpm_zam_teamA_comment');
                		    var Rpm_bbs_teamA_comment = document.getElementById('Rpm_bbs_teamA_comment');
                		    
                		   /* var Kol_zam_teamB_comment = document.getElementById('Kol_zam_teamB_comment');
                		    var Bbs_teamB_comment = document.getElementById('Bbs_teamB_comment');
                		    var Rpm_zam_teamB_comment = document.getElementById('Rpm_zam_teamB_comment');
                		    var Rpm_bbs_teamB_comment = document.getElementById('Rpm_bbs_teamB_comment');*/
                		    
                		    var Kol_zam_Sulf_comment = document.getElementById('Kol_zam_Sulf_comment');
                		    var Bbs_Sulf_comment = document.getElementById('Bbs_Sulf_comment');
                		    var Rpm_zam_Sulf_comment = document.getElementById('Rpm_zam_Sulf_comment');
                		    var Rpm_bbs_Sulf_comment = document.getElementById('Rpm_bbs_Sulf_comment');
                            $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/safety/addSafety.php',
                                    data: ({dateTime:dateTime.value, 
                                    Incedents:Incedents.value, 
                                    NearMiss:NearMiss.value, 
                                    Bbswa:Bbswa.value, 
                                    Kol_vo_zam:Kol_vo_zam.value, 
                                    
                                    Kol_zam_teamA:Kol_zam_teamA.value, 
                                    Bbs_teamA:Bbs_teamA.value, 
                                    Rpm_zam_teamA:Rpm_zam_teamA.value, 
                                    Rpm_bbs_teamA:Rpm_bbs_teamA.value, 
                                   /* 
                                    Kol_zam_teamB:Kol_zam_teamB.value, 
                                    Bbs_teamB:Bbs_teamB.value, 
                                    Rpm_zam_teamB:Rpm_zam_teamB.value, 
                                    Rpm_bbs_teamB:Rpm_bbs_teamB.value, 
                                    */
                                    Kol_zam_Sulf:Kol_zam_Sulf.value, 
                                    Bbs_Sulf:Bbs_Sulf.value, 
                                    Rpm_zam_Sulf:Rpm_zam_Sulf.value, 
                                    Rpm_bbs_Sulf:Rpm_bbs_Sulf.value,
                                    
                                    Incedents_comment:Incedents_comment.value, 
                                    NearMiss_comment:NearMiss_comment.value, 
                                    Bbswa_comment:Bbswa_comment.value, 
                                    Kol_vo_zam_comment:Kol_vo_zam_comment.value, 
                                    
                                    Kol_zam_teamA_comment:Kol_zam_teamA_comment.value, 
                                    Bbs_teamA_comment:Bbs_teamA_comment.value, 
                                    Rpm_zam_teamA_comment:Rpm_zam_teamA_comment.value, 
                                    Rpm_bbs_teamA_comment:Rpm_bbs_teamA_comment.value, 
                                    
                                  /*  Kol_zam_teamB_comment:Kol_zam_teamB_comment.value, 
                                    Bbs_teamB_comment:Bbs_teamB_comment.value, 
                                    Rpm_zam_teamB_comment:Rpm_zam_teamB_comment.value, 
                                    Rpm_bbs_teamB_comment:Rpm_bbs_teamB_comment.value, 
                                    */
                                    Kol_zam_Sulf_comment:Kol_zam_Sulf_comment.value, 
                                    Bbs_Sulf_comment:Bbs_Sulf_comment.value, 
                                    Rpm_zam_Sulf_comment:Rpm_zam_Sulf_comment.value, 
                                    Rpm_bbs_Sulf_comment:Rpm_bbs_Sulf_comment.value}),
                                    success: function(response) 
                                    {
                                        var data = JSON.parse(response);
                                        Incedents.value = "";
                                        NearMiss.value = "";
                                        Bbswa.value = "";
                                        Kol_vo_zam.value = "";
                                        
                                        Kol_zam_teamA.value = "";
                                        Bbs_teamA.value = "";
                                        Rpm_zam_teamA.value = "";
                                        Rpm_bbs_teamA.value = "";
                                        
                                       /* Kol_zam_teamB.value = "";
                                        Bbs_teamB.value = "";
                                        Rpm_zam_teamB.value = "";
                                        Rpm_bbs_teamB.value = "";*/
                                        
                                        Kol_zam_Sulf.value = "";
                                        Bbs_Sulf.value = "";
                                        Rpm_zam_Sulf.value = "";
                                        Rpm_bbs_Sulf.value = "";
                                        
                                        Incedents_comment.value = "";
                                        NearMiss_comment.value = "";
                                        Bbswa_comment.value = "";
                                        Kol_vo_zam_comment.value = "";
                                        
                                        Kol_zam_teamA_comment.value = "";
                                        Bbs_teamA_comment.value = "";
                                        Rpm_zam_teamA_comment.value = "";
                                        Rpm_bbs_teamA_comment.value = "";
                                        
                                      /*  Kol_zam_teamB_comment.value = "";
                                        Bbs_teamB_comment.value = "";
                                        Rpm_zam_teamB_comment.value = "";
                                        Rpm_bbs_teamB_comment.value = "";*/
                                        
                                        Kol_zam_Sulf_comment.value = "";
                                        Bbs_Sulf_comment.value = "";
                                        Rpm_zam_Sulf_comment.value = "";
                                        Rpm_bbs_Sulf_comment.value = "";
                                    }
                                });
                        }
            	    );
                }
            );