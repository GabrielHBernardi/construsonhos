<?php
	session_start();

	include "../config/conectionDB.php";

	$arquivo = $_FILES['arquivo']['name'];
	$idServico = $_POST['idServico'];
			
	$_UP['pasta'] = '../comprovantes/';
	
	$_UP['tamanho'] = 1024*1024*100;
	
	$_UP['extensoes'] = array('png', 'jpg', 'jpeg');
	
	$_UP['renomeia'] = false;
	
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	
	if($_FILES['arquivo']['error'] != 0){
		die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
	}
	
	$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
	if(array_search($extensao, $_UP['extensoes'])=== false){		
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/construsonhos/client/newVoucher.php?idServico=$idServico'>
			<script type=\"text/javascript\">
				alert(\"A imagem não foi cadastrada extesão inválida.\");
			</script>
		";
	}
	
	else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
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
			$nome_final = $_FILES['arquivo']['name'];
		}
		if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
			$query = mysqli_query($conexao, "UPDATE tb_cliente SET comprovantePagamentoServico = '$nome_final' WHERE idServico = '$idServico'");
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/construsonhos/client/newVoucher.php?idServico=$idServico'>
				<script type=\"text/javascript\">
					alert(\"Imagem cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/construsonhos/client/newVoucher.php?idServico=$idServico'>
				<script type=\"text/javascript\">
					alert(\"Imagem não foi cadastrada com Sucesso.\");
				</script>
			";
		}
	}
?>