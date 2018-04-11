<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/Database.php';

class ProductGateway extends Database 
{

	public function selectAll($order)
	{
		if (!isset($order)) {
			$order = 'nome';
		}
		$pdo = Database::connect();
		$sql = $pdo->prepare("SELECT * FROM produtos ORDER BY $order ASC");
		$sql->execute();

		$products = array();
		while ($obj = $sql->fetch(PDO::FETCH_OBJ)) {
		
			$products[] = $obj;
		}
		return $products;
	}

	public function selectById($id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
		$sql->bindValue(1, $id);
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_OBJ);		
		return $result;
	}

	public function insert($nome, $valor, $descricao, $foto)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("INSERT INTO produtos (nome, valor, descricao, foto) VALUES (?, ?, ?, ?)");
		$result = $sql->execute(array($nome, $valor, $descricao, $foto));
	}

	public function edit($nome, $valor, $descricao, $foto , $id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("UPDATE produtos set nome = ?, valor = ?, descricao = ?, foto = ? WHERE id = ? LIMIT 1");
		$result = $sql->execute(array($nome, $valor, $descricao, $foto , $id));
	}

	public function delete($id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
		$sql->execute(array($id));
	}
}

?>
