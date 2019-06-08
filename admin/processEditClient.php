<?php
	session_start();

	include "../config/conectionDB.php";

	$idCliente = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_NUMBER_INT);
	$nomeCliente = filter_input(INPUT_POST, 'nomeCliente', FILTER_SANITIZE_STRING);
	$cpfCliente = filter_input(INPUT_POST, 'cpfCliente', FILTER_SANITIZE_STRING);
	$telefoneCliente = filter_input(INPUT_POST, 'telefoneCliente', FILTER_SANITIZE_STRING);
	$emailCliente = filter_input(INPUT_POST, 'emailCliente', FILTER_SANITIZE_EMAIL);

	$insere_dados = "UPDATE tb_cliente SET nomeCliente='$nomeCliente', cpfCliente='$cpfCliente', telefoneCliente='$cpfCliente', emailCliente='$emailCliente' WHERE idCliente='$idCliente'";

	$resultado_insercao = mysqli_query($conexao, $insere_dados);

	if ($resultado_insercao) {
		header('Location: listClient.php');
		$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Cliente editado com sucesso</span></label>';
	} else {
		header("Location: editClient.php?idCliente=$idCliente");
		$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">Erro ao editar cliente</span></label>';
	}
?>