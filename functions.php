<?php
session_start();
require_once('DB.php');

class pizza
{
	public $connect;

	public function __construct($connect)
	{
		$this->connect = $connect;
		// $this->dom = $this->workWithXPATH();
		// $this->xpath = new DOMXPath($this->dom);
		// $this->xml = simplexml_load_file("db.xml");
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
			'Price' => $price
		];
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
} elseif (isset($_GET['OneMore'])) {
	unset($_SESSION['Pizza']);
	header('Location: index.php');
}