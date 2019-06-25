<?php 

require_once CONTROLLERS_PATH.'MainController.php';

class UserController extends MainController
{

	public function index ()
	{
		$this->content = $this->view('login');
		$this->render();
	}

	public function registration ($data)
	{
		$data_for_registration = [
			'name' => element('name', $data),
			'surname' => element('surname', $data),
			'birthday' => element('birthday', $data),
			'company' => element('company', $data),
			'position' => element('position', $data),
			'phone' =>  element('phone', $data),
		];

		echo dump($data_for_registration);

	}



}