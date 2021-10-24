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


function getSingleValue($con, $sql)
{
	$query = $con->prepare($sql);
	$query->execute();
	return $query->fetchColumn();
}


// $sqlSizePrice = "SELECT Price FROM Size WHERE IDSize = $IDsize";
// $SizePrice = getSingleValue($connect, $sqlSizePrice);

// $sqlSousePrice = "SELECT Price FROM Souse WHERE IDSouse = $IDsouse";
// $SousePrice = getSingleValue($connect, $sqlSousePrice);

// $sqlTypePrice = "SELECT Price FROM Type WHERE IDType = $IDtype";
// $TypePrice = getSingleValue($connect, $sqlTypePrice);

// $price = $SizePrice + $SousePrice + $TypePrice;


// $sql = "INSERT Pizza (Id_Size, Id_Souse, Id_Type, Price) VALUES (:size, :souse, :type , :price)";
// $query = $connect->prepare($sql);

// $query->bindParam(':size', $IDsize);
// $query->bindParam(':souse', $IDsouse);
// $query->bindParam(':type', $IDtype);
// $query->bindParam(':price', $price);
// $query->execute();