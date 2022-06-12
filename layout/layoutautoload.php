<?php
spl_autoload_register(
	function($className)
	{
		$root = $_SERVER['DOCUMENT_ROOT'];
		$file = $root . 'nothalfbrad/layout/' . $className . '.php';
		echo $file;
		if(file_exists($file))
			include $file;
	}
);


?>