<?php 
require_once CONTROLLERS_PATH.'MainController.php';
require_once MODELS_PATH."CSVFile.php";
require_once MODELS_PATH."User.php";

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

        if (User::login($login, $password))
        {
            $result = ['success' => 'OK'];
        }
        else
        {
            $result = ['error' => 'ERROR'];
        }

        echo json_encode($result);

    }

    public function logout ()
    {
        User::logout();
        header("Location: /");
    }

}