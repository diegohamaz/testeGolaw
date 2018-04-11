<?php

require_once 'ProductGateway.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/ValidationException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/Database.php';

class ProductService extends ProductGateway
{

	private $productsGateway = null;

	public function __construct()
	{
		$this->productsGateway = new ProductGateway();
	}

	public function getAllProducts($order) { 
	    try { 
	        self::connect();
	        $res = $this->productsGateway->selectAll($order); 
	        self::disconnect();
	        return $res; 
	    } catch (Exception $e) { 
	        self::disconnect();
	        throw $e; 
	    } 
	} 

	public function getProduct($id) 
	{
		try {
			self::connect();
			$result = $this->productsGateway->selectById($id);
			self::disconnect();
			return $result;
		} catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
		return $this->productsGateway->selectById($id);
	}

	private function validateProductParams($name, $valor, $descricao)
	{
		$errors = array();
		if ( !isset($name) || empty($name) ) { 
			    $errors[] = 'Nome do produto é obrigatório'; 
			}
			if ( !isset($valor) || empty($valor) ) { 
			    $dt_cadastro[] = 'Valor é obrigatório'; 
			}
			if ( !isset($descricao) || empty($descricao) ) { 
			    $errors[] = 'Descrição é Obrigatório'; 
			}
		
		if (empty($errors)) {
			return;
		}
		throw new ValidationException($errors);
	}

	public function createNewProduct($name, $valor, $descricao, $foto)
	{
		try {
			self::connect();
			$this->validateProductParams($name, $valor, $descricao);
			$result = $this->productsGateway->insert($name, $valor, $descricao, $foto);
			self::disconnect();
			return $result;
		} catch(Exception $e) {
			self::disconnect();
			throw $e;

		}
	}

	public function editProduct($name, $valor, $descricao, $foto, $id)
	{
		try {
			self::connect();
			$result = $this->productsGateway->edit($name, $valor, $descricao, $foto, $id);
			self::disconnect();
		}catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
	}

	public function deleteProduct($id)
	{
		try {
			self::connect();
			$result = $this->productsGateway->delete($id);
			self::disconnect();
		} catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
	}
}

?>
