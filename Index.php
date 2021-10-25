<?php
session_start();
require_once 'DB.php';
require_once 'functions.php';
$pizza = new pizza($connect);
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
		<?php if (!isset($_SESSION['Pizza'])) : ?>
		<section class="hero">
			<form class="form" id="pizza_form">
				<div class="form__title">Заказ пиццы</div>
				<div class="form__select">
					<select class="select" name="IDType">
						<option disabled>Пиццы:</option>
						<?php
							$arrType = $pizza->getArray('SELECT IDType, NameType FROM Type');
							foreach ($arrType as $Type) {
								echo "<option value='{$Type['IDType']}'>{$Type['NameType']}</option>";
							}
							?>
					</select>
					<select class="select" name="IDSize">
						<option disabled>Размер:</option>
						<?php
							$arrSize = $pizza->getArray('SELECT IDSize, Dimension FROM Size');
							foreach ($arrSize as $Size) {
								echo "<option value='{$Size['IDSize']}'>{$Size['Dimension']}</option>";
							}
							?>
					</select>
					<select class="select" name="IDSouse">
						<option disabled>Соусы:</option>
						<?php
							$arrSouse = $pizza->getArray('SELECT IDSouse, NameSouse FROM Souse');
							foreach ($arrSouse as $Souse) {
								echo "<option value='{$Souse['IDSouse']}'>{$Souse['NameSouse']}</option>";
							}
							?>
					</select>
				</div>
				<button class="form__button" type="submit">Order</button>
			</form>
			<div id="my_message"></div>
		</section>
		<? elseif (isset($_POST)) : ?>
		Вы заказали пиццу из следующих состовляющих:
		<div>Пицца:
			<?= $_SESSION['Pizza']['IDType'] ?>
		</div>
		<div>Размер:
			<?= $_SESSION['Pizza']['IDSize'] ?> см
		</div>
		<div>Соус:
			<?= $_SESSION['Pizza']['IDSouse'] ?>
		</div>
		<div>Цена:
			<?= $_SESSION['Pizza']['Price'] ?>
		</div>
		<a href="functions.php?OneMore" id="one_More">Заказать еще одну пиццу</a>
		<?php endif; ?>
	</div>

	<script src="./ajax.js"></script>
</body>

</html>