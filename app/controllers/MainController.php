<?php 

namespace controllers;

class MainController 
{
	protected $layout = 'main';
	protected $title = 'Главная';
	protected $content = '';

	public function render()
	{
		$content = $this->content;

		require_once LAYOUTS_PATH.$this->layout.".php"; 

		exit();
	}

	public function view($file, $vars = [])
	{
		$file_view = VIEWS_PATH.$file.".php";

		if (file_exists($file_view))
		{
            if (!empty($vars))
            {
                extract($vars);
            }

			ob_start();

			require $file_view;

			$content = ob_get_contents();

			ob_get_clean();

			return $content;
		}

		return FALSE;
	}

}