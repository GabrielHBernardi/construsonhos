<?php
	session_start();

	include "../config/conectionDB.php";

	$idMaterial = filter_input(INPUT_POST, 'idMaterial', FILTER_SANITIZE_NUMBER_INT);
	$nomeMaterial = filter_input(INPUT_POST, 'nomeMaterial', FILTER_SANITIZE_STRING);
	$marcaMaterial = filter_input(INPUT_POST, 'marcaMaterial', FILTER_SANITIZE_STRING);
	$idFornecedor = filter_input(INPUT_POST, 'idFornecedor', FILTER_SANITIZE_STRING);
	$valorUnitarioMaterial = filter_input(INPUT_POST, 'valorUnitarioMaterial', FILTER_SANITIZE_STRING);

	$query = "UPDATE tb_material SET nomeMaterial='$nomeMaterial', marcaMaterial='$marcaMaterial', idFornecedor='$idFornecedor', valorUnitarioMaterial='$valorUnitarioMaterial' WHERE idMaterial='$idMaterial'";

	$exec_query = mysqli_query($conexao, $query);

	if ($exec_query) {
		header('Location: listMaterial.php');
		$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Material editado com sucesso</span></label>';
	} else {
		header("Location: editMaterial.php?idMaterial=$idMaterial");
		$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">Erro ao editar material</span></label>';
	}
?>