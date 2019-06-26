<?php 
require_once CONTROLLERS_PATH.'UserController.php';
require_once CONTROLLERS_PATH.'AdminController.php';
require_once MODELS_PATH."User.php";

	if ($_SERVER['REQUEST_URI'] == '/admin' AND $_SERVER['REQUEST_METHOD'] == 'GET' && User::is_login())
	{
		$controller = new AdminController();
		$controller->index();
	}
   else if ($_SERVER['REQUEST_URI'] == '/admin/logout' AND $_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $controller = new AdminController();
        $controller->logout();
    }
    elseif ($_SERVER['REQUEST_URI'] == '/admin' AND $_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $controller = new AdminController();
        $controller->login($_POST);
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