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

	$query = "INSERT INTO tb_servico (idCliente, tipoServico, dataServico, statusServico, cepServico, estadoServico, cidadeServico, bairroServico, ruaServico, numeroServico, valorMaoDeObraServico, valorMaterialServico, comprovantePagamentoServico, statusPagamentoServico) VALUES ('$idCliente', '$tipoServico', '', 'Aguardando retorno da construtora', '$cepServico', '$estadoServico', '$cidadeServico', '$bairroServico', '$ruaServico', '$numeroServico', '', '', '', 'Serviço ainda não concluído')";

	$exec_query = mysqli_query($conexao, $query);

	if ($exec_query) {
		$service_id = mysqli_insert_id($conexao);

		$checklist = filter_input(INPUT_POST, 'tagsinput', FILTER_SANITIZE_STRING);
		$checklist = explode(",", $checklist);

		foreach($checklist as $key => $check) {
			$insert_check = "INSERT INTO tb_item_servico (idServico, descricaoItemServico) VALUES ('$service_id', '$check')";
			mysqli_query($conexao, $insert_check);
		}

		$count = count($_FILES['arquivo']['name']);

		for($i=0; $i<=$count; $i++) {
			$name = $_FILES['arquivo']['name'][$i];
			$size = $_FILES['arquivo']['size'][$i];
			$tmp = $_FILES['arquivo']['tmp_name'][$i];
			$error = $_FILES['arquivo']['error'][$i];

			$_UP['pasta'] = '../imgservico/';
		
			$_UP['tamanho'] = 1024*1024*100;
			
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg');
			
			$_UP['renomeia'] = false;
			
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
			if($error != 0){
				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$error]);
			}

			$string = $name;
			$strings = explode('.', $string);
			
			$extensao = end($strings);
			if(array_search($extensao, $_UP['extensoes']) === false){		
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/construsonhos/client/newVoucher.php?idServico=$idServico'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
			}
			
			else if ($_UP['tamanho'] < $size){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/construsonhos/client/newVoucher.php?idServico=$idServico'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
			}
			
			else{
				if($_UP['renomeia'] == true){
					$nome_final = time().'.jpg';
				}else{
					$nome_final = $name;
				}
				if(move_uploaded_file($tmp, $_UP['pasta']. $nome_final)){
					$query = mysqli_query($conexao, "INSERT INTO tb_imagem (nomeImagem, idServico) VALUES ('$nome_final', '$service_id')");
					header('Location: listService.php');
					$_SESSION['msgNewProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Comprovante enviado com sucesso! Em breve será feito a validação do mesmo.</span></label>';
				}else{
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/construsonhos/client/newVoucher.php?idServico=$idServico'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada com Sucesso.\");
						</script>
					";
				}
			}
		}
		
		header('Location: listService.php');
		$_SESSION['msgNewProvider'] = '<label class="msgLogin"><span style="color: #01a620;">Orçamento solicitado com sucesso! Em breve você receberá um retorno.</span></label>';
	} else {
		header('Location: newService.php');
		$_SESSION['msgNewProvider'] = '<label class="msgsNewProvider"><span style="color: #c22d43;">Erro ao solicitar orçamento</span></label>';
	}
?>