<?php
session_start();

if(isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $object = new User;
    $object->user_data_check($login, $password);
}

class Save_from_db {
    public function save($referrer) {
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $today = date("Y-m-d H:i:s");
        $name = $_SERVER['REQUEST_TIME'];
        $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $location_data = json_decode(file_get_contents("http://ip-api.com/json/" . $visitor_ip));
        $str = json_encode($location_data);
        $latitude = $location_data->lat;
        $longitude = $location_data->lon;

        $reserve = mysqli_connect('127.0.0.1', 'root', 'root', 'u1851636_StandbyDatabase');
        if (!$reserve) {
            die("Ошибка подключения к БД");
        }

        mysqli_set_charset($reserve, "utf8");
        $query = "INSERT INTO visitorsKPI (id, ip_address, browser, timeEnter, referrer, screen_resolution, language, latitude, longitude) VALUES (NULL, '$visitor_ip', '$browser', '$today', '$referrer', '$name', '$language', '$str', '$longitude')";
        if(mysqli_query($reserve, $query)) {
            mysqli_close($reserve);
        }
    }
}

class User {
    private $adminLogin = 'admin';
    private $adminPass = 'password';
    public function user_data_check($login, $password)
    {
        $link = mysqli_connect('127.0.0.1', 'root', 'root', 'u1851636_default');
        if (!$link) {
            die("Ошибка подключения к БД");
        }
        mysqli_set_charset($link, "utf8");
        $stmt = mysqli_prepare($link, "SELECT salt, id, access, surName, nameUser, position,
        main, 
        top5problem, 
        inspection,
        safety, 
        quality, 
        technology, 
        production,
        sulfirovanie,
        sirye, 
        active_water, 
        palletizer, 
        innotech1,
        innotech2,
        innotech3,
        uva4,
        uva5,
        acma4,
        planing,
        premirovanie,
        technical,
        support FROM Users_KPI WHERE name = ?");
        mysqli_stmt_bind_param($stmt, "s", $login);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $salt, $id, $access, $surName, $nameUser, $position, 
        $main, 
        $top5problem, 
        $inspection, 
        $safety, 
        $quality, 
        $technology, 
        $production,
        $sulfirovanie,
        $sirye, 
        $active_water, 
        $palletizer, 
        $innotech1, 
        $innotech2, 
        $innotech3, 
        $uva4,
        $uva5,
        $acma4,
        $planing,
        $premirovanie,
        $technical,
        $support);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        $hashed_password = hash('sha256', $password . $salt);
        $stmt = mysqli_prepare($link, "SELECT * FROM Users_KPI WHERE name = ? AND pass = ?");
        mysqli_stmt_bind_param($stmt, "ss", $login, $hashed_password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login'] = $login;
            $_SESSION['pass'] = $password;
            $_SESSION['access'] = $access;
            $_SESSION['id'] = $id;
            $_SESSION['real_name'] = $nameUser ." ". $surName;
            $_SESSION['surName'] = $surName;
            $_SESSION['nameUser'] = $nameUser;
            $_SESSION['position'] = $position;
            $_SESSION['index'] = $main;
            $_SESSION['top5problem'] = $top5problem;
            $_SESSION['inspection'] = $inspection;
            $_SESSION['safety'] = $safety;
            $_SESSION['quality'] = $quality;
            $_SESSION['technology'] = $technology;
            $_SESSION['production'] = $production;
            $_SESSION['sulfirovanie'] = $sulfirovanie;
            $_SESSION['sirye'] = $sirye;
            $_SESSION['active_water'] = $active_water;
            $_SESSION['palletizer'] = $palletizer;
            $_SESSION['innotech1'] = $innotech1;
            $_SESSION['innotech2'] = $innotech2;
            $_SESSION['innotech3'] = $innotech3;
            $_SESSION['uva4'] = $uva4;
            $_SESSION['uva5'] = $uva5;
            $_SESSION['acma4'] = $acma4;
            $_SESSION['planing'] = $planing;
            $_SESSION['premirovanie'] = $premirovanie;
            $_SESSION['technical'] = $technical;
            $_SESSION['support'] = $support;
            $name = $login;
            $pass = $password;
            setcookie("floatingInput", $name, time() + 3600 * 24 * 365);
            setcookie("floatingPassword", $pass, time() + 3600 * 24 * 365);
            $referrer = 'enter to app';
            $saveFromBd = new Save_from_db;
            $saveFromBd->save($referrer);
            echo"$login";
            exit;
        } else {
            $referrer = 'pass_false/trying to pass';
            $saveFromBd = new Save_from_db;
            $saveFromBd->save($referrer);
            echo "error";}
        mysqli_close($link);}}?>
