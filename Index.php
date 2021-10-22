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
					<select class="select" name="language">
						<option value="" disabled>Пиццы:</option>
						<option value="">Пепперони</option>
						<option value="">Деревенская</option>
						<option value="">Гавайская</option>
						<option value="">Грибная</option>
					</select>
					<select class="select" name="language">
						<option value="" disabled>Размер:</option>
						<option value="">21</option>
						<option value="">26</option>
						<option value="">31</option>
						<option value="">45</option>
					</select>
					<select class="select" name="language">
						<option value="" disabled>Соусы:</option>
						<option value="">Сырный</option>
						<option value="">Кисло-сладкий</option>
						<option value="">Чесночный</option>
						<option value="">Барбекю</option>
					</select>
				</div>
				<button class="form__button">Order</button>
			</form>

		</section>
	</div>

	<script src="./ajax.js"></script>
</body>

</html>