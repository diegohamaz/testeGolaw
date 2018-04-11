<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/Database.php';

class OrderGateway extends Database 
{

	public function selectAll($order)
	{

		if (!isset($order)) {
			$order = 'id';
		}
		$pdo = Database::connect();
		$sql = $pdo->prepare("SELECT P.id, C.nome as nome_cliente , R.nome as nome_produto , P.quantidade , P.valor
			FROM pedidos AS P 
			INNER JOIN clientes AS C ON C.id = P.id_cliente 
			INNER JOIN produtos AS R ON R.id = P.id_produto
			ORDER BY $order ASC");
		$sql->execute();
		$orders = array();
		while ($obj = $sql->fetch(PDO::FETCH_OBJ)) {
		
			$orders[] = $obj;
		}
		return $orders;
	}

	public function selectById($id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("SELECT P.id, C.nome as nome_cliente , R.nome as nome_produto , P.quantidade , P.valor
			FROM pedidos AS P 
			INNER JOIN clientes AS C ON C.id = P.id_cliente 
			INNER JOIN produtos AS R ON R.id = P.id_produto WHERE P.id = ?");
		$sql->bindValue(1, $id);
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_OBJ);		
		return $result;
	}

	public function insert($id_cliente, $id_produto, $quantidade, $valor)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("INSERT INTO pedidos (id_cliente, id_produto, quantidade, valor) VALUES (?, ?, ?, ?)");
		$result = $sql->execute(array($id_cliente, $id_produto, $quantidade, $valor));
	}

}

?>
