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
				<div style="height: 30px;background: #1a2732;background-color: #1a2732;text-align: center;padding: 15px 0px 15px 0px;">
					<span style="font-size: 22px;font-weight: 300;color: #fed189;text-transform: uppercase;">CONSTRUTORA</span>
					<span style="font-size: 22px;font-weight: 300;color: #00a0df;text-transform: uppercase;margin-left: 10px;">CONSTRUSONHOS</span>
				</div>
				<br/>
				<p style="font-size: 18px;">Olá, <b>'.$nomeCliente.'</b>,</p>
				<p style="font-size: 18px;">Aqui seguem informações referente ao serviço de <b>'.$tipoServico.'</b> realizado no período de <b>'.$dataServico.'</b>, no endereço: <b>'.$ruaServico.', '.$numeroServico.' - '.$bairroServico.' - '.$cidadeServico.' / '.$estadoServico.' - CEP: '.$cepServico.'</b></p>
				<p style="font-size: 18px;"><b>Itens/Serviços realizados:</b></p>
				<ul>
					<li style="font-size: 18px;">Fazer uma garagem de 320x150 quadrados no fundo do quintal</li>
					<li style="font-size: 18px;">Cercar a parte frontal do pátio</li>
				</ul>
				<p style="font-size: 18px;">Valor da mão de obra: <b>'.$valorMaoDeObraServico.'</b></p>
				<p style="font-size: 18px;">Valor total do serviço: <b>'.$valorMaoDeObraServico.'</b></p>
				<p style="font-size: 18px;">O pagamento deve ser feito via transferência ou depósito bancário para a conta com os dados detalhados abaixo:</p>
				<div style="border: 1px solid gray;width: fit-content;padding: 0px 15px 0px 15px;width: 210px;">
					<p style="font-size: 18px;">Banco: <b>475 - Banco de teste</b></p>
					<p style="font-size: 18px;">Agência: <b>0001</b></p>
					<p style="font-size: 18px;">Conta: <b>12345-6</b></p>
					<p style="font-size: 18px;">CPF: <b>032.316.220-77</b></p>
					<p style="font-size: 18px;">Valor: <b>'.$valorMaoDeObraServico.'</b></p>
				</div>
				<p style="font-size: 18px;">Após realizar o pagamento, anexe o comprovante <a href="/construsonhos/client/">aqui</a>.</p>
				<p style="font-size: 18px;">Caso tenha problemas para realizar o pagamento, entre em contato antes do vencimento acima.</p>
				<br/>
				<p style="font-size: 18px;"><b><i>Atenciosamente,</b></i></p>
				<p style="font-size: 18px;"><b><i>Construtora Construsonhos</b></i></p>
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