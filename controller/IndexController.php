<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/Autoloader.php';
require_once ROOT_PATH . '/model/client/ClientService.php';
require_once ROOT_PATH . '/model/order/OrderService.php';
require_once ROOT_PATH . '/model/product/ProductService.php';
require_once 'ProductController.php';
require_once 'OrderController.php';
require_once 'ClientController.php';
class IndexController
{

	private $clientsService = null;
	private $orderService = null;
	private $productsService = null;

	public $clientsController = null;
	public $productController = null;
	public $orderController = null;
	
	public function __construct()
	{
		$this->clientsService = new ClientService();
		$this->orderService = new OrderService();
		$this->productsService = new ProductService();

		$this->clientsController = new ClientController();
		$this->productController = new ProductController();
		$this->orderController = new OrderController();
	}

	public function redirect($location)
	{
		header('Location: ' . $location);
	}

	public function handleRequest()
	{
		$op = isset($_GET['op']) ? $_GET['op'] : null;
		try {

			if(empty($op)){
				$this->showIndex();
			}else if (!$op || $op == 'list_client') {
				$this->clientsController->listClient();
			} elseif ($op == 'new_client') {
				$this->clientsController->saveClient();
			} elseif ($op == 'edit_client') {
				$this->clientsController->editClient();
			} elseif ($op == 'delete_client') {
				$this->clientsController->deleteClient();
			} elseif ($op == 'show_client') {
				$this->clientsController->showClient();
			} else if (!$op || $op == 'list_product') {
				$this->productController->listProduct();
			} elseif ($op == 'new_product') {
				$this->productController->saveProduct();
			} elseif ($op == 'edit_product') {
				$this->productController->editProduct();
			} elseif ($op == 'delete_product') {
				$this->productController->deleteProduct();
			} elseif ($op == 'show_product') {
				$this->productController->showProduct();
			}elseif ($op == 'new_order') {
				$this->orderController->saveOrder();
			} elseif ($op == 'list_order') {
				$this->orderController->listOrder();
			}elseif ($op == 'show_order') {
				$this->orderController->showOrder();
			}else {
				$this->showError("Pagina nao encontrada", "Pagina por operação " . $op . " não foi encontrado!");
			}
		} catch(Exception $e) {
			$this->showError("Applicação está com erro", $e->getMessage());
		}
	}

	public function showIndex()
	{
		$order = null;

		$clients = $this->clientsService->getAllClients($order);
		$products = $this->productsService->getAllProducts($order);
		$orders = $this->orderService->getAllOrders($order);

		include ROOT_PATH . 'view/initial_grid.php';
	}


	public function showError($title, $message)
	{
		include ROOT_PATH . 'view/error.php';
	}
}

?>
