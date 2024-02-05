<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
     <meta http-equiv="Pragma" content="no-cache">
     <meta http-equiv="Expires" content="0">
    <title>Ежедневный мониторинг производства</title>
    <link href="/Engels/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src='/Engels/bootstrap/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link type="image/x-icon" href="https://img.icons8.com/office/80/000000/line-chart.png" width="94" height="94" rel="shortcut icon">
    <link href="/Engels/style/style.css" rel="stylesheet">
    <header class="fixed-top bodyBackground shadow-sm">
    <script>
            let maxTime = 20 * 60; // 20 минут
            let curr = maxTime;

            function countdown() {
            if (curr > 0) {
                console.log("Осталось времени: " + formatTime(curr));
                curr--;
            } else {
                window.location.href = '/../Engels/logout.php';
            }
            }

            function formatTime(seconds) {
            let minutes = Math.floor(seconds / 60);
            let remainingSeconds = seconds % 60;
            return minutes + ":" + (remainingSeconds < 10 ? "0" : "") + remainingSeconds;
            }

            let interval = setInterval(countdown, 1000); // Обновляем обратный отсчет каждую секунду
        </script>
        <style>
          
          body 
            {
                margin-top:60px;
                background: rgb(189 210 229);
            }
            .textarea_Top5Problem{
            height:40px;
            }
          .p_Index
            {
                overflow-wrap: break-word;
                height:5px;
            }
            
            .td_Index
            {
                width: 30px;
                vertical-align: middle;
            }
          .trIndex
            {
                font-size:12px;
                text-align:center;
            }
          .theadIndex
            {
                background:darkgray;
                position: sticky;
                top:0px;
                color:white;
            }
            td.success 
            {
                background: LawnGreen;
            }

            td.danger 
            {
                background: Crimson;
                color:white;
            }
          #loader 
            {
                border: 4px solid #f3f3f3;
                border-top: 4px solid #3498db;
                border-radius: 50%;
                width: 30px;
                height: 30px;
                animation: spin 1s linear infinite;
                margin: 0 auto;
            }

            @keyframes spin 
            {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            .box:hover
            {
                box-shadow: 0 0 11px rgba(33,33,33,.2);
            }

            .box 
            {
                transition: box-shadow .3s;
            }

            .no-bootstrap
            {
                display:flex;
            }

            .clock 
            {
                font-size: 12px;
                margin: 0 0 0 10px;
            }
            .responsive-text 
            { 
              font-size: 18px;
            }
            @media only screen and (max-width: 600px) 
            {
                .responsive-text 
                {
                    font-size: 10px;
                }
            }
            .iconsButtons
            {
                height:18px;
                margin: 1px 15px 3px 1px;
                vertical-align: middle;
                horizontal-align: center;
                padding:2px;
            }
            /* .blur{
            backdrop-filter: blur(25px) black;
            background: transparent;
            border: 2px solid rgba(255,255,255,0.5);
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            }*/
            
            @keyframes gradient { /* Объявляем анимацию с именем "gradient" */
              0% { /* Начальное состояние анимации */
                background-position: 0% 50%; /* Устанавливаем начальную позицию фона */
              }
              25% { /* Состояние анимации на 25% от длительности */
                background-position: 100% 50%; /* Устанавливаем позицию фона на 25% от длительности */
              }
              50% { /* Состояние анимации на 50% от длительности */
                background-position: 100% 50%; /* Устанавливаем позицию фона на 50% от длительности */
              }
              75% { /* Состояние анимации на 75% от длительности */
                background-position: 0% 50%; /* Устанавливаем позицию фона на 75% от длительности */
              }
              100% { /* Конечное состояние анимации */
                background-position: 0% 50%; /* Устанавливаем конечную позицию фона */
              }
            }
        </style>
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="2left">
                <?php require($_SERVER['DOCUMENT_ROOT'].'../Engels/bootstrapSidebar.php');?>
            </div>
            <text class="responsive-text" style="padding:6px;"><?php echo $_COOKIE['innotech1'] ?> ЕЖЕДНЕВНЫЙ МОНИТОРИНГ ПРОИЗВОДСТВА</text>
            
            
                <div id="clock" style="color:gray; font-size:20px; font-family: CAMBRIA; font-weight:light;" class="responsive-text"></div>
            
        </div>
        <script>
        setTimeout(function() {
            location.href = 'logOut.php';
        }, 28800000);
        </script>
        <script>
            
            var url = window.location.href;
                $.ajax({
                    url: '/Engels/insert_user.php',
                    type: 'POST',
                    data: {url: url},
                    success: function(response)
                    {
                    }
                });
        </script>
    </header>
    
    <script src="/Engels/script/current_time.js"></script>
    <script src="/Engels/sidebars.js"></script>
    <script src="/Engels/script/animation_row.js"></script>
    <script src="/Engels/script/loader_overlay.js"></script>
</head>
