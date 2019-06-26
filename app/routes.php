<?php 
require_once CONTROLLERS_PATH.'UserController.php';
require_once CONTROLLERS_PATH.'AdminController.php'; 

	if ($_SERVER['REQUEST_URI'] == '/admin' AND $_SERVER['REQUEST_METHOD'] === 'GET')
	{
		$controller = new AdminController();
		$controller->index();
	}
	elseif ($_SERVER['REQUEST_URI'] == '/registration' AND $_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$controller = new UserController();
		$controller->registration($_POST);
	}
	else 
	{
		$controller = new UserController();
		$controller->index();
	}

?>