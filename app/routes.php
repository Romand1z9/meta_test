<?php

use controllers\UserController;
use controllers\AdminController;
use models\User;

	if ($_SERVER['REQUEST_URI'] == '/admin' AND $_SERVER['REQUEST_METHOD'] == 'GET' && User::is_login()) // Админка
	{
		$controller = new AdminController();
		$controller->index();
	}
   else if ($_SERVER['REQUEST_URI'] == '/admin/logout' AND $_SERVER['REQUEST_METHOD'] == 'GET') // Выход из адинки
    {
        $controller = new AdminController();
        $controller->logout();
    }
    elseif ($_SERVER['REQUEST_URI'] == '/admin' AND $_SERVER['REQUEST_METHOD'] === 'POST') // Запрос на вход в админку
    {
        $controller = new AdminController();
        $controller->login($_POST);
    }
	elseif ($_SERVER['REQUEST_URI'] == '/registration' AND $_SERVER['REQUEST_METHOD'] === 'POST') // Запрос на регистрацию пользователя.
	{
		$controller = new UserController();
		$controller->registration($_POST);
	}
	else // Публичная часть.
	{
		$controller = new UserController();
		$controller->index();
	}

?>