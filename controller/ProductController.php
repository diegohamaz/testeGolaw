<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/Autoloader.php';
require_once ROOT_PATH . '/model/product/productService.php';


class ProductController
{

	private $productService = null;

	
	public function __construct()
	{
		$this->productService = new ProductService();
	}

	public function redirect($location)
	{
		header('Location: ' . $location);
	}

	public function listProduct()
	{
		$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
		$products = $this->productService->getAllProducts($orderby);
		include ROOT_PATH . '/view/product/products.php';

	}

	public function saveProduct()
	{
		$title = 'Add new product';

		$nome	 = '';
		$valor 	 = '';
		$descricao 	 = '';
		$foto = '';

		$errors = array();

		if (isset($_POST['form-submitted'])) {

			$nome 	 = isset($_POST['nome']) 	? trim($_POST['nome']) 	  : null;
			$valor 	 = isset($_POST['valor']) 	? trim($_POST['valor'])   : null;
			$descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : null;
			$foto = isset($_POST['foto']) ? trim($_POST['foto']) : null;
	
			try {

				$this->productService->createNewProduct($nome, $valor, $descricao, $foto);
				$this->redirect('index.php');
				return;
			} catch(ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		include ROOT_PATH . '/view/product/product-form.php';
	}

	public function editProduct()
	{
		$title  = "Edit Product";
		$nome 	 = '';
		$valor 	 = '';
		$descricao = '';
		$foto = '';
		$id      = $_GET['id'];
		$errors = array();

		$product = $this->productService->getProduct($id);

		if (isset($_POST['form-submitted'])) {

			$nome 	 = isset($_POST['nome']) 	? trim($_POST['nome']) 	  : null;
			$valor 	 = isset($_POST['valor']) 	? trim($_POST['valor'])   : null;
			$descricao 	 = isset($_POST['descricao']) ? trim($_POST['descricao'])   : null;
			$foto = isset($_POST['foto']) ? trim($_POST['foto']) : null;

			try {
				$this->productService->editProduct($nome, $valor, $descricao, $foto, $id);
				$this->redirect('index.php');
				return;
			} catch(ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		include ROOT_PATH . '/view/product/product-form-edit.php';
	}

	public function deleteProduct()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : null;
			if (!$id) {
				throw new Exception('Internal error');
			}
			$this->productService->deleteProduct($id);

			$this->redirect('index.php');
	}

	public function showProduct()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		$errors = array();
		if (!$id) {
			throw new Exception('Internal error');
		}
		$client = $this->productService->getProduct($id);
		include ROOT_PATH . '/view/product/product.php';
	}

	public function showError($title, $message)
	{
		include ROOT_PATH . '/view/product/error.php';
	}
}

?>
