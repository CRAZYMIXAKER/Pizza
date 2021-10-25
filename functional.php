<?php
session_start();
require_once('DB.php');

class pizza
{
	public $connect;

	public function __construct($connect)
	{
		$this->connect = $connect;
	}

	public function addPizza()
	{
		$sql = "INSERT Pizza (Id_Size, Id_Souse, Id_Type, Price) VALUES (:size, :souse, :type , :price)";
		$query = $this->connect->prepare($sql);

		$query->bindParam(':size', $_POST['IDSize']);
		$query->bindParam(':souse', $_POST['IDSouse']);
		$query->bindParam(':type', $_POST['IDType']);
		$query->bindParam(':price', $_SESSION['Pizza']['Price']);
		$query->execute();
	}

	public function getPrice()
	{
		$sqlSizePrice = "SELECT Price FROM Size WHERE IDSize = {$_POST['IDSize']}";
		$SizePrice = $this->getSingleValue($this->connect, $sqlSizePrice);

		$sqlSousePrice = "SELECT Price FROM Souse WHERE IDSouse = {$_POST['IDSouse']}";
		$SousePrice = $this->getSingleValue($this->connect, $sqlSousePrice);

		$sqlTypePrice = "SELECT Price FROM Type WHERE IDType = {$_POST['IDType']}";
		$TypePrice = $this->getSingleValue($this->connect, $sqlTypePrice);

		$price = $SizePrice + $SousePrice + $TypePrice;

		$_SESSION['Pizza'] = [
			'IDSize' => $_POST['IDSize'],
			'IDSouse' => $_POST['IDSouse'],
			'IDType' => $_POST['IDType'],
			'Price' => $price,
		];

		$this->addPizza();
	}

	public function getPizza()
	{
		$sqlSize = "SELECT Dimension FROM Size WHERE IDSize = {$_POST['IDSize']}";
		$Size = $this->getSingleValue($this->connect, $sqlSize);

		$sqlSouse = "SELECT NameSouse FROM Souse WHERE IDSouse = {$_POST['IDSouse']}";
		$Souse = $this->getSingleValue($this->connect, $sqlSouse);

		$sqlType = "SELECT NameType FROM Type WHERE IDType = {$_POST['IDType']}";
		$Type = $this->getSingleValue($this->connect, $sqlType);

		$_SESSION['Pizza']['Size'] = $Size;
		$_SESSION['Pizza']['Souse'] = $Souse;
		$_SESSION['Pizza']['Type'] = $Type;
	}

	public function getSingleValue($con, $sql)
	{
		$query = $con->prepare($sql);
		$query->execute();
		return $query->fetchColumn();
	}

	public function getArray($sql)
	{
		$query = $this->connect->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$pizza = new pizza($connect);
	$pizza->getPrice();
	$pizza->getPizza();
} elseif (isset($_GET['OneMore'])) {
	unset($_SESSION['Pizza']);
	header('Location: index.php');
}