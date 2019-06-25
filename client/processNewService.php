<?php
	session_start();

	include "../config/conectionDB.php";

	$idCliente = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_STRING);
	$tipoServico = filter_input(INPUT_POST, 'tipoServico', FILTER_SANITIZE_STRING);
	$cepServico = filter_input(INPUT_POST, 'cepServico', FILTER_SANITIZE_STRING);
	$estadoServico = filter_input(INPUT_POST, 'estadoServico', FILTER_SANITIZE_STRING);
	$cidadeServico = filter_input(INPUT_POST, 'cidadeServico', FILTER_SANITIZE_STRING);
	$bairroServico = filter_input(INPUT_POST, 'bairroServico', FILTER_SANITIZE_STRING);
	$ruaServico = filter_input(INPUT_POST, 'ruaServico', FILTER_SANITIZE_STRING);
	$numeroServico = filter_input(INPUT_POST, 'numeroServico', FILTER_SANITIZE_NUMBER_INT);

	$query = "INSERT INTO tb_servico (idCliente, tipoServico, dataServico, statusServico, cepServico, estadoServico, cidadeServico, bairroServico, ruaServico, numeroServico, valorMaoDeObraServico, valorMaterialServico, comprovantePagamentoServico, statusPagamentoServico) VALUES ('$idCliente', '$tipoServico', '', 'Aguardando retorno da construtora', '$cepServico', '$estadoServico', '$cidadeServico', '$bairroServico', '$ruaServico', '$numeroServico', '', '', '', '')";

	$exec_query = mysqli_query($conexao, $query);

	if ($exec_query) {
		$service_id = mysqli_insert_id($conexao);

		$checklist = filter_input(INPUT_POST, 'tagsinput', FILTER_SANITIZE_STRING);
		$checklist = explode(",", $checklist);

		foreach($checklist as $key => $check) {
			$insert_check = "INSERT INTO tb_item_servico (idServico, descricaoItemServico) VALUES ('$service_id', '$check')";
			mysqli_query($conexao, $insert_check);
		}
		
		header('Location: listService.php');
		$_SESSION['msgNewProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Orçamento solicitado com sucesso! Em breve você receberá um retorno.</span></label>';
	} else {
		header('Location: newService.php');
		$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">Erro ao solicitar orçamento</span></label>';
	}
?>