<?php
	session_start();

	include "../config/conectionDB.php";

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
	$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
	$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
	$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
	$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
	$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);

	$query = "SELECT emailFornecedor FROM tb_fornecedor WHERE emailFornecedor = '$email'";

	$exec_query = mysqli_query($conexao, $query);

	$row_query = mysqli_fetch_assoc($exec_query);

	if ($email == $row_query['emailFornecedor']) {
		header('Location: newProvider.php');
		$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">E-mail já cadastrado</span></label>';
	} else {
		$query_nome = "SELECT nomeFornecedor FROM tb_fornecedor WHERE nomeFornecedor = '$nome'";

		$exec_query_nome = mysqli_query($conexao, $query_nome);

		$row_query_nome = mysqli_fetch_assoc($exec_query_nome);
		if ($nome == $row_query_nome['nomeFornecedor']) {
			header('Location: newProvider.php');
			$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">Nome já cadastrado</span></label>';
		} else {
			$insere_dados = "INSERT INTO tb_fornecedor (nomeFornecedor, telefoneFornecedor, emailFornecedor, cepFornecedor, estadoFornecedor, cidadeFornecedor, bairroFornecedor, ruaFornecedor, numeroFornecedor) VALUES ('$nome', '$telefone' , '$email', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero')";

			$resultado_insercao = mysqli_query($conexao, $insere_dados);

			if ($resultado_insercao) {
				header('Location: listProvider.php');
				$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Cadastro efetuado com sucesso</span></label>';
			} else {
				header('Location: newProvider.php');
				$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">Erro ao efetuar cadastro</span></label>';
			}
		}
	}
?>