<?php
session_start();
$link = mysqli_connect('127.0.0.1', 'root', 'root', 'u1851636_default');
$reserve = mysqli_connect('127.0.0.1', 'root', 'root', 'u1851636_StandbyDatabase');
if(!$link) die("Ошибка подключения к БД");
?>
