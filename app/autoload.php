<?php

	spl_autoload_register(function($classname)
	{
		// $classname = 'MVC\Models\Usuario';
		$path = strtolower($classname);
		// $path = 'mvc\models\usuario';
		$path = str_replace("\\", "/", $path);
		// $path = 'mvc/models/usuario';
		$path .= ".php";
		require $path;
	});
