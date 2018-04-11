<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/Autoloader.php';
require_once ROOT_PATH . '/model/order/orderService.php';


class OrderController
{

	private $ordersService = null;
	private $clientService = null;
	private $productService = null;

	
	public function __construct()
	{
		$this->ordersService = new OrderService();
		$this->clientService = new ClientService();
		$this->productService = new ProductService();
	}

	public function redirect($location)
	{
		header('Location: ' . $location);
	}

	public function listOrder()
	{
		$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
		$orders = $this->ordersService->getAllOrders($orderby);
		include ROOT_PATH . '/view/order/orders.php';

	}

	public function saveOrder()
	{
		$title = 'Add new order';

		$name 	 = '';
		$email 	 = '';
		$dt_cadastro 	 = '';
		$tp_pagamento = '';

		$errors = array();

		if (isset($_POST['form-submitted'])) {

			$cliente 	 = isset($_POST['clientes']) 	? trim($_POST['clientes']) 	  : null;
			$produto 	 = isset($_POST['produtos']) 	? trim($_POST['produtos'])   : null;
			$quantidade = isset($_POST['quantidade']) ? trim($_POST['quantidade']) : null;
			$valor = isset($_POST['valor']) ? trim($_POST['valor']) : null;

			try {
				$this->ordersService->createNewOrder($cliente, $produto, $quantidade, $valor);
				$this->redirect('index.php');
				return;
			} catch(ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		$clients = $this->clientService->getAllClients(null);
		$products = $this->productService->getAllProducts(null);
		include ROOT_PATH . '/view/order/order-form.php';
	}

	

	public function showOrder()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		$errors = array();
		if (!$id) {
			throw new Exception('Internal error');
		}
		$orders = $this->ordersService->getOrder($id);
		include ROOT_PATH . 'view/order/order.php';
	}

	public function showError($title, $message)
	{
		include ROOT_PATH . 'view/error.php';
	}
}

?>
