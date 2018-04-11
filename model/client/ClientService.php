<?php

require_once 'ClientGateway.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/ValidationException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/Database.php';

class ClientService extends ClientGateway
{

	private $clientsGateway = null;

	public function __construct()
	{
		$this->clientsGateway = new ClientGateway();
	}

	public function getAllClients($order) { 
	    try { 
	        self::connect();
	        $res = $this->clientsGateway->selectAll($order); 
	        self::disconnect();
	        return $res; 
	    } catch (Exception $e) { 
	        self::disconnect();
	        throw $e; 
	    } 
	} 

	public function getClient($id) 
	{
		try {
			self::connect();
			$result = $this->clientsGateway->selectById($id);
			self::disconnect();
			return $result;
		} catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
		return $this->clientsGateway->selectById($id);
	}

	private function validateClientParams($name, $email, $dt_cadastro, $tp_pagamento)
	{
		$errors = array();
		if ( !isset($name) || empty($name) ) { 
			    $errors[] = 'Nome é obrigatório'; 
			}
			if ( !isset($dt_cadastro) || empty($dt_cadastro) ) { 
			    $dt_cadastro[] = 'Número de Telefone é obrigatório'; 
			}
			if ( !isset($email) || empty($email) ) { 
			    $errors[] = 'Endereço de Email é Obrigatório'; 
			}
			if ( !isset($tp_pagamento) || empty($tp_pagamento) ) { 
			    $errors[] = 'Tipo de Pagamento é obrigatório'; 
			}
		if (empty($errors)) {
			return;
		}
		throw new ValidationException($errors);
	}

	public function createNewClient($name, $email, $dt_cadastro, $tp_pagamento)
	{
		try {
			
			self::connect();
			$this->validateClientParams($name, $email, $dt_cadastro, $tp_pagamento);
			$result = $this->clientsGateway->insert($name, $email, $dt_cadastro, $tp_pagamento);
			self::disconnect();
			return $result;
		} catch(Exception $e) {
			self::disconnect();
			throw $e;

		}
	}

	public function editClient($name, $email, $dt_cadastro, $tp_pagamento, $id)
	{
		try {
			self::connect();
			$result = $this->clientsGateway->edit($name, $email, $dt_cadastro, $tp_pagamento, $id);
			self::disconnect();
		}catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
	}

	public function deleteClient($id)
	{
		try {
			self::connect();
			$result = $this->clientsGateway->delete($id);
			self::disconnect();
		} catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
	}
}

?>
