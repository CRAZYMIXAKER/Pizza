<?php
require_once 'pdoconfig.php';
$options = array(
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$connect = new PDO($dsn, $username, $password, $options);
$connect->exec('SET NAMES UTF8');
if (!$connect) {
	die("Произошла непредвиденная ошибка! Мы работаем над устранением проблемы.");
}