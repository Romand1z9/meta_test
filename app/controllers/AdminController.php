<?php 
require_once CONTROLLERS_PATH.'MainController.php';

class AdminController extends MainController
{

	public function __construct()
	{

	}

	public function index ()
	{
		echo "HELLO ADMIN!";
	}

}