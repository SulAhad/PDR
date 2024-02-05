<?php
if($_SESSION['access'] < 100){
echo "<style>
    body 
    {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }
    h1 
    {
        text-align: center;
        margin-top: 50px;
    }
    p 
    {
        text-align: center;
        font-size: 18px;
        margin-top: 20px;
    }
</style>";
echo"<body>";
echo"<h1>Access Denied!</h1>";
echo"</body>";
exit();
}
?>