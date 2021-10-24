<?php
require_once('DB.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$_SESSION['IDSize'] = $_POST['IDSize'];
	$_SESSION['IDSouse'] = $_POST['IDSouse'];
	$_SESSION['IDType'] = $_POST['IDType'];

	function getSingleValue($con, $sql)
	{
		$query = $con->prepare($sql);
		$query->execute();
		return $query->fetchColumn();
	}

	$sqlSizePrice = "SELECT Price FROM Size WHERE IDSize = {$_POST['IDSize']}";
	$SizePrice = getSingleValue($connect, $sqlSizePrice);

	$sqlSousePrice = "SELECT Price FROM Souse WHERE IDSouse = {$_POST['IDSouse']}";
	$SousePrice = getSingleValue($connect, $sqlSousePrice);

	$sqlTypePrice = "SELECT Price FROM Type WHERE IDType = {$_POST['IDType']}";
	$TypePrice = getSingleValue($connect, $sqlTypePrice);

	$price = $SizePrice + $SousePrice + $TypePrice;

	$sql = "INSERT Pizza (Id_Size, Id_Souse, Id_Type, Price) VALUES (:size, :souse, :type , :price)";
	$query = $connect->prepare($sql);

	$query->bindParam(':size', $_POST['IDSize']);
	$query->bindParam(':souse', $_POST['IDSouse']);
	$query->bindParam(':type', $_POST['IDType']);
	$query->bindParam(':price', $price);
	$query->execute();

	header('Location: check.php');
} else {
}

function getArray($connect, $sql)
{
	$query = $connect->prepare($sql);
	$query->execute();
	return $query->fetchAll();
}