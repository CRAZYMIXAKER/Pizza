<?php
session_start();
require_once 'DB.php';
require_once 'functional.php';
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
				<button class="form__button" type="submit">Заказать</button>
			</form>
			<div id="message"></div>
		</section>

		<? elseif (isset($_POST)) : ?>
		<section class="check">
			<div class="check__title"> Вы заказали пиццу из следующих состовляющих: </div>
			<div class="check__description">Пицца: <?= $_SESSION['Pizza']['Type'] ?> </div>
			<div class="check__description">Размер: <?= $_SESSION['Pizza']['Size'] ?> см </div>
			<div class="check__description">Соус: <?= $_SESSION['Pizza']['Souse'] ?> </div>
			<div class="check__description">Цена: <?= $_SESSION['Pizza']['Price'] ?> </div>
			<a class="check__oneMore" href="functional.php?OneMore" id="one_More">Заказать еще одну пиццу</a>
		</section>
		<?php endif; ?>
	</div>

	<script src="./ajax.js"></script>
</body>

</html>