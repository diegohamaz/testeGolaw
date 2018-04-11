<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/testeGolaw/model/Autoloader.php';
require_once ROOT_PATH . '/model/client/clientService.php';


class ClientController
{

	private $clientsService = null;

	
	public function __construct()
	{
		$this->clientsService = new ClientService();
	}


	public function listClient()
	{
		$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
		$clients = $this->clientsService->getAllClients($orderby);
		include ROOT_PATH . '/view/client/clients.php';

	}

	public function saveClient()
	{
		$title = 'Add new client';

		$name 	 = '';
		$email 	 = '';
		$dt_cadastro 	 = '';
		$tp_pagamento = '';

		$errors = array();

		if (isset($_POST['form-submitted'])) {

			$name 	 = isset($_POST['name']) 	? trim($_POST['name']) 	  : null;
			$email 	 = isset($_POST['email']) 	? trim($_POST['email'])   : null;
			$dt_cadastro = isset($_POST['dt_cadastro']) ? trim($_POST['dt_cadastro']) : null;
			$tp_pagamento = isset($_POST['tp_pagamento']) ? trim($_POST['tp_pagamento']) : null;

			try {
				$this->clientsService->createNewClient($name, $email, $dt_cadastro, $tp_pagamento);
				$this->redirect('index.php');
				return;
			} catch(ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		include ROOT_PATH . '/view/client/client-form.php';
	}

	public function editClient()
	{
		$title  = "Edit Client";
		$name 	 = '';
		$email 	 = '';
		$dt_cadastro = '';
		$tp_pagamento = '';
		$id      = $_GET['id'];
		$errors = array();

		$client = $this->clientsService->getClient($id);

		if (isset($_POST['form-submitted'])) {

			$name 	 = isset($_POST['name']) 	? trim($_POST['name']) 	  : null;
			$email 	 = isset($_POST['email']) 	? trim($_POST['email'])   : null;
			$dt_cadastro 	 = isset($_POST['dt_cadastro']) ? trim($_POST['dt_cadastro'])   : null;
			$tp_pagamento = isset($_POST['tp_pagamento']) ? trim($_POST['tp_pagamento']) : null;

			try {
				$this->clientsService->editClient($name, $email, $dt_cadastro, $tp_pagamento, $id);
				$this->redirect('index.php');
				return;
			} catch(ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		include ROOT_PATH . 'view/client/client-form-edit.php';
	}

	public function deleteClient()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : null;
			if (!$id) {
				throw new Exception('Internal error');
			}
			$this->clientsService->deleteClient($id);

			$this->redirect('index.php');
	}

	public function showClient()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		$errors = array();
		if (!$id) {
			throw new Exception('Internal error');
		}
		$client = $this->clientsService->getClient($id);
		include ROOT_PATH . 'view/client/client.php';
	}

	public function showError($title, $message)
	{
		include ROOT_PATH . 'view/client/error.php';
	}
	public function redirect($location)
	{
		header('Location: ' . $location);
	}
}

?>
