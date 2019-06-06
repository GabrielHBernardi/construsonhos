<?php
	session_start();

	unset($_SESSION['idCliente'], $_SESSION['nomeCliente']);

	header('Location: /construsonhos/');
?>