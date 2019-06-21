<?php
	session_start();

	include_once("conectionDB.php");

	$btnLogin = filter_input(INPUT_POST, 'buttonLogin', FILTER_SANITIZE_STRING);

	if ($btnLogin){
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
		
		if ((!empty($email)) AND (!empty($senha))){
			$query = "SELECT idCliente, nomeCliente, emailCliente, senhaCliente FROM tb_cliente WHERE emailCliente='$email' LIMIT 1";
			$exec_query = mysqli_query($conexao, $query);

			if ($exec_query){
				$row_query = mysqli_fetch_assoc($exec_query);
				if ($row_query['emailCliente'] == $email && $row_query['senhaCliente'] == '') {
					header('Location: /construsonhos?modalName=myModalFirstPassword');
					$_SESSION['msgFirstPassword'] = '<label class="msgLogin"><span style="color: #c22d43;">Cadastre uma senha para acessar sua conta</span></label>';
				} else if (password_verify($senha, $row_query['senhaCliente'])) {
					$_SESSION['idCliente'] = $row_query['idCliente'];
					$_SESSION['nomeCliente'] = $row_query['nomeCliente'];
					header('Location: /construsonhos/client/');
					$_SESSION['msgLogin'] = '<label class="msgLogin"><span style="color: #01a620;">Seja Bem Vindo!</span></label>';
				} else {
					header('Location: /construsonhos?modalName=myModalLogin');
					$_SESSION['msgLogin'] = '<label class="msgLogin"><span style="color: #c22d43;">E-mail ou senha incorreto</span></label>';
				}
			}
		} else {
			header('Location: /construsonhos?modalName=myModalLogin');
			$_SESSION['msgLogin'] = '<label class="msgLogin"><span style="color: #c22d43;">E-mail ou senha incorreto</span></label>';
		}
	} else {
		header("Location: /construsonhos/");
	}
?>