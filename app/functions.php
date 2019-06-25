<?php 

function element($key, $array, $default = FALSE)
{
	if (isset($array[$key]) && !empty($array[$key]))
	{
		return $array[$key];
	}
	return $default;
}

function dump($data, $die = TRUE)
{
	echo "<pre>".print_r($data, TRUE)."</pre>"; 
	
	if ($die)
	{
		die;
	}
}