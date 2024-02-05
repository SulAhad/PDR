<?php
$state = $_GET['state']; // 123
if (!empty($_GET['code'])) {
  $params = array(
    'grant_type'    => 'authorization_code',
    'code'          => $_GET['code'],
    'client_id'     => '6e2be76588564b71b7140f036d59d6c6',
    'client_secret' => 'e9a8a379110a47ceb187f777616c2410',
  );
  $ch = curl_init('https://oauth.yandex.ru/token');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER, false);
  $data = curl_exec($ch);
  curl_close($ch);
  $data = json_decode($data, true);
  if (!empty($data['access_token'])) {
    $ch = curl_init('https://login.yandex.ru/info');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('format' => 'json'));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $data['access_token']));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $info = curl_exec($ch);
    curl_close($ch);
    $info = json_decode($info, true);
    // Array ( [id] => 1130000062870348
    // [login] => akhad.suleymanov@lab-industries.ru
    // [client_id] => 6e2be76588564b71b7140f036d59d6c6
    // [display_name] => Suleymanov Akhad (ext)
    // [real_name] => Akhad (ext) Suleymanov
    // [first_name] => Akhad (ext)
    // [last_name] => Suleymanov
    // [sex] => male
    // [default_email] => akhad.suleymanov@lab-industries.ru
    // [emails] => Array ( [0] => akhad.suleymanov@lab-industries.ru )
    // [psuid] => 1.AArrzg.z_2-2eSnxdnkQe-5ezozuQ.RyAybXA5MUG580C7pZyjtA )
    setcookie('client_id', $info['client_id'], time() + (86400 * 30), "/");
    setcookie('login', $info['login'], time() + (86400 * 30), "/");
    setcookie('first_name', $info['first_name'], time() + (86400 * 30), "/");
        require('connect_db.php');
        $login = $info['login'];
        $link->set_charset("utf8");
        $message = "SELECT * FROM users_kpi WHERE name = '$login'";
        $result =  mysqli_query($link, $message);
        if(mysqli_num_rows($result) > 0)
        {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['login'] = $info['login'];
          $_SESSION['pass'] = $info['client_id'];
          $_SESSION['real_name'] = $info['real_name'];
          $_SESSION['access'] = $row['access'];
          $_SESSION['id'] = $row['id'];
          $_SESSION['surName'] = $row['surName'];
          $_SESSION['nameUser'] = $row['nameUser'];
          $_SESSION['position'] = $row['position'];
          $_SESSION['index'] = $row['main'];
          $_SESSION['top5problem'] = $row['top5problem'];
          $_SESSION['inspection'] = $row['inspection'];
          $_SESSION['safety'] = $row['safety'];
          $_SESSION['quality'] = $row['quality'];
          $_SESSION['technology'] = $row['technology'];
          $_SESSION['production'] = $row['production'];
          $_SESSION['sulfirovanie'] = $row['sulfirovanie'];
          $_SESSION['sirye'] = $row['sirye'];
          $_SESSION['active_water'] = $row['active_water'];
          $_SESSION['palletizer'] = $row['palletizer'];
          $_SESSION['innotech1'] = $row['innotech1'];
          $_SESSION['innotech2'] = $row['innotech2'];
          $_SESSION['innotech3'] = $row['innotech3'];
          $_SESSION['uva4'] = $row['uva4'];
          $_SESSION['uva5'] = $row['uva5'];
          $_SESSION['acma4'] = $row['acma4'];
          $_SESSION['planing'] = $row['planing'];
          $_SESSION['premirovanie'] = $row['premirovanie'];
          $_SESSION['technical'] = $row['technical'];
          $_SESSION['support'] = $row['support'];
          header('Location: http://10.171.71.50/Engels/index.php');
          exit;
        }
        else
        {
          $main = '1';
          $access = 98;
          $inspection = '1';
          // Генерация случайной соли
          $salt = bin2hex(random_bytes(16));
          $login = $info['login'];
          $pass = $info['client_id'];
          $surName = $info['last_name'];
          $name = $info['first_name'];
          // Добавление соли к паролю
          $hashed_password = hash('sha256', $pass . $salt);
          $link->set_charset("utf8");
          mysqli_query($link, "INSERT INTO `Users_KPI` (`id`, `name`, `access`,  `surName`,
          `nameUser`, `pass`, `salt`, `main`, `inspection`)
            VALUES (NULL, '$login',  '$access', '$surName', '$name', '$hashed_password', '$salt', '$main', '$inspection')");
            $login = $info['login'];
            $link->set_charset("utf8");
            $message = "SELECT * FROM users_kpi WHERE name = '$login'";
            $result =  mysqli_query($link, $message);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login'] = $info['login'];
            $_SESSION['pass'] = $info['client_id'];
            $_SESSION['access'] = $row['access'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['surName'] = $row['surName'];
            $_SESSION['nameUser'] = $row['nameUser'];
            $_SESSION['real_name'] = $info['real_name'];
            $_SESSION['position'] = $row['position'];
            $_SESSION['index'] = $row['main'];
            $_SESSION['top5problem'] = $row['top5problem'];
            $_SESSION['inspection'] = $row['inspection'];
            $_SESSION['safety'] = $row['safety'];
            $_SESSION['quality'] = $row['quality'];
            $_SESSION['technology'] = $row['technology'];
            $_SESSION['production'] = $row['production'];
            $_SESSION['sirye'] = $row['sirye'];
            $_SESSION['active_water'] = $row['active_water'];
            $_SESSION['palletizer'] = $row['palletizer'];
            $_SESSION['innotech1'] = $row['innotech1'];
            
            $_SESSION['support'] = $row['support'];
        // Redirect to bridge.php after setting cookies
        header('Location: http://10.171.71.50/Engels/index.php');
        exit;
        }
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $info['login'];
        $_SESSION['pass'] = $info['client_id'];
        $_SESSION['access'] = $row['access'];
        $_SESSION['real_name'] = $info['real_name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['surName'] = $row['surName'];
        $_SESSION['nameUser'] = $row['nameUser'];
        $_SESSION['position'] = $row['position'];
        $_SESSION['index'] = $row['main'];
        $_SESSION['top5problem'] = $row['top5problem'];
        $_SESSION['inspection'] = $row['inspection'];
        $_SESSION['safety'] = $row['safety'];
        $_SESSION['quality'] = $row['quality'];
        $_SESSION['technology'] = $row['technology'];
        $_SESSION['production'] = $row['production'];
        $_SESSION['sirye'] = $row['sirye'];
        $_SESSION['active_water'] = $row['active_water'];
        $_SESSION['palletizer'] = $row['palletizer'];
        $_SESSION['innotech1'] = $row['innotech1'];

        $_SESSION['support'] = $row['support'];
    // Redirect to bridge.php after setting cookies
    header('Location: http://10.171.71.50/Engels/index.php');
    exit;
  }
}
