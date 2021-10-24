<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	print_r($_POST);
	echo 'YES';
	// echo '<h2>'.$_POST.'</h2>';
} else {
	echo 'No';
}
?>



<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Pizza</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="shortcut icon" href="./pizza.png" type="image/png" />
	<link rel="stylesheet" href="./main.css" />
</head>

<body>
	<div class="wrapper">
		<section class="hero">
			<form action="" method="POST" class="form">
				<div class="form__title">Заказ пиццы</div>
				<div class="form__select">
					<select class="select" name="Pizza">
						<option value="" disabled>Пиццы:</option>
						<option value="1">Пепперони</option>
						<option value="2">Деревенская</option>
						<option value="3">Гавайская</option>
						<option value="4">Грибная</option>
					</select>
					<select class="select" name="Size">
						<option value="" disabled>Размер:</option>
						<option value="1">21</option>
						<option value="2">26</option>
						<option value="3">31</option>
						<option value="4">45</option>
					</select>
					<select class="select" name="Sous">
						<option value="" disabled>Соусы:</option>
						<option value="1">Сырный</option>
						<option value="2">Кисло-сладкий</option>
						<option value="3">Чесночный</option>
						<option value="4">Барбекю</option>
					</select>
				</div>
				<button class="form__button">Order</button>
			</form>

		</section>
	</div>

	<script src="./ajax.js"></script>
</body>

</html>