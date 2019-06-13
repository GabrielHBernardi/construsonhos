<?php
	session_start();

	include "../config/conectionDB.php";

	$idServico = filter_input(INPUT_POST, 'idServico', FILTER_SANITIZE_STRING);
	$idCliente = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_STRING);
	$tipoServico = filter_input(INPUT_POST, 'tipoServico', FILTER_SANITIZE_STRING);
	$dataServico = filter_input(INPUT_POST, 'dataServico', FILTER_SANITIZE_STRING);
	$statusServico = filter_input(INPUT_POST, 'statusServico', FILTER_SANITIZE_STRING);
	$cepServico = filter_input(INPUT_POST, 'cepServico', FILTER_SANITIZE_STRING);
	$estadoServico = filter_input(INPUT_POST, 'estadoServico', FILTER_SANITIZE_STRING);
	$cidadeServico = filter_input(INPUT_POST, 'cidadeServico', FILTER_SANITIZE_STRING);
	$bairroServico = filter_input(INPUT_POST, 'bairroServico', FILTER_SANITIZE_STRING);
	$ruaServico = filter_input(INPUT_POST, 'ruaServico', FILTER_SANITIZE_STRING);
	$numeroServico = filter_input(INPUT_POST, 'numeroServico', FILTER_SANITIZE_NUMBER_INT);
	$metroQuadradoServico = filter_input(INPUT_POST, 'metroQuadradoServico', FILTER_SANITIZE_STRING);
	$valorMaoDeObraServico = filter_input(INPUT_POST, 'valorMaoDeObraServico', FILTER_SANITIZE_STRING);
	$valorMaoDeObraServico = str_replace(['.',','], ['', '.'], $valorMaoDeObraServico);

	$insere_dados = "UPDATE tb_servico SET idCliente='$idCliente', tipoServico='$tipoServico', dataServico='$dataServico', statusServico='$statusServico', cepServico='$cepServico', estadoServico='$estadoServico', cidadeServico='$cidadeServico', bairroServico='$bairroServico', ruaServico='$ruaServico', numeroServico='$numeroServico', metroQuadradoServico='$metroQuadradoServico', valorMaoDeObraServico='$valorMaoDeObraServico',  WHERE idServico='$idServico'";

	$resultado_insercao = mysqli_query($conexao, $insere_dados);

	if ($resultado_insercao) {
		header('Location: listService.php');
		$_SESSION['msgEditProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Serviço editado com sucesso</span></label>';
	} else {
		header("Location: editService.php?idServico=$idServico");
		$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">Erro ao editar serviço</span></label>';
	}
?>