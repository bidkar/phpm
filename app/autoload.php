<?php
return
	spl_autoload_register(function($classname)
	{
		$path = strtolower($classname);
		$path = str_replace("\\", "/", $path);
		$path = APP_DIR . $path . ".php";
		
		if (is_readable($path))
			require $path;
		else
			die('Error al leer el archivo ' . $path);
	});
