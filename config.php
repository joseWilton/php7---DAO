<?php 
//função anonima que recebe o nome da classe 
//auto load da classes
spl_autoload_register(function($class_name){
	$filename = "class".DIRECTORY_SEPARATOR.$class_name.".php"; // directory_separate vai encontrar as classes que estão na pasta class
	if(file_exists($filename)){
		require_once($filename);
	}
});

?>