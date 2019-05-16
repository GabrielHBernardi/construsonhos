<?php
	$servidor = 'localhost';
	$usuario = 'root';
	$senha = '';
	$dbname = 'construsonhos';

	$conexao = mysqli_connect($servidor, $usuario, $senha);

	if(!$conexao){
		echo "Erro ao conectar com o servidor MySql";
		die();
	} else {
		mysqli_select_db($conexao, $dbname);
		if(mysqli_error($conexao)) {
			echo "Erro ao conectar com o banco de dados";
			die();
		}
	}
?>