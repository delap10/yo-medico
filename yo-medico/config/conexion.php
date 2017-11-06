<?php
	require_once 'const_mysql.php';
	//$mysqli=new mysqli("localhost","u188512583_2540","qRamFhX0aLJp","u188512583_web"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}else{
		$mysqli->query("SET NAMES 'utf8'");
	}
	
?>