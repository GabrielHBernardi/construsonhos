<?php
	session_start();

	include "../config/conectionDB.php";

	$idCliente = filter_input(INPUT_GET, 'idCliente', FILTER_SANITIZE_NUMBER_INT);

	if (!empty($idCliente)) {
		$query = "DELETE FROM tb_cliente WHERE idCliente='$idCliente'";

		$exec_query = mysqli_query($conexao, $query);

		if(mysqli_affected_rows($conexao)) {
			header('Location: listClient.php');
			$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Cliente deletado com sucesso</span></label>';
		} else {
			header('Location: editClient.php?idCliente=$idCliente');
			$_SESSION['msgEditProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Erro ao deletar cliente</span></label>';
		}
	} else {
		header("Location: listClient.php");
		$_SESSION['msgEditProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Necessário selecionar um cliente</span></label>';
	}
?>