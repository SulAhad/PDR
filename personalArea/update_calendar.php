<?php
if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];
    $message = "SELECT user FROM calendarfortechnical;";
    $link->set_charset("utf8");
    $result = mysqli_query($link, $message);
    $users = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row['user'];
        }
        foreach ($users as $user) {
            echo "<div class='col-md-2 border bg-secondary mt-2'> ";
            echo "<p style='font-size:12px; background:Beige;'>$user</p>";
            $query = "SELECT * FROM calendarfortechnical WHERE date = '$selectedDate'";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card-body card m-1' style='background:OldLace;'>";
                echo "<small style='font-size:8px;' class='text-muted'>№" . $row['id'] . "</small>";
                echo "<small class='text-muted'>" . $row['name_event'] . "</small>";
                echo "<p class='card-text'>" . $row['text_event'] . "</p>";
                echo "<div class='d-flex justify-content-between align-items-center'>";
                echo "<div class='btn-group'>";
                echo "<input style='font-size:10px;' readonly type='text' class='form-control form-control-sm' value='" . date('H:i', strtotime($row['date_start_event'])) . "'>";
                echo "<input style='font-size:10px;' readonly type='text' class='form-control form-control-sm' value='" . date('H:i', strtotime($row['date_end_event'])) . "'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        }
    } else {
        echo "<p'>нет заполненных данных...</p>";
    }
}
?>