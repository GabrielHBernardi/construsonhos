<?php
	session_start();

	include "../config/conectionDB.php";

	$nomeMaterial = filter_input(INPUT_POST, 'nomeMaterial', FILTER_SANITIZE_STRING);
	$marcaMaterial = filter_input(INPUT_POST, 'marcaMaterial', FILTER_SANITIZE_STRING);
	$idFornecedor = filter_input(INPUT_POST, 'idFornecedor', FILTER_SANITIZE_EMAIL);
	$valorUnitarioMaterial = filter_input(INPUT_POST, 'valorUnitarioMaterial', FILTER_SANITIZE_STRING);

	$query = "SELECT * FROM tb_material";

	$exec_query = mysqli_query($conexao, $query);

	$row_query = mysqli_fetch_assoc($exec_query);

	// if ('condicao se já tem cadastrado') {
	// 	header('Location: newProvider.php');
	// 	$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">E-mail já cadastrado</span></label>';
	// } else {
		$insere_dados = "INSERT INTO tb_material (nomeMaterial, marcaMaterial, idFornecedor, valorUnitarioMaterial) VALUES ('$nomeMaterial', '$marcaMaterial' , '$idFornecedor', '$valorUnitarioMaterial')";

		$resultado_insercao = mysqli_query($conexao, $insere_dados);

		if ($resultado_insercao) {
			header('Location: listMaterial.php');
			$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Cadastro efetuado com sucesso</span></label>';
		} else {
			header('Location: newMaterial.php');
			$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">Erro ao efetuar cadastro</span></label>';
		}
	// }
?>