<?php
	session_start();

	include "../config/conectionDB.php";

	$nomeCliente = filter_input(INPUT_POST, 'nomeCliente', FILTER_SANITIZE_STRING);
	$cpfCliente = filter_input(INPUT_POST, 'cpfCliente', FILTER_SANITIZE_STRING);
	$telefoneCliente = filter_input(INPUT_POST, 'telefoneCliente', FILTER_SANITIZE_STRING);
	$emailCliente = filter_input(INPUT_POST, 'emailCliente', FILTER_SANITIZE_EMAIL);

	$query = "SELECT * FROM tb_cliente";

	$exec_query = mysqli_query($conexao, $query);

	$row_query = mysqli_fetch_assoc($exec_query);

	if ($cpfCliente == $row_query['cpfCliente']) {
		header('Location: newClient.php');
		$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">CPF já cadastrado</span></label>';
	} else {
		if ($emailCliente == $row_query['emailCliente']) {
			header('Location: newClient.php');
			$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">E-mail já cadastrado</span></label>';
		} else {
			$insere_dados = "INSERT INTO tb_cliente (nomeCliente, cpfCliente, telefoneCliente, emailCliente) VALUES ('$nomeCliente', '$cpfCliente', '$telefoneCliente' , '$emailCliente')";

			$resultado_insercao = mysqli_query($conexao, $insere_dados);

			if ($resultado_insercao) {
				header('Location: listClient.php');
				$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Cadastro efetuado com sucesso</span></label>';
			} else {
				header('Location: newClient.php');
				$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">Erro ao efetuar cadastro</span></label>';
			}
		}
	}
?>