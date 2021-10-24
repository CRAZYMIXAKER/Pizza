<?php
require_once 'DB.php';
require_once 'functions.php';
?>



<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Pizza</title>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<link rel="shortcut icon" href="./pizza.png" type="image/png" />
	<link rel="stylesheet" href="./main.css" />
</head>

<body>
	<div class="wrapper">
		<section class="hero">
			<form action="functions.php" method="POST" class="form">
				<div class="form__title">Заказ пиццы</div>
				<div class="form__select">
					<select class="select" name="IDType">
						<option disabled>Пиццы:</option>
						<?php
						$arrType = getArray($connect, 'SELECT IDType, NameType FROM Type');
						foreach ($arrType as $Type) {
							echo "<option value='{$Type['IDType']}'>{$Type['NameType']}</option>";
						}
						?>
					</select>
					<select class="select" name="IDSize">
						<option disabled>Размер:</option>
						<?php
						$arrSize = getArray($connect, 'SELECT IDSize, Dimension FROM Size');
						foreach ($arrSize as $Size) {
							echo "<option value='{$Size['IDSize']}'>{$Size['Dimension']}</option>";
						}
						?>
					</select>
					<select class="select" name="IDSouse">
						<option disabled>Соусы:</option>
						<?php
						$arrSouse = getArray($connect, 'SELECT IDSouse, NameSouse FROM Souse');
						foreach ($arrSouse as $Souse) {
							echo "<option value='{$Souse['IDSouse']}'>{$Souse['NameSouse']}</option>";
						}
						?>
					</select>
				</div>
				<button class="form__button">Order</button>
			</form>

		</section>
	</div>

	<script src="./ajax.js"></script>
</body>

</html>