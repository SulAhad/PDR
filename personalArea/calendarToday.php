<?php
    $message = "SELECT * FROM calendarfortechnical WHERE DATE(date_start_event) = CURDATE() AND  user = '$a';";
   require('table.php')
?>