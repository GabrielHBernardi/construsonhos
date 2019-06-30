<?php
	session_start();

	include "../config/conectionDB.php";

	$idServico = filter_input(INPUT_GET, 'idServico', FILTER_SANITIZE_NUMBER_INT);

	if (!empty($idServico)) {
		$query = "UPDATE tb_servico SET statusPagamentoServico='Aprovado' WHERE idServico='$idServico'";

		$exec_query = mysqli_query($conexao, $query);

		if(mysqli_affected_rows($conexao)) {
			header('Location: listService.php');
			$_SESSION['msgNewProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Pagamento aprovado com sucesso</span></label>';
		} else {
			header('Location: listService.php');
			$_SESSION['msgNewProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Erro ao aprovar pagamento</span></label>';
		}
	} else {
		header("Location: listService.php");
		$_SESSION['msgNewProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Necessário selecionar um serviço para aprovar seu pagamento</span></label>';
	}
?>