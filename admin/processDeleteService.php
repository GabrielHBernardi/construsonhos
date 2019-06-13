<?php
	session_start();

	include "../config/conectionDB.php";

	$idServico = filter_input(INPUT_GET, 'idServico', FILTER_SANITIZE_NUMBER_INT);

	if (!empty($idServico)) {
		$query = "DELETE FROM tb_servico WHERE idServico='$idServico'";

		$exec_query = mysqli_query($conexao, $query);

		if(mysqli_affected_rows($conexao)) {
			header('Location: listService.php');
			$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Serviço deletado com sucesso</span></label>';
		} else {
			header('Location: editService.php?idServico=$idServico');
			$_SESSION['msgEditProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Erro ao deletar serviço</span></label>';
		}
	} else {
		header("Location: listService.php");
		$_SESSION['msgEditProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Necessário selecionar um serviço</span></label>';
	}
?>