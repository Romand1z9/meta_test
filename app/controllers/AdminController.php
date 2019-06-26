<?php 
require_once CONTROLLERS_PATH.'MainController.php';
require_once MODELS_PATH."CSVFile.php";

class AdminController extends MainController
{

	public function __construct()
	{

	}

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

		//die;
	}

}