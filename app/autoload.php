<?php 

function autoloadClass($class)
{
	$filemame = __DIR__."/".$class.".php";
	if (file_exists($filemame)) 
	{
		require_once($filemame);
		return;
	}
}

spl_autoload_register('autoloadClass');

