<?php
	session_start();

	include "../config/conectionDB.php";

	$idCliente = $_POST['idCliente'];
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$cep = $_POST['cep'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	$bairro = $_POST['bairro'];
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];


	$query = "UPDATE tb_cliente SET nomeCliente = '$nome', cpfCliente = '$cpf', telefoneCliente = '$telefone', emailCliente = '$email', cepCliente = '$cep', estadoCliente = '$estado', cidadeCliente = '$cidade', bairroCliente = '$bairro', ruaCliente = '$rua', numeroCliente = '$numero' WHERE idCliente = '$idCliente'";
	$exec_query = mysqli_query($conexao, $query);

	if ($exec_query) {
		header('Location: myAccount.php');
		$_SESSION['msgMyAccount'] = '<label class="msgsMyAccount"><span style="color: #01a620;">Dados alterados com sucesso</span></label>';
	} else {
		header('Location: myAccount.php');
		$_SESSION['msgMyAccount'] = '<label class="msgsMyAccount"><span style="color: #c22d43;">Erro ao alterar dados</span></label>';
	}
?>