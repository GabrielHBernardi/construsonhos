<?php
	session_start();

	include "../config/conectionDB.php";

	$idFornecedor = filter_input(INPUT_GET, 'idFornecedor', FILTER_SANITIZE_NUMBER_INT);

	if (!empty($idFornecedor)) {
		$query = "DELETE FROM tb_fornecedor WHERE idFornecedor='$idFornecedor'";

		$exec_query = mysqli_query($conexao, $query);

		if(mysqli_affected_rows($conexao)) {
			header('Location: listProvider.php');
			$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Fornecedor deletado com sucesso</span></label>';
		} else {
			header('Location: editProvider.php?idFornecedor=$idFornecedor');
			$_SESSION['msgEditProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Erro ao deletar fornecedor</span></label>';
		}
	} else {
		header("Location: listProvider.php");
		$_SESSION['msgEditProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Necessário selecionar um fornecedor</span></label>';
	}
?>