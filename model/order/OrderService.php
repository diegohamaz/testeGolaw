<?php

require_once 'OrderGateway.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/ValidationException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/Database.php';

class OrderService extends OrderGateway
{

	private $ordersGateway = null;

	public function __construct()
	{
		$this->ordersGateway = new OrderGateway();
	}

	public function getAllOrders($order) { 
	    try { 
	        self::connect();
	        $res = $this->ordersGateway->selectAll($order); 
	        self::disconnect();
	        return $res; 
	    } catch (Exception $e) { 
	        self::disconnect();
	        throw $e; 
	    } 
	} 

	public function getOrder($id) 
	{
		try {
			self::connect();
			$result = $this->ordersGateway->selectById($id);
			self::disconnect();
			return $result;
		} catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
		return $this->ordersGateway->selectById($id);
	}


	public function createNewOrder($cliente, $produto, $quantidade, $valor)
	{
		try {
			
			self::connect();
			$result = $this->ordersGateway->insert($cliente, $produto, $quantidade, $valor);
			self::disconnect();
			return $result;
		} catch(Exception $e) {
			self::disconnect();
			throw $e;

		}
	}

}

?>
