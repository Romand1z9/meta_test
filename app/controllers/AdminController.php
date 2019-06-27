<?php
namespace controllers;

use controllers\MainController;
use models\CSVFile;
use models\User;

class AdminController extends MainController
{

	public function index ()
	{
	    $this->title = lang('admin.panel');

	    $data = [];

        $fields = ['registration_time','name', 'surname', 'birthday', 'company', 'position', 'phone'];

	    $csv_users = new CSVFile('users');

	    if ($csv_users)
        {
            $data = $csv_users->getRows($fields);
        }

        $this->content = $this->view('users_table', ['users' => $data, 'columns_table' => $fields]);

	    $this->render();

	}

	public function login($request)
    {
        $login = element('login', $request);

        $password = element('password', $request);

        $result = User::login($login, $password);

        echo json_encode($result);

    }

    public function logout ()
    {
        User::logout();
        header("Location: /");
    }

}