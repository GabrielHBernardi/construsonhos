<?php
	session_start();

	unset($_SESSION['idAdmin']);

	header('Location: /construsonhos/');
?>