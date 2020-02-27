<?php
	echo('Configuracoes Server'.'<br>');
	echo('HTTP_HOST='.$_SERVER['HTTP_HOST'].'<br>');
	echo('SERVER_PORT='.$_SERVER['SERVER_PORT'].'<br>');
	echo('UNAME='.php_uname().'<br>');
	
	$server='';
	$prefixHttp='http://';
	$substring = 'wserver2'; 
	if (strpos(php_uname(), $substring) == false) { 
		$server='localhost'; 
	} 
	else{
		$server='wserver2';
	}

	if($_SERVER['SERVER_PORT'] == 443){
		$prefixHttp='https://';
	}

	echo($prefixHttp.$server.'<br>');
?>
