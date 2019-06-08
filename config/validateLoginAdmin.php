<?php
	session_start();

	include_once("conectionDB.php");

	$buttonLoginAdmin = filter_input(INPUT_POST, 'buttonLoginAdmin', FILTER_SANITIZE_STRING);

	if ($buttonLoginAdmin){
		$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
		$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
		
		if ((!empty($login)) AND (!empty($senha))){
			$query = "SELECT idAdmin, login, senha FROM tb_admin WHERE login='$login' LIMIT 1";
			$exec_query = mysqli_query($conexao, $query);

			if ($exec_query){
				$row_query = mysqli_fetch_assoc($exec_query);
				if (password_verify($senha, $row_query['senha'])){
					$_SESSION['idAdmin'] = $row_query['idAdmin'];
					header('Location: /construsonhos/admin/');
					$_SESSION['msgLoginAdmin'] = '<label class="msgLoginAdmin"><span style="color: #01a620;">Seja Bem Vindo Ao Painel Administrativo!</span></label>';
				} else {
					header('Location: /construsonhos?modalName=myModalLoginAdmin');
					$_SESSION['msgLoginAdmin'] = '<label class="msgLoginAdmin"><span style="color: #c22d43;">Login ou senha incorreto</span></label>';
				}
			}
		} else {
			header('Location: /construsonhos?modalName=myModalLoginAdmin');
			$_SESSION['msgLoginAdmin'] = '<label class="msgLoginAdmin"><span style="color: #c22d43;">Login ou senha incorreto</span></label>';
		}
	} else {
		header("Location: /construsonhos/");
	}
?>