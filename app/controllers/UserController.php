<?php

namespace controllers;

use controllers\MainController;
use models\User;

class UserController extends MainController
{

	public function index ()
	{
	    $this->title = lang('user.page_title');
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

		$result = User::addUser($data_for_registration);

		echo json_encode($result);

	}



}