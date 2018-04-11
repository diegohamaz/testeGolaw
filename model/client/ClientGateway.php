<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/Database.php';

class ClientGateway extends Database 
{

	public function selectAll($order)
	{
		if (!isset($order)) {
			$order = 'nome';
		}
		$pdo = Database::connect();
		$sql = $pdo->prepare("SELECT * FROM clientes ORDER BY $order ASC");
		$sql->execute();
		//$result = $sql->fetchAll(PDO::FETCH_ASSOC);

		$clients = array();
		while ($obj = $sql->fetch(PDO::FETCH_OBJ)) {
		
			$clients[] = $obj;
		}
		return $clients;
	}

	public function selectById($id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
		$sql->bindValue(1, $id);
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_OBJ);		
		return $result;
	}

	public function insert($nome, $email, $dt_cadastro, $tp_pagamento)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("INSERT INTO clientes (nome, email, dt_cadastro, tp_pagamento) VALUES (?, ?, ?, ?)");
		$result = $sql->execute(array($nome, $email, $dt_cadastro, $tp_pagamento));
	}

	public function edit($nome, $email, $dt_cadastro, $tp_pagamento , $id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("UPDATE clientes set nome = ?, email = ?, dt_cadastro = ?, tp_pagamento = ? WHERE id = ? LIMIT 1");
		$result = $sql->execute(array($nome, $email, $dt_cadastro, $tp_pagamento, $id));
	}

	public function delete($id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
		$sql->execute(array($id));
	}
}

?>
