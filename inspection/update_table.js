function updateTable() 
{
   $.ajax({
    url: "/Engels/inspection/updateTable.php",
    success: function(data) 
    {
     $("#tableBodyStat").html(data);
    }
   });
}
function updateTableTiming() 
{
   $.ajax({
    url: "/Engels/inspection/updateTableTiming.php",
    success: function(data) 
    {
     $("#tableBodyStatTiming").html(data);
    }
   });
}