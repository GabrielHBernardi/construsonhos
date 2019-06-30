<?php
	session_start();

	use Dompdf\Dompdf;

	require_once('../dompdf/autoload.inc.php');

	include "../config/conectionDB.php";

	$idServico = filter_input(INPUT_GET, 'idServico', FILTER_SANITIZE_NUMBER_INT);

	$sql = "SELECT ms.quantidadeTotalMateriais as qtd, m.nomeMaterial as nome_material, m.valorUnitarioMaterial as preco, f.nomeFornecedor FROM tb_materiais_servico ms
	INNER JOIN tb_material m ON m.idMaterial = ms.idMaterial
	INNER JOIN tb_fornecedor f ON f.idFornecedor = m.idFornecedor
	WHERE ms.idServico = $idServico";

	$query = mysqli_query($conexao, $sql);

	$materiais = [];

	while($row = mysqli_fetch_assoc($query)) {
	    $materiais[] = $row;
	}

	$total_materiais = 0;
	foreach($materiais as $key => &$mat) {
	    $mat["total"] = $mat["preco"] * $mat["qtd"];
	    $total_materiais += $mat["total"];
	}

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
	$valorMaoDeObraServico = $row_servico['valorMaoDeObraServico'];
	$valorTotalServico = $valorMaoDeObraServico + $total_materiais;

	// SELECT NOME DO CLIENTE
	$query_cliente = "SELECT * FROM tb_cliente WHERE idCliente='$idCliente'";
	$exec_query_cliente = mysqli_query($conexao, $query_cliente);
	$row_cliente = mysqli_fetch_assoc($exec_query_cliente);
	$nomeCliente = $row_cliente['nomeCliente'];


	// ITENS SERVIÇOS
	$query_itens_servico = "SELECT * FROM tb_item_servico WHERE idServico = $idServico";
	$exec_query_itens_servico = mysqli_query($conexao, $query_itens_servico);
	$itens_servico = "";
	while($row_itens_servico = mysqli_fetch_assoc($exec_query_itens_servico)) {
		$itens_servico .= "<li style='font-size: 18px;'>" . $row_itens_servico["descricaoItemServico"] . "</li>";
	}


	// MATERIAIS
	$sql = "SELECT ms.quantidadeTotalMateriais as qtd, m.nomeMaterial as nome_material, m.valorUnitarioMaterial as preco, f.nomeFornecedor FROM tb_materiais_servico ms
            INNER JOIN tb_material m ON m.idMaterial = ms.idMaterial
            INNER JOIN tb_fornecedor f ON f.idFornecedor = m.idFornecedor
            WHERE ms.idServico = $idServico";

    $query = mysqli_query($conexao, $sql);

    $materiais = [];

    while($row = mysqli_fetch_assoc($query)) {
        $materiais[] = $row;
    }

    $total_materiais = 0;
    foreach($materiais as $key => &$mat) {
        $mat["total"] = $mat["preco"] * $mat["qtd"];
        $total_materiais += $mat["total"];
    }

    // $table_materiais = "<table>";
    // 	$table_materiais .= "<thead>";
    		// $table_materiais = "<div style='height: 0px;'>";
    			$table_materiais = '';
    			// $table_materiais .= "<p>Quantidade</p>";
    			// $table_materiais .= "<p>Fornecedor</p>";
    			// $table_materiais .= "<p>Preço unitário</p>";
    			// $table_materiais .= "<p>Total do item</p>";
    		// $table_materiais .= "<div>";
    	// $table_materiais .= "</thead>";
    	// $table_materiais .= "<tbody>";
        foreach ($materiais as $key => $material) {
            // $table_materiais .= "<ul>";
                $table_materiais .= "<li style='font-size: 18px;'>" . $material["qtd"] . " unidades de " . $material["nome_material"] . "</li>";
                // $table_materiais .= "<p>" . $material["qtd"] . "</p>";
                // $table_materiais .= "<p>" . $material["nomeFornecedor"] . "</p>";
                // $table_materiais .= "<p>" . $material["preco"] . "</p>";
                // $table_materiais .= "<p>" . $material["total"] . "</p>";
            // $table_materiais .= "</ul>";
        }
	//   	$table_materiais .= "</tbody>";
	// $table_materiais .= "</table>";


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
				<p style="font-size: 18px;"><b>Serviços realizados:</b></p>
				<ul>
					' . $itens_servico . '
				</ul>
				<p style="font-size: 18px;"><b>Materiais utilizados:</b></p>
				<ul>
					' . $table_materiais . '
				</ul>
				<p style="font-size: 18px;">Valor total dos materiais: <b>'.number_format($total_materiais, 2, ',', '.').'</b></p>
				<p style="font-size: 18px;">Valor da mão de obra: <b>'.number_format($valorMaoDeObraServico, 2, ',', '.').'</b></p>
				<p style="font-size: 18px;">Valor total: <b>'.number_format($valorTotalServico, 2, ',', '.').'</b></p>
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