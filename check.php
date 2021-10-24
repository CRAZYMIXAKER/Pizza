<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Check</title>
	<link rel="shortcut icon" href="./pizza.png" type="image/png" />
	<link rel="stylesheet" href="./check.css" />
</head>

<body>
	Вы заказали пиццу из следующих состовляющих:
	<h2><?= $_SESSION['IDSize'] ?>
	</h2>
</body>

</html>