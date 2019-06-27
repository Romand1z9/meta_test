<?php 

function autoloadClass($class)
{
	$filename = str_replace("\\", "/",__DIR__."/".$class.".php");
	if (file_exists($filename))
	{
		require_once($filename);
		return;
	}
}

spl_autoload_register('autoloadClass');

