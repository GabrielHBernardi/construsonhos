<?php
	session_start();

	use Dompdf\Dompdf;

	require_once('../dompdf/autoload.inc.php');

	include "../config/conectionDB.php";

	$idServico = filter_input(INPUT_GET, 'idServico', FILTER_SANITIZE_NUMBER_INT);

	// SELECT * FROM SERVIÇO
	$query_servico = "SELECT * FROM tb_servico WHERE idServico='$idServico'";
	$exec_query_servico = mysqli_query($conexao, $query_servico);
	$row_servico = mysqli_fetch_assoc($exec_query_servico);
	$idCliente = $row_servico['idCliente'];
	$tipoServico = $row_servico['tipoServico'];
	$dataServico = $row_servico['dataServico'];
	$statusServico = $row_servico['statusServico'];
	$cepServico = $row_servico['cepServico'];
	$estadoServico = $row_servico['estadoServico'];
	$cidadeServico = $row_servico['cidadeServico'];
	$bairroServico = $row_servico['bairroServico'];
	$ruaServico = $row_servico['ruaServico'];
	$numeroServico = $row_servico['numeroServico'];
	$metroQuadradoServico = $row_servico['metroQuadradoServico'];
	$valorMaoDeObraServico = number_format($row_servico['valorMaoDeObraServico'], 2, ',', '.');

	// SELECT NOME DO CLIENTE
	$query_cliente = "SELECT * FROM tb_cliente WHERE idCliente='$idCliente'";
	$exec_query_cliente = mysqli_query($conexao, $query_cliente);
	$row_cliente = mysqli_fetch_assoc($exec_query_cliente);
	$nomeCliente = $row_cliente['nomeCliente'];

	$dompdf = new DOMPDF();

	$dompdf->load_html('
		<html>
			<body>
				<h1>Prestação de serviços - Construtora construsonhos</h1>
				<br/>
				<p>Olá, <b>'.$nomeCliente.'</b>,</p>
				<p>Aqui seguem informações referente ao serviço de <b>'.$tipoServico.'</b> realizado no período de <b>'.$dataServico.'</b>, no endereço: <b>'.$ruaServico.', '.$numeroServico.' - '.$bairroServico.' - '.$cidadeServico.' / '.$estadoServico.' - CEP: '.$cepServico.'</b></p>
				<p><b><i>Itens/Serviços realizados</i></b></p>
				<ul>
					<li>Fazer uma garagem de 320x150 quadrados no fundo do quintal</li>
					<li>Cercar a parte frontal do pátio</li>
				</ul>
				<p>Quantidade total de metros quadrados: <b>'.$metroQuadradoServico.'</b></p>
				<p>Valor da mão de obra: <b>'.$valorMaoDeObraServico.'</b></p>
				<p>Valor total do serviço: <b>'.$valorMaoDeObraServico.'</b></p>
			</body>
		</html>
	');

	$dompdf->render();

	$dompdf->stream(
		"carta_de_cobranca.pdf",
		array(
			"Attachment" => false
		)
	);
?>