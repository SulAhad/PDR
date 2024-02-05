<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['premirovanie'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html>
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?><
</head>
<body class="bg-light mt-4">
<div class="container-fluid">
    <div class="row">
    <?php
    $message = "SELECT * FROM calendarfortechnical;";
    $link->set_charset("utf8");
    $result = mysqli_query($link, $message);
    $users = array();
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $user = $row['user'];
        if (!in_array($user, $users)) {
            $users[] = $user;
        }
    }
    foreach ($users as $user) { 
        echo "<div class='col-md-2 border bg-light mt-2' id='$user'> ";
        echo "<p style='font-size:14px; background:Beige; text-align: center'>$user</p>";
        echo "<div class='events-container' id='events-$user'>";

        echo "</div>";
        echo "</div>";
    }
?>
<script>
    function loadUserEvents(user) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('events-' + user).innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "get_user_events.php?user=" + user, true);
        xhttp.send();
    }
    function autoRefresh() {
        <?php foreach($users as $user) { ?>
            loadUserEvents('<?php echo $user; ?>');
        <?php } ?>
    }
    autoRefresh();
    setInterval(autoRefresh, 5000);
</script>
</div>
</body>
</html>
