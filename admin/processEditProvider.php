<?php
	session_start();

	include "../config/conectionDB.php";

	$id = filter_input(INPUT_POST, 'idFornecedor', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
	$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
	$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
	$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
	$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
	$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);

	$insere_dados = "UPDATE tb_fornecedor SET nomeFornecedor='$nome', telefoneFornecedor='$telefone', emailFornecedor='$email', cepFornecedor='$cep', estadoFornecedor='$estado', cidadeFornecedor='$cidade', bairroFornecedor='$bairro', ruaFornecedor='$rua', numeroFornecedor='$numero' WHERE idFornecedor='$id'";

	$resultado_insercao = mysqli_query($conexao, $insere_dados);

	if ($resultado_insercao) {
		header('Location: listProvider.php');
		$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Fornecedor editado com sucesso</span></label>';
	} else {
		header("Location: editProvider.php?idFornecedor=$id");
		$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">Erro ao editar fornecedor</span></label>';
	}
?>