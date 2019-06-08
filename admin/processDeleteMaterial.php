<?php
	session_start();

	include "../config/conectionDB.php";

	$idMaterial = filter_input(INPUT_GET, 'idMaterial', FILTER_SANITIZE_NUMBER_INT);

	if (!empty($idMaterial)) {
		$query = "DELETE FROM tb_material WHERE idMaterial='$idMaterial'";

		$exec_query = mysqli_query($conexao, $query);

		if(mysqli_affected_rows($conexao)) {
			header('Location: listMaterial.php');
			$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Material deletado com sucesso</span></label>';
		} else {
			header('Location: editMaterial.php?idMaterial=$idMaterial');
			$_SESSION['msgEditProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Erro ao deletar material</span></label>';
		}
	} else {
		header("Location: listMaterial.php");
		$_SESSION['msgEditProvider'] = '<label class="msgLoginFail"><span style="color: #c22d43;">Necessário selecionar um material</span></label>';
	}
?>