<?php
	session_start();

	include "../config/conectionDB.php";

	$idServico = filter_input(INPUT_GET, 'idServico', FILTER_SANITIZE_NUMBER_INT);

	if (!empty($idServico)) {
		$query = "UPDATE tb_servico SET statusServico='Aceito' WHERE idServico='$idServico'";

		$exec_query = mysqli_query($conexao, $query);

		if(mysqli_affected_rows($conexao)) {
			header('Location: listService.php');
			$_SESSION['msgNewProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Serviço/orçamento aceitado com sucesso</span></label>';
		} else {
			header('Location: listService.php');
			$_SESSION['msgNewProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Erro ao aceitar serviço/orçamento</span></label>';
		}
	} else {
		header("Location: listService.php");
		$_SESSION['msgNewProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Para aceitar um serviço/orçamento é necessário selecioná-lo</span></label>';
	}
?>